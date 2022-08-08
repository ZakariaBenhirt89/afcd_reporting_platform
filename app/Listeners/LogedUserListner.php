<?php

namespace App\Listeners;

use App\Events\LogedUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogedUserListner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\LogedUser  $event
     * @return void
     */
    public function handle(LogedUser $event)
    {
        //
    }
}
