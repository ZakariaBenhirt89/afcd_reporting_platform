<?php

namespace App\Listeners;

use App\Events\LogedUser;
use App\Models\User;
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
        $user = User::find($event->username);
        $user->isOnline = true;
        $user->save();
    }
}
