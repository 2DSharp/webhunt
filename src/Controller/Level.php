<?php
/*
 * This file is part of Skletter <https://github.com/2DSharp/Skletter>.
 *
 * (c) Dedipyaman Das <2d@twodee.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WebHunt\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Twig\Environment;
use WebHunt\Model\Mapper\LevelMapper;

class Level
{
    /**
     * @var SessionInterface
     */
    private SessionInterface $session;
    /**
     * @var LevelMapper
     */
    private LevelMapper $mapper;
    /**
     * @var Environment
     */
    private Environment $twig;

    public function __construct(Session $session, LevelMapper $mapper, Environment $twig)
    {
        $this->session = $session;
        $this->mapper = $mapper;
        $this->twig = $twig;
    }

    public function getQuestion(Request $request) : Response
    {
        $level = $this->mapper->getLevel($this->session->get('id'));
        return new Response(json_encode(["html" =>
            $this->twig->render('q' . $level['Level'] . '.twig'),
                                            'points' => $level['Points'],
                                            'level' => $level['Level']]));
    }

    public function update(Request $request) : Response
    {
        $levelDat = $this->mapper->getLevel($this->session->get('id'));
        if (md5(strtolower(preg_replace('/\s+/', '', $request->query->get('answer'))))
            == $this->mapper->getAnswer($levelDat['Level'])) {

            $this->mapper->levelUp($this->session->get('id'),  $request->getClientIp(), $this->mapper->getPointsForThisLevel($levelDat['Level']));
            return new Response(json_encode(['success' => true]));
        }
        return new Response(json_encode(['success' => false]));
    }

    public function cheat(Request $request) : Response
    {
        if($this->mapper->applyCheat(md5(trim(strtolower($request->query->get('code', '0')))), $this->session->get('id'), $request->getClientIp())) {
            return new Response(json_encode(['success' => true]));
        }
        return new Response(json_encode(['success' => false]));
    }
}