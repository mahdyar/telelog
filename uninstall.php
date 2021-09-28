<?php

/**
 * Trigger this file on plugin uninstall
 * 
 * @package Telelog
 */

// If this file is called directly, abort!
defined('WP_UNINSTALL_PLUGIN') or die('-1');

// Require once the Composer autoloader
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

use Telelog\Inc\Pages\Admin;


foreach (Admin::custom_fields as $custom_field) {
    delete_option("telelog_{$custom_field[0]}");
}
