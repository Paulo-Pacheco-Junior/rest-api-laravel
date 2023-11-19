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

<strong>Rotas Protegidas:</strong>

    Route::resource('/users', UserController::class);
    Route::resource('/products', ProductController::class)->except(['show']);


<strong>Rotas Não Protegidas:</strong>

    Route::post('/users', [UserController::class, 'store']);

    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    

<strong>Explicando o Projeto</strong>

Vamos definir a <strong>URL base</strong> http://127.0.0.1:8000 (a porta 8000, ou host 127.0.0.1 podem ser diferentes conforme a configuração do seu ambiente)</br> 
Todas as <strong>Requisições HTTP</strong> que irão interagir com os recursos da API utilizarão a combinação da <strong>URL base + Endpoint</strong> (Essa combinação se chama <strong>URI</strong>)</br>
Se combinarmos a <strong>URL base</strong> http://127.0.0.1:8000 e o <strong>endpoint /api/products</strong></br> 
formaremos a <strong>URI</strong> http://127.0.0.1:8000/api/products</br> 
Agora que deixei claro que não desconheço os termos técnicos. Para simplificar as explicações, sempre que formos fazer requisições irei mencionar apenas o <strong>Endpoint</strong>   

<strong>Então vamos à Prática!</strong>

No Postman:

→ Faça uma Requisição com o verbo <strong>GET</strong> e Endpoint <strong>/api/products</strong>

Irão aparecer 10 produtos logo abaixo com as chaves:
<ul>
    <li>'id'</li>
    <li>'title'</li>
    <li>'url'</li>
    <li>'price'</li>
    <li>'description'</li>
    <li>'created_at'</li>
    <li>'updated_at'</li>
</ul>

Estes produtos foram Populados em Massa através da: 
<ul>
    <li>Criação da Factory ProductFactory</li>
    <li>Criaçao do Seeder ProductSeeder</li>
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


<h3>[EM DESENVOLVIMENTO! CONTINUAÇÃO EM BREVE]</h3>
    

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
php artisan migrate --seed
php artisan serve
```

