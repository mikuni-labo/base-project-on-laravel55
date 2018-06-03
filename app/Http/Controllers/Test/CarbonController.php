<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CarbonController extends Controller
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
     * Any test.
     *
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        /** @var Carbon $carbon */
        $carbon = Carbon::parse('2018-05-26');

//         dd($carbon->startOfDay()->format('Y-m-d H:i:s') === '2018-05-26 00:00:00');

        dd($carbon->endOfDay()->format('Y-m-d H:i:s') === '2018-05-26 23:59:59');
    }
}
