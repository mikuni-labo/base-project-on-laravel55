<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;

class GetController extends Controller
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
     * Get self account data.
     *
     * @return string
     */
    public function __invoke()
    {
        return auth()->user();
    }

}
