<?php

namespace App\routes;

use App\Controllers\UserController;
use App\Utils\Router;

class UsersRoutes
{
    public function __construct(Router $router)
    {
        // Define a constante para o padrão de URL "/users/{id}"
        define('USER_ID_PATTERN', '/users/{id}');

        // Adiciona as rotas relacionadas a usuários
        $router->addRoute('GET', '/users', [UserController::class, 'index']);
        $router->addRoute('POST', '/users', [UserController::class, 'create']);
        $router->addRoute('GET', USER_ID_PATTERN, [UserController::class, 'show']);
        $router->addRoute('PUT', USER_ID_PATTERN, [UserController::class, 'update']);
        $router->addRoute('DELETE', USER_ID_PATTERN, [UserController::class, 'delete']);
    }
}
