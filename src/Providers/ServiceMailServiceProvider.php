<?php

namespace Gsferro\ServiceMail\Providers;

use Gsferro\ServiceMail\Services\ServiceMail;
use Illuminate\Support\ServiceProvider;

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
        // Facades
        $this->publishes([
//            __DIR__.'/Facades/ServiceMail.php' => app_path('Facades/ServiceMail.php'),
        // Helpers
//            __DIR__.'/Helpers/servicemail.php' => app_path('Helpers/servicemail.php'),
        // Providers
//            __DIR__.'/Providers/ServiceMailServiceProvider.php' => app_path('Providers/ServiceMailServiceProvider.php'),
        // Services
//            __DIR__.'/ServicesServices/ServiceMail.php' => app_path('Services/ServiceMail.php'),
        ]);
    }
}
