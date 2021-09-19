<?php

/**
 * @package Telelog
 */

namespace Telelog\Inc\Telegram;

use Telelog\Inc\Telegram\Telegram;

class LoginFail extends Telegram
{
    private $onLoginFail;
    public function __construct()
    {
        parent::__construct();

        $this->onLoginFail = get_option('telelog_on_login_fail');
    }
    public function register()
    {
        if ($this->onLoginFail === '1')
            add_action('wp_login_failed', array($this, 'login_fail'), 10, 1);
    }
    function login_fail($username)
    {
        $ip = $this->get_client_ip();

        $this->alert("Login failed for user: <code>$username</code>", null, __FUNCTION__, null, $ip, null);
    }
}
