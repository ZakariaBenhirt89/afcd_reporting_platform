<?php

namespace App\Listeners;

use App\Events\LogoutUser;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogoutEventListner
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
     * @param  \App\Events\LogoutUser  $event
     * @return void
     */
    public function handle(LogoutUser $event)
    {
        //
        $user = User::find($event->username);
        $user->isOnline = false ;
        $user->save();
        Log::info("logout !!");
    }
}
