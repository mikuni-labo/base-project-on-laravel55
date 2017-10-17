<?php

namespace App\Model;

use App\Traits\ModelObservable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Pagination\LengthAwarePaginator;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use SoftDeletes, Notifiable, HasApiTokens, ModelObservable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',// TODO 複数代入しないよう検討するべき
        'role',    // TODO 複数代入しないよう検討するべき
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
        'name'   => 'string',
        'email'  => 'string',
        'role'   => 'string',
    ];

    /**
     * @var integer
     */
    protected $perPage = 10;

    /**
     * Define relationship with other model.
     *
     * @return BelongsToMany
     */
    public function followings(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'follows', 'user_id', 'followed_user_id')->withTimestamps();
    }

    /**
     * Define relationship with other model.
     *
     * @return BelongsToMany
     */
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'follows', 'followed_user_id', 'user_id')->withTimestamps();
    }

    /**
     * Check the user role.
     *
     * @return bool
     */
    public function isMaster(): bool
    {
        return $this->role === 'master';
    }

    /**
     * Check the user role.
     *
     * @return bool
     */
    public function isCompanyAdmin(): bool
    {
        return $this->role === 'company-admin';
    }

    /**
     * Check the user role.
     *
     * @return bool
     */
    public function isStoreAdmin(): bool
    {
        return $this->role === 'store-admin';
    }

    /**
     * Check the user role.
     *
     * @return bool
     */
    public function isStoreUser(): bool
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
        return !empty(config('notification.slack.webhook_url')) ? config('notification.slack.webhook_url'): false;
    }

    /**
     * Return records with condition of request parameters.
     *
     * @param  Request $request
     * @param  array $cols
     * @return Collection|LengthAwarePaginator
     */
    public function search(Request $request, $cols = ['*'])
    {
        /**
         * @var Builder $query
         */
        $query = self::query();
        $perPage = $request->has('per_page') ? $request->per_page : $this->per_page;

        if ($request->user()->isStoreAdmin()) {
//             $query->where() // TODO 同一店舗IDのみ
        } elseif ($request->user()->isCompanyAdmin()) {
//             $query->where() // TODO 同一企業IDのみ
        }

        if (!empty($request->with_trashed)) {
            $query->withTrashed();
        }

        if (!empty($request->paginate)) {
            $currentPage = $request->has('page') ? $request->page : 1;
            return $query->paginate($perPage, $cols, 'page', $currentPage)->appends($request->all());
        } else {
            $query->select($cols);
            $query->take($perPage);

            if (!empty($request->offset)) {
                $query->skip($request->offset);
            }

            return $query->get();
        }
    }

}
