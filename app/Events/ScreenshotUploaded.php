<?php

namespace App\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ScreenshotUploaded implements ShouldBroadcast
{
    public $screenshot = '';
    private $id = '';

    public function __construct($id, $screenshot)
    {
        $this->id = $id;
        $this->screenshot = $screenshot;
    }

    public function broadcastOn()
    {
        return new PrivateChannel("mail-{$this->id}");
    }
}
