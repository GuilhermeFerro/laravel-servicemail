<?php

return [

    /*
    |---------------------------------------------------
    | Redirecionamento do e-mail como Debug
    |---------------------------------------------------
    | Uma solução para debugar o envio é o mailtrap.io.
    | Porém, a solução free so permite o envio de 500/mês
    | Para tal, você pode enviar para uma caixa de e-mail
    | compartilhada ou privada que redireciona-os
    */

    "redirect" => env('SERVICEMAIL_REDIRECT', null),
];