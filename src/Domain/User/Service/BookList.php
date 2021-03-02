<?php

namespace App\Domain\User\Service;


use App\Domain\User\Repository\BookListRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class BookList
{
    /**
     * @var BookListRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param BookListRepository $repository The repository
     */
    public function __construct(BookListRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create a new user.
     *
     * @param array $data The form data
     *
     * @return int The new user ID
     */
    public function afficherTitreLivre( $data): array
    {
        // Input validation
        $this->validateToken($data);

        // Insert user
        $titre = $this->repository->titreBook($data);

        // Logging here: User created successfully
        //$this->logger->info(sprintf('User created successfully: %s', $userId));

        return $titre;
    }

    /**
     * Input validation.
     *
     * @param array $data The form data
     *
     * @return array
     *@throws ValidationException
     *
     */
    public function validateToken(array $data): array
    {
        $errors = [];

        // Here you can also use your preferred validation library



        if ($errors) {
            throw new ValidationException('Please check your input', $errors);
        }
        return $data;
    }
}
