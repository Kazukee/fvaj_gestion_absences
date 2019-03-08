<?php

namespace App\Events;

use App\Absence;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;

class AbsenceCreated
{
    use SerializesModels;

    public $absence;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Absence $absence)
    {
        $this->absence = $absence;
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
