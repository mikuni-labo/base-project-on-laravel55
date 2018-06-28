<?php

namespace App\Http\Controllers\Test;

use App\Exceptions\ExsampleException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExceptionController extends Controller
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
     * Try test.
     *
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        try {
            throw new \InvalidArgumentException('Any arguments error!');
        } catch (\InvalidArgumentException $e) {
            try {
                throw new ExsampleException('Exsample exception test!', 800, $e);
            } catch (ExsampleException $e2) {
//                 dd( $e2->getPrevious() );
                dd( $e2->__toString() );
            }
        } finally {
            dd('The end.');
        }
    }
}
