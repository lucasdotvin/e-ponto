<h1 align="center">E-Ponto</h1>

<p align="center">
    <a href="https://laravel.com">
        <img alt="Made With Laravel Badge" src="https://img.shields.io/badge/made%20with-Laravel-red">
    </a>
    <a href="https://opensource.org/licenses/MIT">
        <img alt="MIT License Badge" src="http://img.shields.io/badge/license-MIT-blue.svg?style=flat">
    </a>
</p>

Sistema de ponto eletrônico para bolsistas do Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte.

## Iniciando

Essas instruções lhe darão uma cópia do projeto e um caminho para executá-lo localmente para fins de desenvolvimento e teste.

### Pré-Requisitos

Para executar esse projeto, você precisará do seguinte:

* Composer
* npm
* PHP >= 7.3 e das seguintes extensões:
    * BCMath
    * Ctype
    * Fileinfo
    * JSON
    * Mbstring
    * OpenSSL
    * PDO
    * Tokenizer
    * XML
* MySQL >= 5.6

### Instalação

Clone esse repositório via Git ou baixe-o em um arquivo compactado aqui mesmo no GitHub. Em seguida, instale as dependências:

```bash
composer install
```

Após, crie uma cópia do arquivo `.env.example` chamada `.env`:

```bash
cp .env.example .env
```

> No Windows, o comando `copy` é o equivalente disponível ao `cp`.

Agora, preencha o arquivo `.env` com as informações da conexão ao banco de dados (se for o caso).

Também é preciso inserir os dados de autenticação da API do Sistema Unificado de Administração Pública (SUAP), que podem ser obtidos na seção [SUAP para Desenvolvedores](https://suap.ifrn.edu.br/api/applications/).

Em seguida, use o seguinte comando para gerar a chave da aplicação:

```bash
php artisan key:generate
```

Prosseguindo, execute as migrations do projeto:

```bash
php artisan migrate
```

Após, semeie o banco de dados:

```bash
php artisan db:seed
```

> Esse passo é obrigatório, pois os semeadores inserem dados padrão indispensáveis.

Agora, instale as dependências do front-end, através do NPM:

```bash
npm install
```

Em seguida, compile os assets para desenvolvimento:

```bash
npm run dev
```

> Outras maneiras de lidar com os assets estão disponíveis na [documentação do Laravel Mix](https://laravel.com/docs/master/mix).

Por fim, use o comando abaixo para executar o projeto localmente:

```bash
php artisan serve
```

## Construído Com

* [Bulma](https://bulma.io/)
* [Laravel](https://laravel.com/)

## Contribuições

Sinta-se absolutamente à vontade para contribuir.

### Workflow

Este projeto adota o Gitflow como seu fluxo de trabalho. Você pode saber mais sobre do que se trata e como utilizá-lo [neste guia](https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow).

## Licença

Esse projeto é distribuído sob a Licença MIT. Leia o arquivo [LICENSE](LICENSE) para ter mais detalhes.
