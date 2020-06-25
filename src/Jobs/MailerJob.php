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

    private $view;
    private $subject;
    private $to;
    private $data;

    /**
     * Create a new Job instance.
     *
     * @param string $view
     * @param string $subject
     * @param string $to
     * @param $data
     * @param null $cc
     * @param null $attach
     */
//    public function __construct(string $view, string $subject, string $to, $data, $cc = null, $attach = null)
    public function __construct(MailerEvent $event)
    {

        /*$this->view    = $view;
        $this->subject = $subject;
        $this->to      = $to;
        $this->data    = $data;*/

        $this->event    = $event;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->event->to)->send(new Mailer($this->event));
    }
}
