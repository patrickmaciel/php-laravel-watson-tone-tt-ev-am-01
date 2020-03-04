# Laravel 7 + IBM Watson Tone

**Pré-requisitos:**

- instale o mysql 5.7
    - com docker se preferir: `docker run --name mysql57 -e MYSQL_ROOT_PASSWORD=docker -p 3306:3306 -t mysql:5.7.28`
- instale o PHP 7.3+
- instale o composer
- instale o node/npm

**IBM Watson Tone Analyzer**

- Entre no site: https://www.ibm.com/watson/services/tone-analyzer/
- Se cadastre
- Obtenha o `API TOKEN` e as `credentials` atraver da área **Manager** (após efetuar o login)

**Agora execute os seguintes comandos:**

- composer install
- npm install
- npm run dev
- valide se existe o arquivo `.env`, se não existir, duplique o arquivo `.env.example` e ajuste os valores
- no final do arquivo `.env` insira os valores da **API do Watson**
- php artisan serve

**Pronto!**

Agora é só testar.

Digite uma frase **em inglês** no formulário da página inicial e aguarde o processamento da API do Watson Tone Analyzer.

Ele te dará algumas informações referentes as **emoções identificadas na frase**.
