<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhpinfoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return mixed
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show phpinfo.
     *
     * @method GET
     * @param Request $request
     * @return void
     */
    public function __invoke(Request $request) : void
    {
        phpinfo();
    }

}
