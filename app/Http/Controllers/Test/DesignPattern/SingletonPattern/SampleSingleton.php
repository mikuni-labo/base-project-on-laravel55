<?php
declare(strict_types=1);

namespace App\Http\Controllers\Test\DesignPattern\SingletonPattern;

class SampleSingleton
{
    private static $instance;

    private $id;

    private function __construct()
    {
        $this->id = hash('sha256', (string)time());
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new SampleSingleton();
        }
        return self::$instance;
    }

    public function getId()
    {
        return $this->id;
    }

    public final function __clone()
    {
        throw new \RuntimeException('This Instance is Not Clone');
    }

    public final function __wakeup()
    {
        throw new \RuntimeException('This Instance is Not unserialize');
    }

}
