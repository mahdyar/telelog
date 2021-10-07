<?php

/**
 * @package Telelog
 */

/**
 * Plugin Name: TeleLog
 * Plugin URI: https://github.com/mahdyar/telelog
 * Description: Keep track of everything happening on your WordPress in Telegram.

 * Version: 1.0.3
 * Author: Mahdyar Hasanpour
 * Author URI: https://mahdyar.me
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: telelog
 */

// If this file is called directly, abort!
defined('ABSPATH') or die('-1');

// Require once the Composer autoloader
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

use Telelog\Inc\Base\Activate;
use Telelog\Inc\Base\Deactivate;

/**
 * The code that runs during plugin activation
 */
function activate_telelog()
{
    Activate::activate();
}

/**
 * The code that runs during plugin deactivation
 */
function deactivate_telelog()
{
    Deactivate::deactivate();
}

register_activation_hook(__FILE__, 'activate_telelog');
register_deactivation_hook(__FILE__, 'deactivate_telelog');

/**
 * Initialize all the core classes of the plugin
 */
if (class_exists('Telelog\\Inc\\Init')) {
    Telelog\Inc\Init::register_services();
}
