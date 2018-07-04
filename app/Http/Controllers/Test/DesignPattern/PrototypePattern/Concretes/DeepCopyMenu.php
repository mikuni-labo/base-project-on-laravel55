<?php
declare(strict_types=1);

namespace App\Http\Controllers\Test\DesignPattern\PrototypePattern\Concretes;

use App\Http\Controllers\Test\DesignPattern\PrototypePattern\MenuPrototype;

class DeepCopyMenu extends MenuPrototype
{
    protected function __clone()
    {
        $this->setComments(clone $this->getComments());
    }
}
