<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeapotController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return mixed
     */
    public function __construct()
    {
        //
    }

    /**
     * I'm a teapot.
     *
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return response("I'm a teapot.", 418);
    }

}
