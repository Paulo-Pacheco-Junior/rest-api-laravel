<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
 
<h2>CRUD feito com API REST<h2>
<h3>Projeto Nível Iniciante / Intermediário</h3>
<ul>
    <li>Database seeding</li>
    <li>Endpoints de Users, Products e Auth(login, logout...)</li>
    <li>Tratamento de dados com Resources</li>
    <li>Validação FormRequest,</li>
    <li>Filtragem de Campos(fields) pela URL,</li>
    <li>Autenticação e Autorização JWT (utilizando o pacote tymon/jwt-auth),</li>
</ul>
</br>

## Instalação

Clone o projeto:

```
git clone «URL DO REPOSITÓRIO»
```

Uma vez clonado, abra na pasta do projeto:

```
cd «DIR DO PROJETO»
```

Dentro da pasta do projeto, crie o arquivo *.env* e copie o arquivo *.env.example* para o *.env*.
Agora, modifique o *.env* inserindo as credenciais do seu banco de dados.

```
DB_CONNECTION=mysql
DB_HOST=«ENDEREÇO DO SEU BANCO DE DADOS»
DB_PORT=3306
DB_DATABASE=«NOME DO SEU BANCO DE DADOS»
DB_USERNAME=«USUÁRIO DO SEU BANCO DE DADOS»
DB_PASSWORD=«SENHA PARA O USUÁRIO»
```

