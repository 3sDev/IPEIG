<?php

namespace App\Listeners;

use App\Events\AttendanceStudent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddNotificationAttendanceStudent
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(AttendanceStudent $event)
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
    }
}
