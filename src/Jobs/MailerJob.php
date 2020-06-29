<?php

namespace Gsferro\ServiceMail\Jobs;

use Gsferro\ServiceMail\Events\MailerEvent;
use Gsferro\ServiceMail\Mail\Mailer;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class MailerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var MailerEvent
     */
    public $event;

    /**
     * Create a new Job instance.
     * @param MailerEvent $event
     */
    public function __construct(MailerEvent $event)
    {
        $this->event = $event;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $to = config('servicemail.redirect') ?? $this->event->to;
            \Mail::to($to)->send(new Mailer($this->event));
        } catch (\Exception $e) {
            dump($e->getMessage());
        }
    }
}
