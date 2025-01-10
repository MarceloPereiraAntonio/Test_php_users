#### Funcionalidades Implementadas
* CRUD completo de cadastro de usuarios, com validação dos dados ao cadastrar ou editar.

### Passo a passo para rodar esse projeto
Clone Repositório
```sh
git clone -b https://github.com/MarceloPereiraAntonio/Test_php_users
```
```sh
cd Test_php_users
```

Crie o Arquivo .env
```sh
cp .env.example .env
```

Atualize essas variáveis de ambiente no seu arquivo .env
```dosini

APP_NAME="New project"
APP_URL=http://localhost:9000

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=Laravel
DB_USERNAME=youruser
DB_PASSWORD=yourpassword


REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```

Suba os containers do projeto
```sh
docker-compose up -d
```

Acesse o container app
```sh
docker-compose exec app bash
```
Instale as dependências do projeto
```sh
composer install
```

Gere a key do projeto Laravel
```sh
php artisan key:generate
```

Rodar as migrations
```sh
php artisan migrate
```

Fora do container instale as dependências do Node.js
npm install
```sh
npm install
npm run dev
```

Obs: Foi criado um usuario default ao rodar as migration para ter mais facilidade na hora de testar 
esses são os dados:
Login:teste@testes.com
Senha:12345678

Acesse o projeto
[http://localhost:9000](http://localhost:9000)
