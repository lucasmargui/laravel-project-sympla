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

#### Instalação do Node.js e Compilação de Recursos:

Instale as dependências do Node.js necessárias para o projeto:

```
npm install
```

Compile os recursos do frontend com o comando:

```
npm run dev
```

## Pages

![image](https://github.com/user-attachments/assets/68cead34-9a1c-4ba2-84fc-0492a34d744c)

![image](https://github.com/user-attachments/assets/191c6400-aa4a-42c5-9835-3e4b01e1171d)

![image](https://github.com/user-attachments/assets/43bca8e7-aaac-4267-a7c0-1fe7a0919f2e)

![image](https://github.com/user-attachments/assets/1f5b5c86-e197-4de0-9962-3f90d5995675)

![image](https://github.com/user-attachments/assets/87e4bdd2-6409-4246-af06-2a9194402176)

![image](https://github.com/user-attachments/assets/9f23826c-9d55-4bd4-bea2-09c6a43aee3e)


