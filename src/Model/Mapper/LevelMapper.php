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

    public function getLevel(int $id) : array
    {
        $stmt = $this->pdo->prepare("SELECT Level, Points FROM Score WHERE ID = :id");
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return ['Level' => $result['Level'], 'Points' => $result['Points']];
    }

    public function getAnswer(int $level) : string
    {
        $stmt = $this->pdo->prepare("SELECT Answer FROM Level WHERE ID = :id");
        $stmt->bindParam(':id', $level);

        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['Answer'];
    }
    public function getPointsForThisLevel(int $level) : int
    {
        $stmt = $this->pdo->prepare("SELECT Points FROM Level WHERE ID = :id");
        $stmt->bindParam(':id', $level);

        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['Points'];
    }
    public function levelUp(int $id, string $ip, int $points): void
    {
        $stmt = $this->pdo->prepare("Update Score SET Points = Points + :points, Level = Level + 1, IPAddress = :ip WHERE ID = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':ip', $ip);
        $stmt->bindParam(':points', $points);

        $stmt->execute();
    }

    public function getTopTeams(int $teams)
    {
        $stmt = $this->pdo->prepare("SELECT ID, Points FROM Score ORDER BY Points DESC, Level DESC, LastAttempt LIMIT 20");
        //$stmt->bindParam(':teams', $teams);

        $stmt->execute();
        $results = [];
        while ($result = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($results, [$result['ID'] => $result['Points']]);
        }

        return $results;
    }

    public function applyCheat(string $cheat, int $id, int $ip) : bool
    {
        $stmt = $this->pdo->prepare("SELECT Points FROM Cheat WHERE Code = :code");
        $stmt->bindParam(':code', $cheat);

        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($result) {
            $stmt = $this->pdo->prepare("Update Score SET Points = Points + :points, IPAddress = :ip WHERE ID = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ip', $ip);
            $stmt->bindParam(':points', $result['Points']);

            $stmt->execute();

            $stmt = $this->pdo->prepare("DELETE FROM Cheat WHERE Code = :code");
            $stmt->bindParam(':code', $cheat);
            $stmt->execute();

            return true;
        }
        return false;
    }
}