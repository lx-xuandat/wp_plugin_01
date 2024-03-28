<?php

namespace Datlx\App;

/**
 * @add_action(plugins_loaded, load_plugin_textdomain, 10, 1)
 */
class I18n
{
    /**
     * Load the plugin text domain for translation.
     *
     * @since    1.0.0
     */
    public function load_plugin_textdomain()
    {
        load_plugin_textdomain(
            I18n::class,
            false,
            plugin_dir_path(__FILE__) . 'resources/languages'
        );
    }
}
