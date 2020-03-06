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
use Symfony\Component\HttpFoundation\Session\Session;

class Home
{
    /**
     * @var Session
     */
    private Session $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function main(Request $request)
    {
        $this->session->set('lol', 'ss');
        echo $this->session->get('lol');
    }
}
