<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiHttpGuideController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return [
            ['COMO TESTAR O PROJETO?'=>
                ['1 -> Abra o Postman e Digite a Base URL',
                'Base URL = http://127.0.0.1:8000',
                '2 -> Selecione o Verbo/Método(GET,POST,PUT,DELETE)',
                '3 -> Acrescente o Endpoint',
                '4 -> Clique em Send/Enviar']
            ],
            [
                'REQUISICOES DE PRODUTOS'=> [
                    ['Exibir Todos os Produtos' => ['Verbo: GET', 'Endpoint: /api/products']],
                    ['Criar um Novo Produto' => ['Verbo: POST', 'Endpoint: /api/products']],
                    ['Exibir Apenas um Produto' => ['Verbo: GET', 'Endpoint: /api/products/{id}']],
                    ['Atualizar um Produto' => ['Verbo: PUT', 'Endpoint: /api/products/{id}']],
                    ['Deletar um Produto' => ['Verbo: DELETE', 'Endpoint: /api/products/{id}']]
                ],
                'REQUISICOES DE USUARIOS'=> [
                    ['Exibir Todos os Usuários' => ['Verbo: GET', 'Endpoint: /api/users']],
                    ['Criar um Novo Usuário' => ['Verbo: POST', 'Endpoint: /api/users']],
                    ['Exibir Apenas um Usuário' => ['Verbo: GET', 'Endpoint: /api/users/{id}']],
                    ['Atualizar um Usuário' => ['Verbo: PUT', 'Endpoint: /api/users/{id}']],
                    ['Deletar um Usuário' => ['Verbo: DELETE', 'Endpoint: /api/users/{id}']]
                ],
                'REQUISICOES DE AUTENTICACAO'=> [
                    ['Entrar na conta do Usuário' => ['Verbo: POST', 'Endpoint: /api/auth/login']],
                    ['Sair da Conta do Usuário' => ['Verbo: POST', 'Endpoint: /api/auth/logout']],
                    ['Atualizar o Token de Acesso do Usuário' => ['Verbo: POST', 'Endpoint: /api/auth/refresh']],
                    ['Mostrar Dados do Usuário' => ['Verbo: POST', 'Endpoint: /api/auth/me']]
                ],
            ]
        ];
    }
}
