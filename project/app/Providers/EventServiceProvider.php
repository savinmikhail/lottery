<?php

namespace App\Providers;

use App\Events\AfterUpdatedLotteryGameMatch;
use App\Events\BeforeLotteryGameUserSaved;
use App\Events\BeforeUpdateLotteryGameMatch;
use App\Events\CreatedUser;
use App\Listeners\FindWinnerUserLotteryGameMatchListener;
use App\Listeners\GamerCountCheckListener;
use App\Listeners\LotteryGameUserUniqueListener;
use App\Listeners\RewardPointsWinnerUserLotteryGameMatchListener;
use App\Listeners\SendQueueListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        BeforeLotteryGameUserSaved::class => [
            LotteryGameUserUniqueListener::class,
            GamerCountCheckListener::class
        ],

        BeforeUpdateLotteryGameMatch::class => [
            FindWinnerUserLotteryGameMatchListener::class
        ],

        AfterUpdatedLotteryGameMatch::class => [
            RewardPointsWinnerUserLotteryGameMatchListener::class
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
