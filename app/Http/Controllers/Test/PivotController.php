<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PivotController extends Controller
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
     * Render mailable test.
     *
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        /** @var User $user */
        $user = auth()->user();

        /**
         * Attach
         */
        if (! $user->followings()->wherePivot('followed_user_id', 4)->first()) {
            $user->followings()->attach(4);
        }

        /**
         * Detach
         */
        foreach ($user->followings()->get() as $User) {
//             dd('in');
            $user->followings()->detach($User->id);
        }

//         $user->followings()->detach([2,3,4]);

//         dd( $user->followings()->attach(3) );

        dd( $user->followings()->get() );
//         dd( $user->followers()->get() );
    }
}
