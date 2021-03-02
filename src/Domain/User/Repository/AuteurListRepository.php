<?php


namespace App\Domain\User\Repository;

use PDO;
use phpDocumentor\Reflection\Types\String_;

/**
 * Repository.
 */
class AuteurListRepository
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
    public function AuteurList(array $user): array
    {
        $row = [
            'genreId' => $user['genreId'],
            'titre' => $user['titre'],
            'isbn' => $user['isbn']
        ];

        $sql = "SELECT * FROM auteurs;";

        $query = $this->connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }
}

