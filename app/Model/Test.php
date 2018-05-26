<?php

namespace App\Model;

use App\Traits\ModelObservable;
use Illuminate\Database\Eloquent\{Model,SoftDeletes};

class Test extends Model
{
    use ModelObservable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        /*
        'bigInteger',
        'binary',
        'boolean',
        'char',
        'date',
        'dateTime',
        'dateTimeTz',
        'decimal',
        'double',
        'enum',
        'float',
        'geometry',
        'geometryCollection',
        'integer',
        'ipAddress',
        'json',
        'jsonb',
        'lineString',
        'longText',
        'macAddress',
        'mediumInteger',
        'mediumText',
        'morphs',
        'multiLineString',
        'multiPoint',
        'multiPolygon',
        'nullableMorphs',
        'point',
        'polygon',
        'remember_token',
        'smallInteger',
        'string',
        'text',
        'time',
        'timeTz',
        'timestamp',
        'timestampTz',
        'tinyInteger',
        'unsignedBigInteger',
        'unsignedDecimal',
        'unsignedInteger',
        'unsignedMediumInteger',
        'unsignedSmallInteger',
        'unsignedTinyInteger',
        'uuid',
        */
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
        //
    ];

    /**
     * @var integer
     */
//     protected $perPage = 20;

}
