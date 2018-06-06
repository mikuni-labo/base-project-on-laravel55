<?php
declare(strict_types=1);

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Php7Controller extends Controller
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
    public function __invoke(Request $request, Sample $Sample)
    {
        $result = $this->callee(3, function (int $value) {
            return $value * 2;
        });

//         $this->spaceship();
//         [$hoge, $fuga] = $this->tuple();
//         $Sample->test();

        dd($result);
    }

    private function spaceship()
    {
        switch ('a' <=> 'b') {
            case 1:
                $msg = '左辺 > 右辺';
                break;

            case -1:
                $msg = '左辺 < 右辺';
                break;

            case 0:
                $msg = '左辺 == 右辺';
                break;

            default:
                $msg = 'default';
        }

        dd($msg);
    }

    private function tuple(): array
    {
        return [
            $hoge = 'hoge',
            $fuga = 'fuga',
        ];
    }

    private function callee(int $value, callable $callee)
    {
        dd(func_num_args());
        return call_user_func($callee, $value);
    }
}

class Sample implements Contracts
{
    /**
     * {@inheritDoc}
     * @see \App\Http\Controllers\Test\Contracts::test()
     */
    public function test(int $value): void
    {
        //
    }
}

interface Contracts
{
    public function test(int $value): void;
}
