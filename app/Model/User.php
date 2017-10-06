<?php

namespace App\Model;

use App\Traits\ModelObservable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, ModelObservable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Returns the webhook URL for notification to Slack.
     *
     * @return string
     */
    public function routeNotificationForSlack()
    {
        /**
         * XXX ここはユーザ毎のフックURLにするべきかもしれないがテストのため一旦configから取得する
         */
        return !empty(config('notification.slack.webhook_url')) ? config('notification.slack.webhook_url'): false;
    }

}
