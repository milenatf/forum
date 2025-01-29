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