<?php

/**
 * @package Telelog
 */

namespace Telelog\Inc\Telegram;

use Telelog\Inc\Telegram\Telegram;

class PluginActivate extends Telegram
{
    private $onPluginActivate;
    public function __construct()
    {
        parent::__construct();

        $this->onPluginActivate = get_option('telelog_on_plugin_activate');
    }
    public function register()
    {
        if ($this->onPluginActivate === '1')
            add_action('activated_plugin', array($this, 'plugin_activate'), 10, 1);
    }
    public function plugin_activate($plugin)
    {
        $ip = $this->get_client_ip();
        $plugin_data = get_plugin_data(WP_PLUGIN_DIR . '/' . $plugin);
        $plugin_name = $plugin_data['Name'];

        $user = wp_get_current_user();
        $author = $user->user_login;
        $email = $user->user_email;

        $title = __('Plugin activated', 'telelog') . ": <code>$plugin_name</code>";
        $this->alert($title, null, __FUNCTION__, $author, $ip, $email);
    }
}
