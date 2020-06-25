<?php

namespace Gsferro\ServiceMail\Services;

use Gsferro\ServiceMail\Events\MailerEvent;

class ServiceMail
{
    /**
     * @param string $view
     * @param string $subject
     * @param string $to
     * @param mixed $data
     * @param \DateTime|null $timeEvent
     * @return ServiceMail
     */
    /*public function __construct(string $view, string $subject, string $to, $data, ?\DateTime $timeEvent = null)
    {
        event(new MailerEvent($view, $subject, $to, $data, $timeEvent));
//        return new static();
    }*/

    /**
     * @param string $view
     * @param string $subject
     * @param string $to
     * @param mixed $data
     * @param \DateTime|null $timeEvent
     *
     */
//    public function send(string $view, string $subject, string $to, $data, ?\DateTime $timeEvent = null)
    public function send(
        string $view,
        string $subject,
        string $to,
        $data,
        ?\DateTime $timeEvent = null,
        string $attach = null,
        $cc = null
    )
    {
        event(new MailerEvent($view, $subject, $to, $data, $timeEvent, $attach, $cc));
//        return new static();
    }
}