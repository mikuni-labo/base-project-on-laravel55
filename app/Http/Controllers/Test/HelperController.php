<?php
declare(strict_types=1);

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Render mailable test.
     *
     * @param  Request $request
     * @throws \TypeError
     * @todo   hoge
     */
    public function __invoke(Request $request, Test $Test)
    {
        try {
            $result = transform('abc', $Test->closure1(), $Test->closure2());
        } catch (\TypeError $e) {
            dd($e->getMessage());
        }

        dd($result);

        return view('test.index');
    }
}

/**
 * @author Kuniyasu_Wada
 */
class Test
{
    public function closure1(): callable
    {
        return function (int $value) {
            return $value * 2;
        };
    }

    public function closure2(): callable
    {
        return function () {
            return 'The value is blank.';
        };
    }
}
