<?php

namespace App\Providers;

use App\Listeners\SlackNotification;
use App\Events\TestEvent;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Laravel\Passport\Events\AccessTokenCreated;
use Laravel\Passport\Events\RefreshTokenCreated;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        /**
         * テスト通知
         */
        TestEvent::class => [
            SlackNotification::class,
        ],

        /**
         * アクセストークン発行時のイベントハンドラ
         */
        AccessTokenCreated::class => [
//             'App\Listeners\RevokeOldTokens',
        ],

        /**
         * アクセストークンリフレッシュ時のイベントハンドラ
         */
        RefreshTokenCreated::class => [
//             'App\Listeners\PruneOldTokens',
        ],

//         'App\Events\Event' => [
//             'App\Listeners\EventListener',
//         ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
