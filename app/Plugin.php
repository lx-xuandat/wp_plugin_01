<?php

namespace Datlx\App;

class Plugin
{
    private $version, $id, $name;

    /**
     * for load method of service in area public, admin to hook
     * @var array
     */
    private $services;

    /**
     * @var array
     */
    private static $containers;

    public function __construct($version, $name, $id)
    {
        $this->version = $version;
        $this->name = $name;
        $this->id = $id;

        $this->services = require plugin_dir_path(dirname(__FILE__)) . 'config/app.php';

        foreach ($this->services as $k) {
            self::$containers[$k] = new $k;
        }
    }

    public static function resolve($class)
    {
        if (isset(self::$containers[$class]) && self::$containers[$class] instanceof $class) {
            return self::$containers[$class];
        } else {
            self::$containers[$class] = new $class;
            return self::$containers[$class];
        }
    }

    public function run()
    {
        self::resolve(Loader::class)->load();
    }
    public function version()
    {
        return $this->version;
    }

    public function id()
    {
        return $this->id;
    }

    public function name()
    {
        return $this->name;
    }
}
