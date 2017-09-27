<?php

namespace App\Traits;

use App\Observers\ModelObserver;

trait ModelObservable
{
    /**
     * Boot model observer.
     *
     * @return void
     */
    public static function bootModelObservable()
    {
        self::observe(ModelObserver::class);
    }
}
