# Laravel 7 + IBM Watson Tone

## O que essa aplicação faz?

A aplicação utiliza a **API da IBM Watson** e em específico serviço **Tone Analyzer**, o qual analisa uma ou mais frases para identificar as emoções contidas nela(s).

Na página inicial da aplicação você terá um formulário, onde irá digitar **uma frase em inglês (português ainda não é suportado)** e então o Watson vai fazer todo o trabalho.

Fora isso é possível adicionar uma observação à sentenção (no database local) e também marcar a análise do Watson como "aceita por você".

Ainda na página inicial há uma tabela listando todas as frases cadastradas/analisdas pelo Watson, com a possibilidade de **Ver mais** ou **Excluir**.

### Estrutura da Aplicação

- Padrão do Laravel / MVC
- Repositories
- Services
- Helpers

### Recursos Específicos

- Laravel Mix
- Bootstrap
- FontAwesome

---

## Pré-requisitos:

- instale o mysql 5.7
    - com docker se preferir: `docker run --name mysql57 -e MYSQL_ROOT_PASSWORD=docker -p 3306:3306 -t mysql:5.7.28`
- instale o PHP 7.3+
- instale o composer
- instale o node/npm

## IBM Watson Tone Analyzer

- Entre no site: https://www.ibm.com/watson/services/tone-analyzer/
- Se cadastre
- Obtenha o `API TOKEN` e as `credentials` atraver da área **Manager** (após efetuar o login)

## Agora execute os seguintes comandos:

- composer install
- npm install
- npm run dev
- valide se existe o arquivo `.env`, se não existir, duplique o arquivo `.env.example` e ajuste os valores
- no final do arquivo `.env` insira os valores da **API do Watson**
- php artisan serve

## Pronto!

Agora é só testar.

Digite uma frase **em inglês** no formulário da página inicial e aguarde o processamento da API do Watson Tone Analyzer.

Ele te dará algumas informações referentes as **emoções identificadas na frase**.
