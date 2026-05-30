# Aplicação de Problemas Urbanos

Uma plataforma web para registro, gerenciamento e acompanhamento de problemas urbanos. Permite que usuários autenticados cadastrem, visualizem e agrupem problemas relacionados a infraestrutura urbana, facilitando a organização e resolução de questões comunitárias.

## Tecnologias

[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat-square&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white)](https://php.net)
[![Blade](https://img.shields.io/badge/Blade-FF2D20?style=flat-square&logo=laravel&logoColor=white)](https://laravel.com/docs/blade)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind%20CSS-06B6D4?style=flat-square&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=flat-square&logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)

## Como Funciona

O projeto utiliza a arquitetura modular do Laravel para organizar funcionalidades em componentes independentes. A aplicação é dividida em três módulos principais: um sistema de autenticação que garante acesso seguro à plataforma, um módulo de gerenciamento de grupos para organizar problemas de forma temática ou geográfica, e um módulo de problemas que implementa operações CRUD completas para criar e gerenciar registros de questões urbanas.

A autenticação é obrigatória para acessar o sistema. Uma vez autenticado, o usuário pode acessar rotas protegidas que permitem listar, criar, editar e deletar problemas urbanos através de um controlador dedicado. O sistema utiliza migrações de banco de dados para gerenciar a estrutura das tabelas e garante a integridade dos dados com relacionamentos adequados entre entidades.

O frontend é construído com Blade templates renderizados pelo servidor, combinado com Tailwind CSS para estilização responsiva. A interface permite interações dinâmicas através de JavaScript, oferecendo uma experiência fluida ao usuário ao navegar, criar e editar problemas urbanos.

## Estrutura

```
projeto-app-urbano/
├── Modules/
│   ├── Authentication/          # Módulo de autenticação
│   │   ├── app/
│   │   ├── config/
│   │   ├── resources/
│   │   ├── routes/
│   │   └── ...
│   ├── Groups/                  # Módulo de agrupamento
│   │   ├── app/
│   │   ├── config/
│   │   ├── resources/
│   │   ├── routes/
│   │   └── ...
│   └── Problems/                # Módulo de gerenciamento de problemas
│       ├── app/Http/Controllers/
│       ├── app/Models/
│       ├── config/
│       ├── database/migrations/
│       ├── resources/views/
│       ├── routes/web.php
│       └── tests/
├── app/                         # Núcleo da aplicação
│   ├── Http/Controllers/
│   ├── Models/
│   ├── Providers/
│   └── Support/
├── bootstrap/                   # Inicialização da aplicação
├── config/                      # Arquivos de configuração
├── database/                    # Seeders e factories
├── public/                      # Arquivos públicos (index.php, CSS, JS)
├── resources/                   # Assets e views
│   ├── css/
│   ├── js/
│   └── views/
├── routes/                      # Definição de rotas
├── storage/                     # Arquivos de cache e logs
├── tests/                       # Testes da aplicação
├── .env.example                 # Configurações de exemplo
├── composer.json                # Dependências PHP
├── package.json                 # Dependências JavaScript
└── README.md                    # Este arquivo
```

## Como Visualizar

Clone o repositório e configure o projeto em seu ambiente local.

```bash
git clone https://github.com/WilliamBassedone/projeto-app-urbano.git
cd projeto-app-urbano
```

Instale as dependências PHP com Composer:

```bash
composer install
```

Instale as dependências JavaScript com npm:

```bash
npm install
```

Copie o arquivo de configuração de exemplo e gere uma chave de aplicação:

```bash
cp .env.example .env
php artisan key:generate
```

Configure o banco de dados no arquivo `.env` e execute as migrações:

```bash
php artisan migrate
```

Inicie o servidor de desenvolvimento:

```bash
php artisan serve
```

Acesse a aplicação em seu navegador através de `http://localhost:8000`. A página de boas-vindas será carregada, de onde você pode navegar para as funcionalidades de autenticação e gerenciamento de problemas urbanos.
