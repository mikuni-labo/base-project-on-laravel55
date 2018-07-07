<?php
declare(strict_types=1);

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MobileDetectController extends Controller
{
    /**
     * @return void
     */
    public function __construct()
    {
//         $this->middleware('auth');
    }

    /**
     * @param  Request $request
     */
    public function __invoke(Request $request)
    {
        return view('test.mobile_detect');
    }

}
