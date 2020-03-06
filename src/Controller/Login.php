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


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use WebHunt\Model\Mapper\TeamMapper;

class Login
{
    /**
     * @var SessionInterface
     */
    private SessionInterface $session;
    /**
     * @var TeamMapper
     */
    private TeamMapper $mapper;

    public function __construct(Session $session, TeamMapper $mapper)
    {
        $this->session = $session;
        $this->mapper = $mapper;
    }

    public function attemptLogin(Request $request) : Response
    {
        header('Access-Control-Allow-Origin: *');

        $id = $request->query->get('id', '0');
        if ($this->mapper->validateUser($request->query->get('id', '0'),
                                        $request->query->get('pass', '0'))) {
            $this->session->set('id', $id);
            return new Response(json_encode(['success' => true]));
        }

        return new Response(json_encode(['success' => false]));
    }
}