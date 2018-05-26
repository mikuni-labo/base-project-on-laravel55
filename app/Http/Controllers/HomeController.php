<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return mixed
     */
    public function __construct()
    {
        parent::__construct();

        factory(\App\Model\Test::class)->create([
            'bigInteger' => 1234567890123456789,
            'binary' => 'test',
            'boolean' => false,
            'char' => 'test',
            'date' => now(),
            'dateTime' => now(),
            'dateTimeTz' => now(),
            'decimal' => 12345678.01,
//             'double',
//             'enum' => 'hard',
//             'float',
//             'geometry',
//             'geometryCollection',
//             'integer',
//             'ipAddress',
//             'json',
//             'jsonb',
//             'lineString',
//             'longText',
//             'macAddress',
//             'mediumInteger',
//             'mediumText',
//             'morphs',
//             'multiLineString',
//             'multiPoint',
//             'multiPolygon',
//             'nullableMorphs',
//             'point',
//             'polygon',
//             'remember_token',
//             'smallInteger',
//             'deleted_at',
//             'string',
//             'text',
//             'time',
//             'timeTz',
//             'timestamp',
//             'timestampTz',
//             'created_at',
//             'updated_at',
//             'tinyInteger',
//             'unsignedBigInteger',
//             'unsignedDecimal',
//             'unsignedInteger',
//             'unsignedMediumInteger',
//             'unsignedSmallInteger',
//             'unsignedTinyInteger',
//             'uuid',
        ]);

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @method GET
     * @param Request $request
     * @return View
     */
    public function __invoke(Request $request): View
    {
        return view('home');
    }

}
