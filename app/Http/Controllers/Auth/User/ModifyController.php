<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;

class ModifyController extends Controller
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
     * Get self account data.
     *
     * @return string
     */
    public function __invoke()
    {
        return auth()->user();
    }

}
