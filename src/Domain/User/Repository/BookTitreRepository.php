<?php


namespace App\Domain\User\Repository;

use PDO;
use phpDocumentor\Reflection\Types\String_;

/**
 * Repository.
 */
class BookTitreRepository
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
    public function bookTitre(array $user): array
    {
        $row = [
            'titre' => $user['titre']
        ];
        $sql = "SELECT * FROM livres WHERE titre=:titre;";

        $query = $this->connection->prepare($sql);
        $query->execute($row);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }
}

