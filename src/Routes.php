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
    ['GET', '/lal', ['Home', 'main']],
    ['GET', '/api/home', ['Home', 'main', 'jsonMain']],
    ['GET', '/login', ['Login', 'attemptLogin']],
    ['GET', '/passgen', ['PasswordGeneration', 'generateMap']],
    ['GET', '/question', ['Level', 'getQuestion']],
    ['GET', '/go', ['Level', 'update']]

];