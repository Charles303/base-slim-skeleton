<?php


namespace App\Domain\User\Service;


use App\Domain\User\Repository\BookEditRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class BookEdit
{
    /**
     * @var BookEditRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param BookEditRepository $repository The repository
     */
    public function __construct(BookEditRepository $repository)
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
    public function afficherEditLivre(array $data): int
    {
        // Input validation
        $this->validateLivres($data);

        // Insert user
        $titre = $this->repository->editBook($data);

        // Logging here: User created successfully
        //$this->logger->info(sprintf('User created successfully: %s', $userId));

        return $titre;
    }

    /**
     * Input validation.
     *
     * @param array $data The form data
     *
     * @return void
     * @throws ValidationException
     *
     */
    private function validateLivres(array $data): void
    {
        $errors = [];

        // Here you can also use your preferred validation library


        if ($errors) {
            throw new ValidationException('Please check your input', $errors);
        }
    }
}
