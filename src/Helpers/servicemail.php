<?php

if ( ! function_exists('servicemail')) {
    /**
     * Initiate ServiceMail hook.
     *
     * @return Gsferro\ServiceMail\Services\ServiceMail
     */
    function servicemail()
    {
        return app('servicemail');
    }
}