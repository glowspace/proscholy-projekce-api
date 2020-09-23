<?php

namespace App\Events;

use App\Models\Session;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SessionStatusUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Session
     */
    public $session;


    /**
     * Create a new event instance.
     *
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('Session.' . $this->session->id);
    }
}
