<?php

namespace Gsferro\ServiceMail\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MailerEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $view;
    public $subject;
    public $to;
    public $data;
    public $timeEvent;

    /**
     * Create a new Job instance.
     *
     * @param string $view
     * @param string $subject
     * @param string $to
     * @param $data
     * @param \DateTime|null $timeEvent
     * @param string $attach
     * @param $cc
     */
    public function __construct(
        string $view,
        string $subject,
        string $to,
        $data,
        ?\DateTime $timeEvent = null,
        string $attach = null,
        $cc = null
    )
    {
        $this->view      = $view;
        $this->subject   = $subject;
        $this->to        = $to;
        $this->data      = $data;
        $this->timeEvent = $timeEvent;
        $this->attach    = $attach;
        $this->cc        = $cc;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return new PrivateChannel('channel-name');
    }

}