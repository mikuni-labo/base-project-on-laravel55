<?php

namespace App\Http\Controllers\Github;

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
        parent::__construct();

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @method GET
     * @param Request $request
     * @return View
     */
    public function __invoke(Request $request) : View
    {
        dd( \Socialite::with('github')->user() );

//         $userData = \Socialite::with('github')->user();

//         $user = User::firstOrCreate([
//             'username' => $userData->nickname,
//             'email'    => $userData->email,
//             'avatar'   => $userData->avatar
//         ]);
//         Auth::login($user);
    }

}
