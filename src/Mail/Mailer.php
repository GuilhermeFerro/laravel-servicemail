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
     * @var MailerEvent
     */
    public $event;
    /**
     * Create a new message instance.
     *
     * @param MailerEvent $event
     */
//    public function __construct(string $view, string $subject, $data)
    public function __construct(MailerEvent $event)
    {
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->subject($this->event->subject)
            ->view($this->event->view, $this->event->data);

        if (!empty($this->event->attach)) {
            $mail = $mail->attach($this->event->attach);
        }

        if (!empty($this->event->cc)) {
            $mail = $mail->cc($this->event->cc);
        }

        return $mail;
    }
}
