<?php
use Datlx\App\Admin\Backend;

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://datlx.com
 * @since             1.0.0
 * @package           Datlx
 *
 * @wordpress-plugin
 * Plugin Name:       Datlx
 * Plugin URI:        https://datlx-weather.com
 * Description:       Plugin about Weather.
 * Version:           1.0.0
 * Author:            Dat Luu
 * Author URI:        https://datlx.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       datlx-weather
 * Domain Path:       /languages
 */


// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

(function () {
    require_once plugin_dir_path(__FILE__) . "vendor/autoload.php";

    $plugin = new Datlx\App\Plugin(
        '1.0.0',
        'Datlx',
        'datlx'
    );

    $plugin->run();
})();
