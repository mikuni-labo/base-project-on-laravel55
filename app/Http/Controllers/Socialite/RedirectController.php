<?php

namespace App\Http\Controllers\Socialite;

use App\Http\Controllers\Controller;
use Illuminate\Http\{RedirectResponse,Request};
use Illuminate\View\View;

class RedirectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return mixed
     */
    public function __construct()
    {
        parent::__construct();

        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @method GET
     * @param Request $request
     * @param string $provider
     * @return RedirectResponse
     */
    public function __invoke(Request $request, string $provider) : RedirectResponse
    {
        return \Socialite::with($provider)->redirect();
    }

}
