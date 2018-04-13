<?php

namespace App\Model;

use App\Traits\ModelObservable;
use Illuminate\Database\Eloquent\Relations\{BelongsTo,MorphTo};
use Illuminate\Database\Eloquent\{Model,SoftDeletes};

class Comment extends Model
{
    use ModelObservable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
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
        'content' => 'string',
    ];

    /**
     * Touch all relations.
     *
     * @var array
     */
    protected $touches = [
        'commentable',
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
        return $this->belongsTo(User::class)->withDefault();
    }

    /**
     * Define relationship with other model.
     *
     * @return MorphTo
     */
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

}
