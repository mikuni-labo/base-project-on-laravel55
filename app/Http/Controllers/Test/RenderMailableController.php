<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Mail\TestMailable;
use Illuminate\Http\Request;

class RenderMailableController extends Controller
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
     * @return
     */
    public function __invoke(Request $request)
    {
        return new TestMailable;
    }

}
