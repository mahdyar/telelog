<?php

/**
 * @package Telelog
 */

namespace Telelog\Inc\Base;

use \Telelog\Inc\Base\BaseController;

class SettingsLinks extends BaseController
{
    public function register()
    {
        add_filter("plugin_action_links_$this->plugin", array($this, 'add_settings_link'));
    }
    public function add_settings_link($links)
    {
        $settings_link = '<a href="admin.php?page=telelog">Settings</a>';
        array_unshift($links, $settings_link);
        return $links;
    }
}
