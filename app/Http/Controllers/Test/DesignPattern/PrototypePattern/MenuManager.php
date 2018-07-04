<?php
declare(strict_types=1);

namespace App\Http\Controllers\Test\DesignPattern\PrototypePattern;

use App\Http\Controllers\Test\DesignPattern\PrototypePattern\MenuPrototype;

class MenuManager
{
    /** @var array */
    private $menus = [];

    public function __construct()
    {
        //
    }

    public function register(MenuPrototype $menuPrototype)
    {
        $this->menus[$menuPrototype->getMenuCode()] = $menuPrototype;
    }

    public function create($menu_code)
    {
        if (!array_key_exists($menu_code, $this->menus)) {
            throw new \Exception(sprintf('要求されたメニュー番号 %s は存在しません', $menu_code));
        }

        return $this->menus[$menu_code]->newInstance();
    }
}
