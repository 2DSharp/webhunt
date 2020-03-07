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
use WebHunt\Model\Mapper\LevelMapper;

class LeaderBoard
{
    /**
     * @var LevelMapper
     */
    private LevelMapper $mapper;

    /**
     * LeaderBoard constructor.
     * @param LevelMapper $mapper
     */
    public function __construct(LevelMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    public function getLeaderBoard(Request $request)
    {
        $res = $this->mapper->getTopTeams($request->query->get('num', '10'));
        return new Response(json_encode($res));
    }
}