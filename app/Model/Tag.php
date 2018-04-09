<?php

namespace App\Model;

use App\Traits\ModelObservable;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\{Model,SoftDeletes};

class Tag extends Model
{
    use ModelObservable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
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
        'name' => 'string',
    ];

    /**
     * Touch all relations.
     *
     * @var array
     */
    protected $touches = [
        'posts',
        'videos',
    ];

    /**
     * @var integer
     */
//     protected $perPage = 20;

    /**
     * Define relationship with other model.
     *
     * @return MorphToMany
     */
    public function posts(): MorphToMany
    {
        return $this->morphedByMany(Post::class, 'taggable')->withTimestamps();
    }

    /**
     * Define relationship with other model.
     *
     * @return MorphToMany
     */
    public function videos(): MorphToMany
    {
        return $this->morphedByMany(Video::class, 'taggable')->withTimestamps();
    }

}
