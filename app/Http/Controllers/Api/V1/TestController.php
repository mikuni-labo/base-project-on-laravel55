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
//         $this->middleware('auth:api');
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return
     */
    public function index(Request $request)
    {
        return response()->json([
            'test' => 1,
        ]);
    }

}
