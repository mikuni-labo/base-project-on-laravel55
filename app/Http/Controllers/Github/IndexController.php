<?php

namespace App\Http\Controllers\Github;

use App\Http\Controllers\Controller;
use Illuminate\Http\{RedirectResponse,Request};
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return mixed
     */
    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @method GET
     * @param Request $request
     * @return RedirectResponse
     */
    public function __invoke(Request $request) : RedirectResponse
    {
        return \Socialite::with('github')->redirect();
    }

}
