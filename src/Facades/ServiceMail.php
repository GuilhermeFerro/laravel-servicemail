<?php

namespace Gsferro\ServiceMail\Facades;

use Illuminate\Support\Facades\Facade;

class ServiceMail extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'servicemail'; // em minusculo
    }
}