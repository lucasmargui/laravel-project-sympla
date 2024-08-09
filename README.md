<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">🚀 Development of a CRUD structure for future references</p>

## Resources Used
- Laravel
- JetStream
- Xampp
- Composer
- Node

# Configuração inicial do ambiente

## Criando o projeto

O comando create-project é utilizado para criar um novo projeto a partir de um template em Laravel.

```
composer create-project laravel/laravel laravel-project-sympla
```

## Conexão com Banco de dados

#### Criação do Banco de Dados:

- Inicie SQL no XAMPP

- Navegue até http://localhost/phpmyadmin/ para acessar a interface de gerenciamento de bancos de dados  

- Crie um novo banco de dados com o nome desejado.

#### Configuração do Banco de Dados no Laravel:

- Abra o arquivo .env no seu projeto Laravel e localize a variável DB_DATABASE.

- Altere o valor dessa variável para nome do banco de dados criado

#### Criação das tabelas no Banco de Dados:

Use o Artisan para criar as tabelas de database/migrations no Banco de Dados 

```
php artisan migrate
```

## Instalação do Jetstream para Autenticação

#### Instalação do Jetstream:

Utilize o Composer para adicionar o Jetstream ao seu projeto Laravel:

```
composer require laravel/jetstream
```

#### Instalação do Livewire:

Use o Artisan para instalar o Jetstream com suporte ao Livewire:

```
php artisan jetstream:install livewire
```

#### Criação das tabelas no Banco de Dados:

Use o Artisan para criar as tabelas geradas pelo Jetstream no Banco de Dados 

```
php artisan migrate
```

#### Instalação do Node.js e Compilação de Recursos:

Instale as dependências do Node.js necessárias para o projeto:

```
npm install
```

Compile os recursos do frontend com o comando:

```
npm run dev
```

## Gerenciamento de Migrations no Laravel

#### Estrutura da Migration:
- Método up(): Define as operações a serem realizadas quando a migration é aplicada, como criar uma tabela.
- Método down(): Define as operações para reverter as mudanças realizadas pelo método up(), como deletar uma tabela.

#### Criação Migrations: 
- Comando: php artisan make:migration nome_da_migration
- Exemplo: php artisan make:migration create_products_table
- Descrição: Este comando cria um novo arquivo de migration na pasta database/migrations. As migrations são usadas para criar e modificar tabelas no banco de dados.

#### Executar Migrations:
- Comando: php artisan migrate
- Descrição: Aplica todas as migrations pendentes, criando ou modificando tabelas no banco de dados conforme definido nos métodos up() das migrations.

#### Verificar Status das Migrations:
- Comando: php artisan migrate:status
- Descrição: Exibe o status de cada migration, indicando se foi aplicada ou não.

#### Atualizar Tabelas:
- Comando: php artisan migrate:fresh
- Descrição: Remove todas as tabelas do banco de dados utilizando o método down() e recria-as usando o método up(). Atenção: Este comando deletará todas as tabelas do banco de dados.

#### Adicionar Campos:
- Comando: php artisan make:migration add_field_to_table
- Exemplo: php artisan make:migration add_category_to_products_table
- Descrição: Cria uma nova migration para adicionar campos a uma tabela existente. Utilize Schema::table para modificar tabelas já existentes.

#### Aplicar Alterações:
- Comando: php artisan migrate
- Descrição: Após criar uma migration para adicionar ou modificar campos, execute este comando para aplicar as alterações.

#### Desfazer Alterações:
- Comando: php artisan migrate:rollback
- Descrição: Reverte a última batch de migrations aplicadas.
- Comando: php artisan migrate:reset
- Descrição: Reverte todas as migrations aplicadas e as reexecuta. Deleta todas as tabelas e recria-as a partir das migrations.

# Iniciando o projeto

Use o Artisan para iniciar o servidor.

```
php artisan serve
```

# Documentação do projeto


## Template Inheritance

Criação pasta chamada layouts dentro de resources/views, onde foi adicionado o arquivo main.blade.php. Este arquivo serve como um layout base para as páginas, contendo a diretiva @yield('content'), que é responsável por renderizar o conteúdo específico das páginas.

