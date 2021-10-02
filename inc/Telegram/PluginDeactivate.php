<?php

/**
 * @package Telelog
 */

namespace Telelog\Inc\Telegram;

use Telelog\Inc\Telegram\Telegram;

class PluginDeactivate extends Telegram
{
    private $onPluginDeactivate;
    public function __construct()
    {
        parent::__construct();

        $this->onPluginDeactivate = get_option('telelog_on_plugin_deactivate');
    }
    public function register()
    {
        if ($this->onPluginDeactivate === '1')
            add_action('deactivated_plugin', array($this, 'plugin_deactivate'), 10, 1);
    }
    public function plugin_deactivate($plugin)
    {
        $ip = $this->get_client_ip();
        $plugin_data = get_plugin_data(WP_PLUGIN_DIR . '/' . $plugin);
        $plugin_name = $plugin_data['Name'];

        $title = __('Plugin deactivated', 'telelog') . ": <code>$plugin_name</code>";
        $this->alert($title, null, __FUNCTION__, null, $ip, null);
    }
}
