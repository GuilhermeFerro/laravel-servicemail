<?php

namespace Gsferro\ServiceMail\Listeners;

use Gsferro\ServiceMail\Events\MailerEvent;
use Gsferro\ServiceMail\Jobs\MailerJob;

class MailerJobListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MailerEvent  $event
     * @return void
     */
    public function handle(MailerEvent $event)
    {
        dispatch(new MailerJob( $event ))->delay($event->timeEvent ?? now());
    }
}