![image](https://github.com/user-attachments/assets/794ffe26-b45d-4ee2-b7ae-325ddef51c32)


- Exibição de Erros: O bloco @if ($errors->any()) verifica se há algum erro de validação. Se existirem, uma div com a classe alert alert-danger é exibida, listando todos os erros em um <ul> com <li> para cada erro.

- Exibição de Mensagens de Sucesso: O bloco @if(session('msg')) verifica se há uma mensagem de sucesso armazenada na sessão. Se houver, essa mensagem é exibida em um parágrafo com a classe msg.

- Renderização de Conteúdo Dinâmico: O comando @yield('content') é utilizado para inserir o conteúdo específico de cada página que estender esse layout.

- <x-app-layout>: É um componente Blade fornecido pelo JetStream no Laravel, que implementa configurações de segurança para usuários autenticados. Para garantir o correto funcionamento da autenticação durante a troca de dados entre o cliente e o servidor, é essencial encapsular todo o conteúdo destinado ao @yield dentro desse componente.

![image](https://github.com/user-attachments/assets/c01059d3-1694-4958-9212-4a06395d6b54)

#### @extends('layouts.main'):

Este comando indica que o arquivo Blade atual está estendendo um layout principal chamado main, que está localizado na pasta layouts. O layout é geralmente um template básico que define a estrutura comum para várias páginas, como o cabeçalho, rodapé e outras seções que são reutilizadas em várias views.

#### @section('content'):

Este comando define uma seção de conteúdo dentro do template Blade. A palavra 'content' é o nome da seção. No layout principal (layouts.main), há um comando @yield('content'), que é onde o conteúdo definido nesta seção será inserido.


![image](https://github.com/user-attachments/assets/78f3ab9a-b831-45a2-a7b2-c1d8593821d2)



## Controller

#### Criação do Controller:

Para criar um novo controller no Laravel, utilize o comando Artisan:

```
php artisan make:controller EventController
```
O nome EventController é escolhido para representar um controlador que gerenciará ações relacionadas a eventos. Por padrão, a ação index dentro do controller é configurada para retornar a view welcome.

#### Utilizando o Controller nas Rotas:

Para utilizar o controller em uma rota, primeiro importe-o no arquivo de rotas:

```
use App\Http\Controllers\EventController;
```
Em seguida, configure a rota para usar a ação do controller especificada:

```
Route::get('/', [EventController::class, 'index']);
```

Neste exemplo, a rota '/' está configurada para chamar a ação index do EventController. Assim, ao acessar a URL associada à rota, o Laravel direcionará a requisição para a ação index do controller, que será responsável por processar a requisição e retornar a resposta apropriada.

#### Actions

- index(): Recupera e exibe todos os eventos ou filtra eventos com base em um termo de pesquisa. Exibe esses eventos na visão welcome.

- create(): Retorna a visão events.create, onde o usuário pode criar um novo evento.

- store(Request $request): Valida e armazena um novo evento com base nos dados do formulário. Se houver uma imagem, ela é salva e associada ao evento. O evento é então salvo no banco de dados e o usuário é redirecionado para a página inicial com uma mensagem de sucesso.

- show($id): Exibe os detalhes de um evento específico, incluindo se o usuário atual está participando do evento. Retorna a visão events.show.

- dashboard(): Exibe o painel de controle do usuário, mostrando seus eventos e eventos nos quais ele está participando.

- destroy($id): Exclui um evento específico do banco de dados e redireciona para o painel de controle com uma mensagem de sucesso.

- edit($id): Exibe a visão events.edit para editar um evento específico, mas apenas se o usuário atual for o proprietário do evento.

- update(Request $request): Atualiza um evento específico com base nos dados do formulário. Se uma nova imagem for carregada, ela substitui a imagem antiga. O evento é atualizado no banco de dados e o usuário é redirecionado para o painel de controle com uma mensagem de sucesso.

- joinEvent($id): Adiciona o usuário atual como participante de um evento específico e redireciona para o painel de controle com uma mensagem de confirmação.

- leaveEvent($id): Remove o usuário atual como participante de um evento específico e redireciona para o painel de controle com uma mensagem de sucesso.


## Rotas

![image](https://github.com/user-attachments/assets/4dedb597-6f39-4d84-85c9-fd42e3c36a14)


#### Route::get('/dashboard', ...:

- Define uma rota HTTP GET para o caminho /dashboard. Isso significa que quando um usuário acessa a URL example.com/dashboard, essa rota será acionada.

#### [EventController::class, 'dashboard']:

- Especifica o controlador e o método que devem ser chamados quando a rota /dashboard for acessada.
- EventController::class refere-se à classe EventController, e 'dashboard' é o método dentro desse controlador que será executado para lidar com a solicitação.

![image](https://github.com/user-attachments/assets/7bd6f7da-bbb7-4b6a-81de-b5415a718ac4)

Retornando a view localizada em events/dashboard.blade.php


#### ->name('events.dashboard'):

- Atribui um nome à rota, neste caso 'events.dashboard'. Isso permite que você faça referência a essa rota de forma mais conveniente em outras partes do seu código, como ao gerar URLs ou redirecionar usuários.

 ![image](https://github.com/user-attachments/assets/3e6bbc13-17b8-4857-b9f3-b38d0304fce5)


#### Route::get('/dashboard', [EventController::class, 'dashboard'])->name('events.dashboard');

- Descrição: Exibe o painel de controle ou dashboard, geralmente usado para mostrar uma visão geral dos eventos ou dados relacionados.
- Método HTTP: GET
- Nome: events.dashboard

#### Route::get('/events/create', [EventController::class, 'create'])->name('events.create');

- Descrição: Mostra um formulário para criar um novo evento.
- Método HTTP: GET
- Nome: events.create

#### Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

- Descrição: Exibe os detalhes de um evento específico, identificado pelo ID fornecido na URL.
- Método HTTP: GET
- Nome: events.show

#### Route::get('/events/edit/{id}', [EventController::class, 'edit'])->name('events.edit');

- Descrição: Mostra um formulário para editar um evento existente, identificado pelo ID fornecido na URL.
- Método HTTP: GET
- Nome: events.edit

#### Route::put('/events/update/{id}', [EventController::class, 'update'])->name('events.update');

- Descrição: Atualiza os dados de um evento existente com base nas informações enviadas no formulário e o ID fornecido na URL.
- Método HTTP: PUT
- Nome: events.update

#### Route::post('/events', [EventController::class, 'store'])->name('events.store');

- Descrição: Armazena um novo evento no banco de dados com base nas informações enviadas no formulário.
- Método HTTP: POST
- Nome: events.store

#### Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');

- Descrição: Remove um evento existente do banco de dados com base no ID fornecido na URL.
- Método HTTP: DELETE
- Nome: events.destroy

#### Route::post('/events/join/{id}', [EventController::class, 'joinEvent'])->name('events.joinEvent');

- Descrição: Permite que um usuário se inscreva ou participe de um evento específico identificado pelo ID.
- Método HTTP: POST
- Nome: events.joinEvent

#### Route::delete('/events/leave/{id}', [EventController::class, 'leaveEvent'])->name('events.leaveEvent');

- Descrição: Permite que um usuário saia ou deixe um evento específico identificado pelo ID.
- Método HTTP: DELETE
- Nome: events.leaveEvent




## Pages

![image](https://github.com/user-attachments/assets/68cead34-9a1c-4ba2-84fc-0492a34d744c)

![image](https://github.com/user-attachments/assets/191c6400-aa4a-42c5-9835-3e4b01e1171d)

![image](https://github.com/user-attachments/assets/43bca8e7-aaac-4267-a7c0-1fe7a0919f2e)

![image](https://github.com/user-attachments/assets/1f5b5c86-e197-4de0-9962-3f90d5995675)

![image](https://github.com/user-attachments/assets/87e4bdd2-6409-4246-af06-2a9194402176)

![image](https://github.com/user-attachments/assets/9f23826c-9d55-4bd4-bea2-09c6a43aee3e)