Por exemplo:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_crud
DB_USERNAME=root
DB_PASSWORD=
```

Agora, instale o projeto:

```
composer install
php artisan key:generate
php artisan jwt:secret
php artisan migrate --seed
php artisan serve
```
</br>

<strong>Explicando o Projeto</strong>

Vamos definir a <strong>URL base</strong> http://127.0.0.1:8000 (a porta 8000, ou host 127.0.0.1 podem ser diferentes conforme a configuração do seu ambiente)</br> 
Todas as <strong>Requisições HTTP</strong> que irão interagir com os recursos da API utilizarão a combinação da <strong>URL base + Endpoint</strong> (Essa combinação se chama <strong>URI</strong>)</br>
Se combinarmos a <strong>URL base</strong> http://127.0.0.1:8000 e o <strong>endpoint /api/products</strong></br> 
formaremos a <strong>URI</strong> http://127.0.0.1:8000/api/products</br> 
Agora que deixei claro que não desconheço os termos técnicos. Para simplificar as explicações, sempre que formos fazer requisições irei mencionar apenas o <strong>Endpoint</strong>   
</br>

<strong>Então vamos à Prática!</strong>
<ol>
    <li> Abra o Postman e Digite a Base URL,</br>
        Base URL = http://127.0.0.1:8000,</br></li>
    <li> Selecione o Verbo/Método(GET,POST,PUT,DELETE),</li>
    <li> Acrescente o Endpoint,</li>
    <li> Clique em Send/Enviar</br></li>
</ol>

                'REQUISICOES DE PRODUTOS'=> [
                    ['Exibir Todos os Produtos' => ['Verbo: GET', 'Endpoint: /api/products']],
                    ['Criar um Novo Produto' => ['Verbo: POST', 'Endpoint: /api/products']],
                    ['Exibir Apenas um Produto' => ['Verbo: GET', 'Endpoint: /api/products/{product}']],
                    ['Atualizar um Produto' => ['Verbo: PUT', 'Endpoint: /api/products/{product}']],
                    ['Deletar um Produto' => ['Verbo: DELETE', 'Endpoint: /api/products/{product}']]
                ],
                'REQUISICOES DE USUARIOS'=> [
                    ['Exibir Todos os Usuários' => ['Verbo: GET', 'Endpoint: /api/users']],
                    ['Criar um Novo Usuário' => ['Verbo: POST', 'Endpoint: /api/users']],
                    ['Exibir Apenas um Usuário' => ['Verbo: GET', 'Endpoint: /api/users/{user}']],
                    ['Atualizar um Usuário' => ['Verbo: PUT', 'Endpoint: /api/users/{user}']],
                    ['Deletar um Usuário' => ['Verbo: DELETE', 'Endpoint: /api/users/{user}']]
                ],
                'REQUISICOES DE AUTENTICACAO'=> [
                    ['Entrar na conta do Usuário' => ['Verbo: POST', 'Endpoint: /api/auth/login']],
                    ['Sair da Conta do Usuário' => ['Verbo: POST', 'Endpoint: /api/auth/logout']],
                    ['Atualizar o Token de Acesso do Usuário' => ['Verbo: POST', 'Endpoint: /api/auth/refresh']],
                    ['Mostrar Dados do Usuário' => ['Verbo: POST', 'Endpoint: /api/auth/me']]
                ],


_______________________________________________________________________________
<strong>Endpoints de Users, Products e Auth(login, logout...)</strong></br>

No Postman:

<strong>Para Exibir Todos os Produtos:</strong>
<ol>
    <li>Faça uma Requisição com o verbo <strong>GET</strong> e Endpoint <strong>/api/products</strong></li>
</ol>
Irão aparecer 10 Produtos, logo abaixo, com seus valores e as chaves:
<ul>
    <li>'id'</li>
    <li>'title'</li>
    <li>'url'</li>
    <li>'price'</li>
    <li>'description'</li>
    <li>'created_at'</li>
    <li>'updated_at'</li>
</ul>
</br>

<strong>Para Criar um Novo Produto:</strong>
<ol>
    <li> Abra uma nova aba HTTP(‘File’, depois ‘New…’ e depois ‘HTTP’)</li>
    <li> Clique em ‘Body’ e em seguida ‘x-www-form-urlencoded’</li>
    <li> Preencha as Keys(chaves) (‘title’,’url’,’price’,’description’) e os Values(valores) que você deseja Criar</li>
</ol>
Por exemplo:
<ul>
    <li>title: Teste</li>
    <li>url: www.teste.com</li>
    <li>price: 100.00 (Para fração use '.' e não ',')</li>
    <li>description: Meu primeiro teste</li>
</ul>
4. Faça uma Requisição com o verbo <strong>POST</strong> e Endpoint <strong>/api/products</strong></br></br>
</br>

<strong>Para Exibir Apenas um Produto:</strong>
<ol>
    <li>Substitua {product}, no final do Endpoint, pelo Número do ID do Produto que você deseja Exibir</li>
    <li>Faça uma Requisição com o verbo <strong>GET</strong> e Endpoint <strong>/api/products/{product}</strong></li>
</ol>
    Por exemplo:
<ul>
    <li><strong>GET</strong> e Endpoint <strong>/api/products/8</strong> irá Exibir o Produto que tem o ID 8</li>
</ul>
</br>

<strong>Para Atualizar um Produto:</strong>
<ol>
    <li> Abra uma nova aba HTTP(‘File’, depois ‘New…’ e depois ‘HTTP’)</li>
    <li> Clique em ‘Body’ e em seguida ‘x-www-form-urlencoded’</li>
    <li> Preencha as Keys(chaves) (‘title’,’url’,’price’,’description’) e os Values(valores) que você deseja Atualizar</li>
</ol>
Por exemplo:
<ul>
    <li>title: Teste ALTERADO</li>
    <li>url: www.testealterado.com</li>
    <li>price: 900.00 (Para fração não usa ',', usa '.')</li>
    <li>description: Meu primeiro teste ALTERADO</li>
</ul>
<ol>
    <li>Substitua {product}, no final do Endpoint, pelo Número do ID do Produto que você deseja Atualizar</li>
    <li>Faça uma Requisição com o verbo <strong>PUT</strong> e Endpoint <strong>/api/products/{product}</strong></li>
</ol>
</br>

<strong>Para Deletar um Produto:</strong>
<ol>
    <li>Substitua {product}, no final do Endpoint, pelo Número do ID do Produto que você deseja Deletar</li>
    <li>Faça uma Requisição com o verbo <strong>DELETE</strong> e Endpoint <strong>/api/products/{product}</strong></li>
</ol>
    Por exemplo:
<ul>
    <li><strong>DELETE</strong> e Endpoint <strong>/api/products/8</strong> irá Deletar o Produto que tem o ID 8</li>
</ul>
</br>

<strong>Para Testar USUÁRIOS:</strong> 
<ol>
    <li>No Endpoint troque <strong>'products'</strong> por <strong>'users'</strong></li>
    <li>Use o <strong>MESMO PROCEDIMENTO</strong> que usou em <strong>PRODUTOS</strong>, porém as Chaves serão:</br>    
        <ul>
            <li>name</li>
            <li>email</li>
            <li>password</li>
        </ul>
    </li>
</ol>
</br>

<strong>Autenticação e Autorização JWT (utilizando o pacote tymon/jwt-auth)</strong></br>

<strong>Para Fazer LOGIN e LOGOUT:</strong>
<ol>
    <li>Crie um Usuário(password precisa ter no mínimo 8 dígitos)</li>
    <li>Envie seu novo usuário via Verbo <strong>POST</strong> para o Endpoint <strong>api/auth/login</strong></li>
    <li>Copie o <strong>Token</strong> gerado em <strong>access_token</strong> sem "aspas"</li>
    <li>Clique em Headers</li>
    <li>Crie a key <strong>Authorization</strong></li>
    <li>Digite <strong>bearer</strong> no <strong>Value</strong> de <strong>Authorization</strong></li>
    <li>Cole o <strong>Token</strong> logo após <strong>bearer</strong></li>
</ol>
Por exemplo:
<ul>
    <li><strong>Key</strong>: Authorization </li>
    <li><strong>Value</strong>:bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE3MDA3NDY3NDIsImV4cCI6MTcwMDc1MDM0MiwibmJmIjoxNzAwNzQ2NzQyLCJqdGkiOiJWZ1JPZ2JqTjA2eHpxSDNYIiwic3ViIjoiMTciLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.8UgJ-hZzinLgv_NYmHpoMvkkhR0FKl8zCCcsghT96fk
    </li>
</ul>
<strong>Pronto! Você está Logado! Agora pode acessar Todas as Rotas! As Protegidas e as Não Protegidas</strong>
</br></br>

<strong>Rotas Protegidas:</strong>

    Route::resource('/users', UserController::class);
    Route::resource('/products', ProductController::class)->except(['show']);


<strong>Rotas Não Protegidas:</strong>

    Route::post('/users', [UserController::class, 'store']);

    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    
</br>

<strong>Filtragem de Campos(fields) pela URL:</strong></br>
<ul>
    <li>Acrescente <strong>?fields=title,url,price,description</strong> no final do Endpoint <strong>/api/products</strong></li>
    <li>Faça uma Requisição com o verbo <strong>GET</strong> e o Endpoint formado(api/products?fields=title...)</li>
    <li>Retire o atributo que você não deseja exibir. Só serão exibidos os listados em <strong>fields</strong></li>
</ul>
</br>

<strong>Database Seeding</strong></br>

Estes Produtos foram <strong>Populados em Massa</strong> através da: 
<ul>
    <li>Criação da Factory ProductFactory</li>
    <li>Criaçao do Seeder ProductsTableSeeder</li>
    <li>Execução do DatabaseSeeder</li>     
</ul>
 
<strong>Como isso Funciona?</strong>

Simples! Como o próprio nome diz: 

Factory = Fábrica</br>
Seeder = Semeador 

<strong>Factories:</strong>

Na Factory relacionamos cada chave do Produto com um faker(). Esse faker() é usado para criar valores fictícios. Podemos escolher vários formatos de faker() disponíveis na Biblioteca PHP Faker do GitHub https://github.com/fzaninotto/Faker

Exemplo:
‘url’ => fake()→url()

A Factory faz apenas isso. Só define o Formato que será construído. 
Tecnicamente, ela define como criar Instâncias da Classe Products

<strong>Seeders:</strong>

No Seeder nós semeamos/populamos o Banco de Dados com dados fictícios definidos na Factory</br>
Nesse Projeto eu decidi popular 15 Instâncias/registros conforme o trecho de código abaixo:

Product::factory(15)→create();

<strong>Database Seeder:</strong>

O DatabaseSeeder é responsável por reunir todos os Seeders do Projeto e executá-los em sequência na ordem de cima para baixo. Se um Seeder depende de outro ele deve estar abaixo do que ele depende para ser executado depois.

Isso significa que quando o DatabaseSeeder for executado teremos vários Produtos Fictícios que serão fundamentais para testarmos o Projeto
