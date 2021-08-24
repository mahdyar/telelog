<?php

/**
 * @package Telelog
 */

namespace Telelog\Inc\Pages\Callbacks;

use Telelog\Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    /**
     * Require the admin index page
     * @return void
     */
    public function admin_index()
    {
        require_once $this->plugin_path . 'templates/index.php';
    }

    public function sanitize_api_key($api_key)
    {
        return $api_key;
    }

    public function sanitize_chat_id($chat_id)
    {
        return $chat_id;
    }
    public function sanitize_on_post_update($input)
    {
        return $input;
    }

    public function sanitize_on_post_publish($input)
    {
        return $input;
    }
    public function api_settings_text()
    {
        echo '<p>' . __('Set your Telegram bot token and your chat id which can be either your own user id or a channel username with an at sign.', 'telelog') . '  (<a href="https://github.com/mahdyar/telelog/tree/main#set-up" target="_blank">' . __('Learn more', 'telelog') . '</a>)</p>';
    }

    public function telelog_api_key()
    {
        $value = esc_attr(get_option('telelog_api_key'));
        echo '<input class="reqular-text" name="telelog_api_key" type="text" value="' . $value . '" />';
    }

    public function telelog_chat_id()
    {
        $value = esc_attr(get_option('telelog_chat_id'));
        echo '<input class="reqular-text" name="telelog_chat_id" type="text" value="' . $value . '" />';
    }

    public function hooks_settings_text()
    {
        echo '<p>' . __('Choose on which hooks should TeleLog send you a message.', 'telelog') . '</p>';
    }
    public function telelog_on_post_update()
    {
        $checked = esc_attr(get_option('telelog_on_post_update'));

        $html = '<input type="checkbox" id="on_post_update" name="telelog_on_post_update" value="1"' . checked(1, $checked, false) . '/>';
        $html .= '<label for="on_post_update">' . __('Let you know when a post is updated.', 'telelog') . '</label>';

        echo $html;
    }
    public function telelog_on_post_publish()
    {
        $checked = esc_attr(get_option('telelog_on_post_publish'));

        $html = '<input type="checkbox" id="on_post_publish" name="telelog_on_post_publish" value="1"' . checked(1, $checked, false) . '/>';
        $html .= '<label for="on_post_publish">' . __('Let you know when a post is published.', 'telelog') . '</label>';

        echo $html;
    }
}
