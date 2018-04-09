<?php

namespace App\Model;

use App\Traits\ModelObservable;
use Illuminate\Database\Eloquent\Relations\{BelongsTo,MorphMany};
use Illuminate\Database\Eloquent\{Model,SoftDeletes};

class Video extends Model
{
    use ModelObservable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'url',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * The attributes for cast to Carbon.
     *
     * @var array
     */
    protected $dates = [
        //
    ];

    /**
     * The attributes for casts.
     *
     * @var array
     */
    protected $casts = [
        'title'  => 'string',
        'url'    => 'string',
    ];

    /**
     * @var integer
     */
//     protected $perPage = 20;

    /**
     * Define relationship with other model.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define relationship with other model.
     *
     * @return MorphMany
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

}
