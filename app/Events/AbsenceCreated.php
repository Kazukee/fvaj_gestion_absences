<?php

namespace App\Events;

use App\Absence;
use Illuminate\Queue\SerializesModels;

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
}
