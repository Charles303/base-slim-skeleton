<?php


namespace App\Domain\User\Repository;

use PDO;
use phpDocumentor\Reflection\Types\String_;

/**
 * Repository.
 */
class BookEditRepository
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
    public function editBook(array $user): int
    {
        $row = [
            'id' => $user['id'],
            'genreId' => $user['genreId'],
            'titre' => $user['titre'],
            'isbn' => $user['isbn']
        ];

        $sql = "UPDATE livres SET genreId=:genreId, titre=:titre, isbn=:isbn WHERE id=:id;";

        $query = $this->connection->prepare($sql);
        $query->execute($row);
        return 1;

    }
}

