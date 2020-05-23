<?php

namespace App\Events;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MailSent implements ShouldBroadcast
{
    public $to = [];
    public $subject = '';

    public function __construct(array $to, $subject)
    {
        $this->to = $to;
        $this->subject = $subject;
    }

    public function broadcastOn()
    {
        return 'crawlers';
    }
}
