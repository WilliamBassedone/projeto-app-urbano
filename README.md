# API de Problemas Urbanos

Uma API REST desenvolvida em Laravel para gerenciamento de problemas urbanos. Fornece endpoints para autenticação, registro e acompanhamento de problemas relacionados a infraestrutura urbana, bem como agrupamento e categorização de questões comunitárias. Projetada para ser consumida por aplicações cliente, como aplicativos móveis desenvolvidos em Java.

## Tecnologias

[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat-square&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white)](https://www.mysql.com)
[![REST API](https://img.shields.io/badge/REST%20API-005C9C?style=flat-square&logo=api&logoColor=white)](https://restfulapi.net)

## Como Funciona

A API utiliza a arquitetura modular do Laravel para organizar funcionalidades em componentes independentes. O projeto é dividido em três módulos principais: um sistema de autenticação que controla o acesso seguro aos endpoints protegidos, um módulo de gerenciamento de grupos para organizar e categorizar problemas, e um módulo de problemas que implementa operações CRUD completas para criar, ler, atualizar e deletar registros de questões urbanas.

A autenticação é baseada em tokens e é obrigatória para acessar recursos protegidos. Uma vez autenticado, o cliente pode fazer requisições para listar todos os problemas, criar novos registros, atualizar informações existentes e deletar questões resolvidas. O sistema utiliza migrações de banco de dados para gerenciar a estrutura das tabelas e garante a integridade dos dados através de relacionamentos e validações adequadas.

Todos os endpoints retornam respostas em formato JSON, permitindo fácil integração com aplicações cliente desenvolvidas em qualquer linguagem de programação. A API segue os princípios RESTful e implementa autenticação segura, validação de dados e tratamento robusto de erros.

## Estrutura

```
projeto-app-urbano/
├── Modules/
│   ├── Authentication/          # Módulo de autenticação
│   │   ├── app/Http/Controllers/
│   │   ├── app/Models/
│   │   ├── config/
│   │   ├── routes/
│   │   └── tests/
│   ├── Groups/                  # Módulo de agrupamento
│   │   ├── app/Http/Controllers/
│   │   ├── app/Models/
│   │   ├── config/
│   │   ├── routes/
│   │   └── tests/
│   └── Problems/                # Módulo de problemas
│       ├── app/Http/Controllers/
│       ├── app/Models/
│       ├── config/
│       ├── database/migrations/
│       ├── routes/web.php
│       └── tests/
├── app/                         # Núcleo da aplicação
│   ├── Http/Controllers/
│   ├── Http/Middleware/
│   ├── Models/
│   ├── Providers/
│   └── Support/
├── bootstrap/                   # Inicialização da aplicação
├── config/                      # Arquivos de configuração
├── database/                    # Seeders, factories e migrações
├── routes/                      # Definição de rotas da API
├── storage/                     # Arquivos de cache e logs
├── tests/                       # Testes automatizados
├── .env.example                 # Configurações de exemplo
├── composer.json                # Dependências PHP
└── README.md                    # Este arquivo
```

## Como Executar

Clone o repositório e configure o projeto em seu ambiente local.

```bash
git clone https://github.com/WilliamBassedone/projeto-app-urbano.git
cd projeto-app-urbano
```

Instale as dependências PHP com Composer:

```bash
composer install
```

Copie o arquivo de configuração de exemplo e gere uma chave de aplicação:

```bash
cp .env.example .env
php artisan key:generate
```

Configure o banco de dados no arquivo `.env` com suas credenciais MySQL e execute as migrações:

```bash
php artisan migrate
```

Inicie o servidor de desenvolvimento:

```bash
php artisan serve
```

A API estará disponível em `http://localhost:8000`. Você pode testar os endpoints usando ferramentas como Postman, Insomnia ou curl. Consulte a documentação dos módulos individuais para conhecer os endpoints disponíveis e como utilizá-los em sua aplicação cliente.
