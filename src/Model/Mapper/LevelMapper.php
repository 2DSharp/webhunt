<?php
/*
 * This file is part of Skletter <https://github.com/2DSharp/Skletter>.
 *
 * (c) Dedipyaman Das <2d@twodee.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WebHunt\Model\Mapper;


class LevelMapper
{
    /**
     * @var \PDO
     */
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getLevel(int $id) : int
    {
        $stmt = $this->pdo->prepare("SELECT Level FROM Score WHERE ID = :id");
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['Level'];
    }

    public function getAnswer(int $level) : string
    {
        $stmt = $this->pdo->prepare("SELECT Answer FROM Level WHERE ID = :id");
        $stmt->bindParam(':id', $level);

        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['Answer'];
    }

    public function levelUp(int $id)
    {
        $stmt = $this->pdo->prepare("Update Score SET Level = Level + 1 WHERE ID = :id");
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }
}