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

    public function __construct(Session $session, LevelMapper $mapper)
    {
        $this->session = $session;
        $this->mapper = $mapper;
    }

    public function getQuestion(Request $request) : Response
    {
        $level = $this->mapper->getLevel(303);
        return new Response("<div style='background-color:red'> <h1>". $level . "</h1> </div>");
    }

    public function update(Request $request) : Response
    {
        if (md5(strtolower(preg_replace('/\s+/', '', $request->query->get('answer'))))
            == $this->mapper->getAnswer(1)) {
            $this->mapper->levelUp(303);
            return new Response(json_encode(['success' => true]));
        }
        return new Response(json_encode(['success' => false]));
    }
}