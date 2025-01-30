<?php
/** Esse helper deve ser adicionado ao composer.json, para que o composer.json faça a leitura e o laravel entenda que esse nosso arquivo existe
 *
 * Dentro do "autoload" deve ser criada uma nova configuração
 *
 * Trecho de código que deve ser adicionado:
 *
 * "files": ["app/Helpers/functions.php"]
 *
 * Rodar o comando para o composer se auto atualizar e gerar as suas dependencias:
 * $ composer dumpautoload
 *
 * Dessa maneira o laravel vai entender que o arquivo existe de forma globla
 *
*/

if( !function_exists('isEmail') ) {
    function isEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}