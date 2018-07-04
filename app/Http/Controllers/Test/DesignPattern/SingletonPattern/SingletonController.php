<?php
declare(strict_types=1);

namespace App\Http\Controllers\Test\DesignPattern\SingletonPattern;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Test\DesignPattern\SingletonPattern\SampleSingleton;
use Illuminate\Http\Request;

class SingletonController extends Controller
{
    /**
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param  Request $request
     */
    public function __invoke(Request $request)
    {
        $singleton = SampleSingleton::getInstance();
        dump($singleton->getId());

        $singleton2 = SampleSingleton::getInstance();
        dump($singleton2->getId());

        /**
         * test
         */
//         $test = new $singleton;
//         $test = clone $singleton;
    }
}
