# Iniciar a aplicação

Dentro do container, executar
```sh
npm run install
# npm run build
```

Acessar a aplicação:
> http://localhost:8003

## Possível erro no layout

Se der algum erro na estilização da página, executar os comandos abaixo dentro do container

```sh
php artisan view:clear
php artisan cache:clear
php artisan route:clear
php artisan config:clear
# npm run build
```

## Ferramentas usadas:

### Stubs
### Laravel pint
```sh
composer require laravel/pint --dev
```

Verifica se o laravel pint vai rodar

```sh
./vendor/bin/pint
```

Vai dar o erro:

> In RecursiveDirectoryIterator.php line 111:
>
>  RecursiveDirectoryIterator::__construct(/var/www/.docker/mysql/dbdata/#innodb_redo): Failed to open directory: Permission denied
>
> In RecursiveDirectoryIterator.php line 43:
>
>  RecursiveDirectoryIterator::__construct(/var/www/.docker/mysql/dbdata/#innodb_redo): Failed to open directory: Permission denied

Esse erro ocorre pois o diretporio .docker não tem nada a ver com a instalação do laravel ou do php, ele está apenas guardando as dependencias do container. Como resolver?

Criar na raiz um arquivo de configuração chamdo pint.json e ter a configuração para que ele ignore o diretório .docker

> {
>
>    "exclude": [
>
>       ".docker"
>
>   ]
> }

rodar o comando novamente
```sh
./vendor/bin/pint
```

Acrescentar dento do composer.json o atalho para executar o pint

"scripts": {
    "pint": [
        "./vendor/bin/pint"
    ],

    [...]
}

Gerar o composer
```sh
composer dumpautoload
```

Executar o pint
```sh
composer pint
```