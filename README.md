<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
 
<h2>CRUD feito com API REST<h2>
<h3>Projeto Nível Iniciante / Intermediário</h3>
<ul>
    <li>Autenticação e Autorização JWT (utilizando o pacote tymon/jwt-auth),</li>
    <li>Database seeding</li>
    <li>Filtragem de Campos(fields) pela URL,</li>
    <li>Validação FormRequest,</li>
    <li>Endpoints de Users, Products e Auth(login, logout...)</li>
</ul>
___________________________

// ROTAS PROTEGIDAS:

    Route::resource('/users', UserController::class);
    Route::resource('/products', ProductController::class)->except(['show']);


// ROTAS NÃO PROTEGIDAS:

    Route::post('/users', [UserController::class, 'store']);

    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    

COMO FUNCIONA

Vamos definir a URL base http://127.0.0.1:8000(a porta 8000, ou host 127.0.0.1 podem ser diferentes conforme a configuração do seu ambiente) 
Todas as Requisições HTTP que irão interagir com os recursos da API utilizarão a combinação da URL base + Endpoint (Essa combinação se chama URI)
Se combinarmos a URL base  http://127.0.0.1:8000 e o endpoint /api/products 
formaremos a URI http://127.0.0.1:8000/api/products 
Agora que deixei claro que não desconheço os termos técnicos. Para simplificar as explicações, sempre que formos fazer requisições irei mencionar apenas o Endpoint.   

Então vamos à Prática!

No Postman:

→ Faça uma Requisição com o verbo GET e Endpoint /api/products

Irão aparecer 10 produtos logo abaixo com as chaves:

‘id’, ‘title’, ‘url’, ‘price’, ‘description’, ’created_at’, ’updated_at’

Estes produtos tiveram seus Índices Populados em Massa através da: 
<ul>
    <li>→ Criação da Factory ProductFactory</li>
    <li>→ Criaçao do Seeder ProductSeeder</li>
    <li>→ Execução do DatabaseSeeder</li>     
</ul>
 
Como isso Funciona?

Simples! Como o próprio nome diz: 

Factory = Fábrica
Seeder = Semeador 

FACTORIES:

Na Factory relacionamos cada Chave do Produto com um faker(). Esse faker() tem vários formatos disponíveis na Biblioteca PHP Faker do GitHub https://github.com/fzaninotto/Faker

Exemplo:
‘url’ => fake()→url()

A Factory faz apenas isso. Só define o Formato que será construído. 
Tecnicamente, ela define como criar Instâncias da Classe Products

SEEDERS:

No Seeder nós semeamos/populamos o Banco de Dados com dados fictícios definidos na Factory Nesse Projeto eu decidi popular 15 Instâncias/registros conforme o trecho de código abaixo:

Product::factory(15)→create();

DATABASE SEEDER:

O DatabaseSeeder é responsável por reunir todos os Seeders do Projeto e executá-los em sequência na ordem de cima para baixo. Se um Seeder depende de outro ele deve estar abaixo do que ele depende para ser executado depois.

Isso significa que quando o DatabaseSeeder for executado teremos vários Produtos Fictícios que serão fundamentais para testarmos o Projeto


[EM DESENVOLVIMENTO! CONTINUAÇÃO EM BREVE]
    

## Instalação

Clone o projeto:

```
git clone «URL DO REPOSITÓRIO»
```

Uma vez clonado, abra na pasta do projeto:

```
cd «DIR DO PROJETO»
```

Dentro da pasta do projeto, copie o arquivo *.env.example* para *.env*.
Agora, modifique o .env insirindo insira as credenciais do seu banco de dados.

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
DB_DATABASE=beerandcode
DB_USERNAME=dba
DB_PASSWORD=senha1234
```

Agora, instale o projeto:

```
composer install
php artisan key:generate
php artisan migrate
php artisan serve
```

