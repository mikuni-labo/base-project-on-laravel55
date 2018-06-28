<?php
declare(strict_types=1);

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleExceptionTest extends TestCase
{
    /**
     * @test
     * @expectedException  TypeError
     **/
    public function 型指定エラー()
    {
        $this->typeError(1);
    }

    public function typeError(string $data)
    {
        // 厳格型指定モードにしないと、暗黙の型変換が行われてしまい、例外を投げない
//         dd($data);
    }
}
