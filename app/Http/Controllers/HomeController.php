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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request) : View
    {
        return view('home');
    }

    /**
     * Show phpinfo.
     *
     * @method GET
     * @param Request $request
     * @return void
     */
    public function phpinfo(Request $request) : void
    {
        phpinfo();
    }

}
