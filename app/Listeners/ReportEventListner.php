<?php

namespace App\Listeners;

use App\Events\UpdateReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ReportEventListner
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
     * @param  \App\Events\UpdateReport  $event
     * @return void
     */
    public function handle(UpdateReport $event)
    {
        //
    }
}
