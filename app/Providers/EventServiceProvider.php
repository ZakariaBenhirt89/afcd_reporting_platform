<?php

namespace App\Providers;

use App\Events\LogedUser;
use App\Events\LogoutUser;
use App\Events\UpdateReport;
use App\Listeners\LogedUserListner;
use App\Listeners\LogoutEventListner;
use App\Listeners\ReportEventListner;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
        Event::listen(LogedUser::class , [LogedUserListner::class , 'handle']);
        Event::listen(LogoutUser::class , [LogoutEventListner::class , 'handle']);
        Event::listen(UpdateReport::class , [ReportEventListner::class , 'handle']);

    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
