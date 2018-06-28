<?php

namespace App\Http\Controllers\Socialite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CallbackController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return mixed
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @method GET
     * @param Request $request
     * @param string $provider
     * @return View
     */
    public function __invoke(Request $request, string $provider): View
    {
        dd( \Socialite::with($provider)->user() );

//         $userData = \Socialite::with('github')->user();

//         $user = User::firstOrCreate([
//             'username' => $userData->nickname,
//             'email'    => $userData->email,
//             'avatar'   => $userData->avatar
//         ]);
//         Auth::login($user);
    }

}
