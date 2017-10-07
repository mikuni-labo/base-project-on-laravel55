<?php

namespace App\Model;

use App\Traits\ModelObservable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use SoftDeletes, Notifiable, HasApiTokens, ModelObservable;

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
     * The attributes for cast to Carbon.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes for casts.
     *
     * @var array
     */
    protected $casts = [
        'id'     => 'int',
        'name'   => 'string',
        'email'  => 'string',
        'role'   => 'string',
    ];

    /**
     * @var integer
     */
    protected $perPage = 10;

    /**
     * Check the user role.
     *
     * @return bool
     */
    public function isMaster()
    {
        return $this->role === 'master';
    }

    /**
     * Check the user role.
     *
     * @return bool
     */
    public function isCompanyAdmin()
    {
        return $this->role === 'company-admin';
    }

    /**
     * Check the user role.
     *
     * @return bool
     */
    public function isStoreAdmin()
    {
        return $this->role === 'store-admin';
    }

    /**
     * Check the user role.
     *
     * @return bool
     */
    public function isStoreUser()
    {
        return $this->role === 'store-user';
    }

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
        return !empty(config('notification.slack.webhook_url')) ? config('notification.slack.webhook_url') : false;
    }

}
