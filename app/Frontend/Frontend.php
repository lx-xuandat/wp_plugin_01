<?php

namespace Datlx\App\Frontend;


/**
 * @add_action(widgets_init, register_widget, 10, 1)
 */
class Frontend
{
    public function __construct()
    {
    }
    public function register_widget()
    {
        $widgets = require_once plugin_dir_path(dirname(__FILE__, 2)) . 'config/widgets.php';
        foreach ($widgets as $class) {
            register_widget($class);
        }
    }
}
