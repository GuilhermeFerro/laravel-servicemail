<?php

namespace Gsferro\ServiceMail\Providers;

use Gsferro\ServiceMail\Services\ServiceMail;
//use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class ServiceMailServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Gsferro\ServiceMail\Events\MailerEvent' => [
            'Gsferro\ServiceMail\Listeners\MailerJobListener',
        ],
    ];

    public function register() {}
    public function boot()
    {
//        parent::boot();
        // em minusculo
        app()->bind('servicemail', function () {
            return new ServiceMail();
        });

        /*
        |---------------------------------------------------
        | Publish
        |---------------------------------------------------
        */

        // config
        $this->publishes([
            __DIR__.'/../config/servicemail.php' => config_path('servicemail.php')
        ], 'config');

        // migrations
        $this->publishes([
            __DIR__.'/../migrations' => database_path('migrations')
        ], 'migrations');
    }
}
