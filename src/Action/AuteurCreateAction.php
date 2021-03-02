<?php


namespace App\Action;


use App\Domain\User\Service\AuteurCreate;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class AuteurCreateAction
{
    private $userCreator;

    public function __construct(AuteurCreate $userCreator)
    {
        $this->userCreator = $userCreator;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface
    {
        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();

        // Invoke the Domain with inputs and retain the result
        $livre = $this->userCreator->creerAuteur($data);

        // Transform the result into the JSON representation
        $result = [
            'auteur' => $livre
        ];

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}
