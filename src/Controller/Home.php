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

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Twig\Environment;

class Home
{
    /**
     * @var Session
     */
    private Session $session;
    /**
     * @var Environment
     */
    private Environment $twig;

    public function __construct(Session $session, Environment $twig)
    {
        $this->session = $session;
        $this->twig = $twig;
    }

    public function main(Request $request)
    {
        if ($this->session->get('id', 'x') == 'x') {
            return new RedirectResponse('/');
        }
       return new Response($this->twig->render('index.html'));
    }

    public function loggedIn(Request $request)
    {
        if ($this->session->get('id', 'x') != 'x') {
            return new RedirectResponse('/level');
        }
        return new Response($this->twig->render('index.html'));
    }
}
