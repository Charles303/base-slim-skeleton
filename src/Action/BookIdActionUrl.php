<?php


namespace App\Action;


use App\Domain\User\Service\BookIdUrl;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Factory\LoggerFactory;
use Psr\Log\LoggerInterface;

final class BookIdActionUrl
{
    private $logger;
    private $userCreator;

    public function __construct(BookIdUrl $userCreator, LoggerFactory $logger)
    {
        $this->userCreator = $userCreator;
        $this->logger = $logger
            ->addFileHandler('Bookviewer.log')
            ->createLogger("BookIdAction");
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface
    {
        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();
        $id = $request->getAttribute("id",0);

        // Invoke the Domain with inputs and retain the result
        $livre = $this->userCreator->afficherLivreIdUrl($id);

        // Transform the result into the JSON representation
        $result = [
            'livre' => $livre
        ];
        $this->logger->info("logger info");
        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}
