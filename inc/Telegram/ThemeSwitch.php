<?php

/**
 * @package Telelog
 */

namespace Telelog\Inc\Telegram;

use Telelog\Inc\Telegram\Telegram;

class ThemeSwitch extends Telegram
{
    private $onThemeSwitch;
    public function __construct()
    {
        parent::__construct();

        $this->onThemeSwitch = get_option('telelog_on_theme_switch');
    }
    public function register()
    {
        if ($this->onThemeSwitch === '1')
            add_action('switch_theme', array($this, 'theme_switch'), 10, 3);
    }
    public function theme_switch($new_name, $new_theme, $old_theme)
    {
        $ip = $this->get_client_ip();

        $user = wp_get_current_user();
        $author = $user->user_login;
        $email = $user->user_email;

        $title = __('Theme switched', 'telelog') . ": <b>$new_name</b>";
        $this->alert($title, null, __FUNCTION__, $author, $ip, $email);
    }
}
