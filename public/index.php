<?php

use App\Utils\Router;
use App\Routes\UsersRoutes;

require_once __DIR__ . '/../vendor/autoload.php'; // Carrega as dependências via Composer

// Roteamento de requisições
$router = new Router();

// Inclua os arquivos de rotas

// Instancia a classe UsersRoutes para carregar as rotas de usuários
$usersRoutes = new UsersRoutes($router);

// Roteie as solicitações
$router->route($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
