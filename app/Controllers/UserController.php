<?php

namespace App\Controllers;

class UserController {
    public function index() {
        // Lógica para listar todos os usuários
        // Exemplo básico apenas para ilustração
        echo "Listar todos os usuários";
    }

    public function create() {
        // Lógica para criar um novo usuário
        // Exemplo básico apenas para ilustração
        echo "Criar um novo usuário";
    }

    public function show($dinamicParams) {
        // Lógica para exibir um usuário específico
        // Exemplo básico apenas para ilustração
        echo "Exibir o usuário com o ID: " . $dinamicParams["id"];
    }

    public function update($dinamicParams) {
        // Lógica para atualizar um usuário específico
        // Exemplo básico apenas para ilustração
        echo "Atualizar o usuário com o ID: " . $dinamicParams["id"];
    }

    public function delete($dinamicParams) {
        // Lógica para excluir um usuário específico
        // Exemplo básico apenas para ilustração
        echo "Excluir o usuário com o ID: " . $dinamicParams["id"];
    }
}
