<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Middleware\Authentification;
use Slim\App;

return function (App $app) {

    $app->get('/', \App\Action\HomeAction::class)->setName('home');

    $app->post('/users', \App\Action\UserCreateAction::class);
    //livres
    $app->get('/booklist', \App\Action\BookListActions::class) ->add(\App\Middleware\Authentification::class);

    $app->get('/bookid', \App\Action\BookIdAction::class);
    //livre id avec paramètre dans url
    $app->get('/bookidurl/{id}', \App\Action\BookIdActionUrl::class);

    $app->get('/booktitre', \App\Action\BookTitreAction::class);

    $app->get('/bookcreate', \App\Action\BookCreateAction::class);

    $app->put('/bookedit', \App\Action\BookEditAction::class);

    $app->get('/bookdelete', \App\Action\BookDeleteAction::class);
    //auteurs
    $app->get('/auteurlist', \App\Action\AuteurListAction::class);

    $app->get('/auteurid/{id}', \App\Action\AuteurIdAction::class);

    $app->get('/auteurcreate', \App\Action\AuteurCreateAction::class);
    //SwaggerUi
    $app->get('/docs/v1', \App\Action\Docs\SwaggerUiAction::class);


};