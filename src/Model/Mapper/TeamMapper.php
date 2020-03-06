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

class TeamMapper
{
    /**
     * @var \PDO
     */
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function storeInBulk(array $credentials = [])
    {
        $credentialStmt = $this->pdo->prepare("INSERT INTO TeamCredentials (Password) VALUES (:pass)");
        $levelInitStmt = $this->pdo->prepare("INSERT INTO Score (ID) VALUES (:id)");

        foreach ($credentials as $i) {
            $credentialStmt->bindParam(':pass', $i);
            $credentialStmt->execute();
            $levelInitStmt->bindParam(':id', $this->pdo->lastInsertId());
            $levelInitStmt->execute();
        }

    }

    public function storeSingle($pass)
    {
        $credentialStmt = $this->pdo->prepare("INSERT INTO TeamCredentials (Password) VALUES (:pass)");
        $levelInitStmt = $this->pdo->prepare("INSERT INTO Score (ID) VALUES (:id)");

        $credentialStmt->bindParam(':pass', $i);
        $credentialStmt->execute();
        $levelInitStmt->bindParam(':id', $this->pdo->lastInsertId());
        $levelInitStmt->execute();
    }

    public function validateUser(string $id, string $pass) : bool
    {
        $stmt = $this->pdo->prepare("SELECT Password FROM TeamCredentials WHERE ID = :id");
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        return ($pass === $result['Password']);
    }
}