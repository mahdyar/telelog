<?php

/**
 * @package Telelog
 */

namespace Telelog\Inc\Telegram;

use Exception;

class Telegram
{
    private $api_key;

    private $api_url;

    private $chat_id;

    public function __construct()
    {
        $this->api_key = get_option('telelog_api_key');
        $this->api_url = 'https://api.telegram.org/bot' . $this->api_key . '/';
        $this->chat_id = get_option('telelog_chat_id');
    }

    public function get_contents($url)
    {
        return wp_remote_retrieve_body(wp_remote_get($url));
    }

    public function send_message($message, $parse_mode = 'HTML')
    {
        $url = $this->api_url . 'sendMessage?chat_id=' . $this->chat_id . '&text=' . urlencode($message) . '&parse_mode=' . $parse_mode;
        return $this->get_contents($url);
    }
}
