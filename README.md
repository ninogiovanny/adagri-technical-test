
### Repositório

https://github.com/ninogiovanny/adagri-technical-test

``git clone https://github.com/ninogiovanny/adagri-technical-test``

``cd laradock``

### Ambiente docker

``cp .env.example .env``

<p>Configure as informações de acesso ao banco de dados postgres que será criado</p>

***POSTGRES***

``
POSTGRES_VERSION=alpine
POSTGRES_CLIENT_VERSION=15
POSTGRES_DB=adagri
POSTGRES_USER=default
POSTGRES_PASSWORD=secret
POSTGRES_PORT=5432
POSTGRES_ENTRYPOINT_INITDB=./postgres/docker-entrypoint-initdb.d
``

<p>Com as devidas informações atualizadas...</p>

``docker-compose up -d nginx postgres workspace``

<p>Acessar bash do container criado;</p>

``docker-compose exec --user=laradock workspace bash``

<p>ou</p>

``docker-compose exec workspace bash``

<p>No bash, crie o banco de dados postgres:</p>

### Postgres

``docker-compose exec -it postgres psql -U default``

<p>No painel do console do postgres:</p>

``CREATE DATABASE adagri``

<p>Em seguida saia do postgres e vá para o root do projeto</p>

### Laravel

<p>Crie novamente um arquivo .env a partir do .env.example que vem por padrão na raiz do projeto, em seguida altere as informações de acesso ao banco</p>

``
DB_CONNECTION=pgsql
DB_HOST=postgres
DB_PORT=5432
DB_DATABASE=adagris
DB_USERNAME=default
DB_PASSWORD=secret
``

<p>Crie as tableas</p>

``php artisan migrate``

<p>Popule o banco com informações iniciais de seed e factory</p>

``php artisan db:seed``

<p>Acesse: http://localhost:8000 caso a porta padrão não tenha sido alterada no arquivo .env do laradock por alguma inconsistência de portas.</p>