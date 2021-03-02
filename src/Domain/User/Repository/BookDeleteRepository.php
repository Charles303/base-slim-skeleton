<?php


namespace App\Domain\User\Repository;

use PDO;
use phpDocumentor\Reflection\Types\String_;

/**
 * Repository.
 */
class BookDeleteRepository
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
    public function supprimerBook(array $user): int
    {
        $row = [
            'id' => $user['id']
        ];

        $sql = "DELETE FROM livres WHERE id=:id;";

        $this->connection->prepare($sql)->execute($row);

        return (int)$this->connection->lastInsertId();

    }
}

