<?php

/**
 * @package Telelog
 */

namespace Telelog\Inc\Telegram;

use Telelog\Inc\Telegram\Telegram;

class RegisterUser extends Telegram
{
    private $onRegisterUser;
    public function __construct()
    {
        parent::__construct();

        $this->onRegisterUser = get_option('telelog_on_register_user');
    }
    public function register()
    {
        if ($this->onRegisterUser === '1')
            add_action('user_register', array($this, 'register_user'), 10, 3);
    }
    public function register_user($user_id, $user_data)
    {
        $ip = $this->get_client_ip();
        $title = __('New user registered', 'telelog') . ": <b>{$user_data['user_login']}</b> ({$user_data['user_email']})";
        $this->alert($title, null, __FUNCTION__, null, $ip, null);
    }
}
