<?php

namespace App\Utils;

class Router
{
    // Array associativo para armazenar as rotas definidas
    private $routes = [];

    // Método para adicionar uma rota
    public function addRoute($method, $pattern, $handler)
    {
        $this->routes[$method][$pattern] = $handler;
    }

    // Método para rotear a requisição
    public function route($method, $uri)
    {
        // Remove quaisquer parâmetros da URI
        $uri = strtok($uri, '?');

        // Verifica se a rota está definida para o método recebido
        if (isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $pattern => $handler) {
                // Verifica se a URI corresponde ao padrão da rota
                $pattern = str_replace('/', '\/', $pattern); // Escapa as barras para usar na expressão regular
                $pattern = preg_replace('/\{(\w+)\}/', '(?<$1>[^\/]+)', $pattern); // Substitui os parâmetros dinâmicos pela expressão regular correspondente
                if (preg_match("#^$pattern$#", $uri, $matches)) {
                    // Se houver correspondência, remove a primeira entrada que é a própria URI completa
                    array_shift($matches);

                    // Chama o manipulador (handler) associado à rota, passando os parâmetros correspondentes
                    if (is_callable($handler)) {
                        // Se for uma função anônima, simplesmente a chama
                        $handler($matches);
                    } elseif (is_array($handler) && count($handler) === 2) {
                        // Se for um array com 2 elementos, instancia o controlador e chama o método
                        [$controllerName, $methodName] = $handler;
                        $controller = new $controllerName();
                        // Use a chamada direta do método com um único array de parâmetros
                        $controller->$methodName($matches);
                    } else {
                        // Se o manipulador não estiver no formato correto, exibe um erro
                        http_response_code(500);
                        echo "500 Internal Server Error: Invalid handler format";
                        return;
                    }

                    // Retorna para evitar que outras rotas sejam verificadas
                    return;
                }
            }
        }

        // Se nenhuma rota correspondente for encontrada, retorna um erro 404
        http_response_code(404);
        echo "404 Not Found";
    }
}
