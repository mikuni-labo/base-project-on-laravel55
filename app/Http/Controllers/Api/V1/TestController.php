<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Rules\TrueValue;
use Illuminate\Http\Request;
use App\Rules\FalseValue;

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
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $request->validate(
            [
                'test' => 'required',
                'true' => [
                    new TrueValue,
                ],
                'false' => [
                    new FalseValue,
                ],
            ],
            [
                //
            ],
            [
                'test'  => 'テスト',
                'true'  => '真',
                'false' => '偽',
            ]
        );

        return $request->all();
    }

}
