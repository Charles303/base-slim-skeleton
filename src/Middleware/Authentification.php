<?php

namespace App\Middleware;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use App\Domain\User\Service\BookList;
use Slim\Psr7\Response;

class Authentification
{
    private $userCreator;

    /**
     * Example middleware invokable class
     *
     * @param Request $request PSR-7 request
     * @param RequestHandler $handler PSR-15 request handler
     *
     * @return Response
     */
    public function __invoke(Request $request, RequestHandler $handler): Response
    {

        $response = $handler->handle($request);
        $existingContent = (string) $response->getHeader('Authorization');

        $response = new Response();
        $response->getBody()->write($existingContent);

        return $response;
    }
    public function __construct(BookList $userCreator)
    {
        $this->userCreator = $userCreator;

    }
}