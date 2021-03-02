<?php


namespace App\Domain\User\Repository;

use PDO;
use phpDocumentor\Reflection\Types\String_;

/**
 * Repository.
 */
class AuteurCreateRepository
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
    public function creerBook(array $user): int
    {
        $row = [
            'genreId' => $user['genreId'],
            'titre' => $user['titre'],
            'isbn' => $user['isbn']
        ];

        $sql = "INSERT INTO livres SET 
                genreId=:genreId, 
                titre=:titre, 
                isbn=:isbn;";

        $this->connection->prepare($sql)->execute($row);

        return (int)$this->connection->lastInsertId();

    }
}

