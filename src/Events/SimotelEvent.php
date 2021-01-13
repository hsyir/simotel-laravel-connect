<?php

namespace Hsy\LaraSimotel\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SimotelEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $apiData;

    /**
     * Create a new event instance.
     *
     * @param $apiData
     */
    public function __construct($apiData)
    {
        $this->apiData = $apiData;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
