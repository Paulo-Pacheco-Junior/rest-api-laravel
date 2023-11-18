<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
 
<h2>CRUD feito com API REST<h2>
<h3>Projeto Nível Iniciante/Intermediário</h3>
<ul>
    <li>Autenticação e Autorização JWT (utilizando o pacote tymon/jwt-auth),</li>
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

