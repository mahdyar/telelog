<?php

/**
 * @package Telelog
 */

namespace Telelog\Inc\Telegram;

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

    private function get_contents($url)
    {
        return wp_remote_retrieve_body(wp_remote_get($url));
    }

    private function send_message($message, $parse_mode = 'HTML')
    {
        $url = $this->api_url . 'sendMessage?chat_id=' . $this->chat_id . '&text=' . urlencode($message) . '&parse_mode=' . $parse_mode;
        return $this->get_contents($url);
    }
    public function alert($title, $content = null, $function, $author = null, $ip, $email = null)
    {
        $alert['action'] = "❕$title";
        $alert['content'] = $content !== null ? "$content[0]\n\n$content[1]" : '';
        $alert['tag'] = "#️⃣ #$function";
        $alert['by'] = ($author != null && $email != null) ? "👤 By: $author ($ip) - $email" : "👤 By: $ip";

        $message = '';
        foreach ($alert as $section) {
            if ($section !== '')
                $message .= "$section\n\n";
        }

        $this->send_message($message);
    }
    public function get_client_ip()
    {
        $ipaddress = '';
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"]))
            $ipaddress = $_SERVER["HTTP_CF_CONNECTING_IP"];
        else if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN IP';
        return $ipaddress;
    }
}
