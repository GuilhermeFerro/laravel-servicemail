# Laravel ServiceMail
Service para envio de e-mail via queue easy no Laravel

### Install via composer
 `composer require gsferro/servicemail`

### Configuração
- Adicione o ServiceProvider em providers de `app.php`
 
>
    /*
    |---------------------------------------------------
    | ServiceMail
    |---------------------------------------------------
    */

    \Gsferro\ServiceMail\Providers\ServiceMailServiceProvider::class,
    
- Adicione em `$listen` o event em `EventServiceProvider.php`
 
>
    /*
    |---------------------------------------------------
    | ServiceMail
    |---------------------------------------------------
    */
     'Gsferro\ServiceMail\Events\MailerEvent' => [
        'Gsferro\ServiceMail\Listeners\MailerJobListener',
     ],
    
- Publish config
> 
    php artisan vendor:publish --provider="Gsferro\ServiceMail\Providers\ServiceMailServiceProvider" --tag=config    
    
### Uso
``` php
<?php   
    servicemail()->send(
        string $view,
        string $subject,
        string $to,
        $data,
        ?\DateTime $timeEvent = null,
        string $attach = null,
        $cc = null
    );
 ```   
    
- Gerar migration
 1.   php artisan queue:table
 2.   php artisan queue:failed-table
 
### Alternativa ao mailtrap
- set a variavel `SERVICEMAIL_REDIRECT` no .env ou dentro do config/servicemail.php para enviar o email para si como debug/teste
 
### Usando database sqlite
- Crie o banco local
 
 `touch database/database.sqlite`
   
- Publish Migrations em migrations/servicemail
> 
    php artisan vendor:publish --provider="Gsferro\ServiceMail\Providers\ServiceMailServiceProvider"  --tag=migrations
    
- Altere o arquivo `config/database.php`
>
``` php
    'connections' => [
        'sqlite' => [
            'driver'                  => 'sqlite',
            'database'                => database_path( 'database.sqlite' ),
            'prefix'                  => '',
            'foreign_key_constraints' => env( 'DB_FOREIGN_KEYS', true ),
        ],
```
 
 - Altere o arquivo `config/queue.php`
>
``` php
     'connections' => [
         'sqlite' => [
             'connection'   => 'sqlite',
             'driver'       => 'database',
             'table'        => 'jobs',
             'queue'        => 'default',
             'retry_after'  => 90,
         ],
``` 
 
 - Altere o arquivo ``.env``

> 
    QUEUE_CONNECTION="sqlite"

Ou coloque direto no arquivo `config/queue.php`  
```php 
[
    'default' => "sqlite",
]
```

#### Rodar migrate
>
    php artisan migrate --database=sqlite --path=database/migrations/jobs

#### Rodar queue
    php artisan queue:work sqlite --tries=3
    
###### links úteis:
- https://stackoverflow.com/questions/35535920/laravel-5-how-to-configure-the-queue-database-driver-to-connect-to-a-non-default
- https://laracasts.com/discuss/channels/laravel/l52-how-i-can-use-differente-db-connection-for-queue
