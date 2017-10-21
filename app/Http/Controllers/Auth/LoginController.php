<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /** @var int */
    private $maxAttempts = 5;

    /** @var int */
    private $decayMinutes = 20;

    /**
     * Create a new controller instance.
     *
     * @return mixed
     */
    public function __construct()
    {
        parent::__construct();

        $this->middleware('guest')->except('logout');
    }

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    private function redirectTo()
    {
        return route('home');
    }

    /**
     * Redirect the user after determining they are locked out.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    private function sendLockoutResponse(Request $request)
    {
        $seconds = $this->limiter()->availableIn(
            $this->throttleKey($request)
        );

        throw ValidationException::withMessages([
            $this->username() => [
                Lang::get('auth.throttle', [
                    'seconds' => $seconds,
                    'minutes' => (int)($seconds / 60),
                ]),
            ],
        ])->status(423);
    }
}
