<?php
/*
 * This file is part of WebHunt <https://github.com/2DSharp/WebHunt>.
 *
 * (c) Dedipyaman Das <2d@twodee.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
return [
    ['GET', '/', ['Home', 'loggedIn']],
    ['GET', '/api/home', ['Home', 'main', 'jsonMain']],
    ['GET', '/login', ['Login', 'attemptLogin']],
    ['GET', '/passgen', ['PasswordGeneration', 'generateMap']],
    ['GET', '/question', ['Level', 'getQuestion']],
    ['GET', '/go', ['Level', 'update']],
    ['GET', '/leaderboard', ['LeaderBoard', 'getLeaderBoard']],
    ['GET', '/cheat', ['Level', 'cheat']],
    ['GET', '/level', ['Home', 'main']],
    ['GET', '/leader', ['Home', 'main']],
    ['GET', '/p1', ['Home', 'main']],
    ['GET', '/p2', ['Home', 'main']],
    ['GET', '/p3', ['Home', 'main']],
    ['GET', '/p4', ['Home', 'main']],
    ['GET', '/p5', ['Home', 'main']],
    ['GET', '/p6', ['Home', 'main']],
    ['GET', '/p7', ['Home', 'main']],

];