<?php

namespace Gsferro\ServiceMail\Mail;

use Gsferro\ServiceMail\Events\MailerEvent;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Mailer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
//    public function __construct(string $view, string $subject, $data)
    public function __construct(MailerEvent $event)
    {
//        $this->view    = $view;
//        $this->subject = $subject;
//        $this->data    = $data;

        $this->event    = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->subject($this->event->subject)
            ->view($this->event->view)
            ->with('data', $this->event->data);

        if (isset($this->event->attach)) {
            $mail = $mail->attach($this->event->attach);
        }

        if (isset($this->event->cc)) {
            $mail = $mail->cc($this->event->cc);
        }

        return $mail;
    }
}
