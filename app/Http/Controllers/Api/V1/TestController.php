<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return mixed
     */
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('scopes:user-delete,user-update');
    }

    /**
     * Test
     *
     * @param Request $request
     * @return
     */
    public function __invoke(Request $request)
    {
        return $request->user();
    }

}
