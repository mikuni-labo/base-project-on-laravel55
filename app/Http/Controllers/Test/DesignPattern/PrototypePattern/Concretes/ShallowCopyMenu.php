<?php
declare(strict_types=1);

namespace App\Http\Controllers\Test\DesignPattern\PrototypePattern\Concretes;

use App\Http\Controllers\Test\DesignPattern\PrototypePattern\MenuPrototype;

class ShallowCopyMenu extends MenuPrototype
{
    protected function __clone()
    {
        //
    }
}
