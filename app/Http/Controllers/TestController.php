<?php

namespace App\Http\Controllers;

use App\Mail\TestMailable;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TestController extends Controller
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
        dd('here');
//         return view('test.index');
    }

    /**
     * Render mailable test.
     *
     * @param Request $request
     * @return
     */
    public function renderMailable(Request $request)
    {
        return new TestMailable;
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
