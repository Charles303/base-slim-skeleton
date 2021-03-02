<?php


namespace App\Domain\User\Repository;

use PDO;
use phpDocumentor\Reflection\Types\String_;

/**
 * Repository.
 */
class BookCreateRepository
{
    /**
     * @var PDO The database connection
     */
    private $connection;

    /**
     * Constructor.
     *
     * @param PDO $connection The database connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Insert user row.
     *
     * @param array $user The user
     *
     * @return array
     */
    public function creerAuteur(array $user): int
    {
        $row = [
            'nom' => $user['nom'],
            'prenom' => $user['prenom']
        ];

        $sql = "INSERT INTO auteurs SET 
                nom=:nom, 
                prenom=:prenom;";

        $this->connection->prepare($sql)->execute($row);

        return (int)$this->connection->lastInsertId();

    }
}

