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

    public function sanitize_on_post_comment($input)
    {
        return $input;
    }
    public function sanitize_on_login_fail($input)
    {
        return $input;
    }
    public function api_settings_text()
    {
        $html = '<p>' . __('Set your Telegram bot token and your chat id which can be either your own user id or a channel username with an at sign.', 'telelog') . '  (<a href="https://github.com/mahdyar/telelog/tree/main#set-up" target="_blank">' . __('Learn more', 'telelog') . '</a>)</p>';
        echo wp_kses(
            $html,
            array(
                'p' => array(),
                'a' => array(
                    'href' => array(),
                    'target' => array()
                ),
            )
        );
    }

    public function telelog_api_key()
    {
        $value = get_option('telelog_api_key');
        $html =  '<input class="reqular-text" name="telelog_api_key" type="text" value="' . esc_attr($value) . '" />';
        echo wp_kses(
            $html,
            array(
                'input' => array(
                    'class' => array(),
                    'name' => array(),
                    'type' => array(),
                    'value' => array()
                )
            )
        );
    }

    public function telelog_chat_id()
    {
        $value = get_option('telelog_chat_id');
        $html = '<input class="reqular-text" name="telelog_chat_id" type="text" value="' . esc_attr($value) . '" />';
        echo wp_kses(
            $html,
            array(
                'input' => array(
                    'class' => array(),
                    'name' => array(),
                    'type' => array(),
                    'value' => array()
                )
            )
        );
    }

    public function hooks_settings_text()
    {
        $html = '<p>' . __('Choose on which hooks should TeleLog send you a message.', 'telelog') . '</p>';
        $html .= '<ul><li><button id="telelog_enable" class="button button-secondary">' . __('Enable all', 'telelog') . '</button></li><li><button id="telelog_disable" class="button button-secondary">' . __('Disable all', 'telelog') . '</button></li></ul>';
        echo wp_kses(
            $html,
            array(
                'p' => array(),
                'ul' => array(),
                'li' => array(),
                'button' => array(
                    'id' => array(),
                    'class' => array()
                ),
            )
        );
    }
    public function telelog_on_post_update()
    {
        $checked = get_option('telelog_on_post_update');

        $html = '<input type="checkbox" id="on_post_update" name="telelog_on_post_update" value="1"' . checked(1, esc_attr($checked), false) . '/>';
        $html .= '<label for="on_post_update">' . __('Let you know when a post is updated.', 'telelog') . '</label>';

        echo wp_kses($html, array(
            'input' => array(
                'type' => array(),
                'id' => array(),
                'name' => array(),
                'value' => array(),
                'checked' => array()
            ),
            'label' => array(
                'for' => array()
            )
        ));
    }
    public function telelog_on_post_publish()
    {
        $checked = get_option('telelog_on_post_publish');

        $html = '<input type="checkbox" id="on_post_publish" name="telelog_on_post_publish" value="1"' . checked(1, esc_attr($checked), false) . '/>';
        $html .= '<label for="on_post_publish">' . __('Let you know when a post is published.', 'telelog') . '</label>';

        echo wp_kses($html, array(
            'input' => array(
                'type' => array(),
                'id' => array(),
                'name' => array(),
                'value' => array(),
                'checked' => array()
            ),
            'label' => array(
                'for' => array()
            )
        ));
    }
    public function telelog_on_post_comment()
    {
        $checked = get_option('telelog_on_post_comment');

        $html = '<input type="checkbox" id="on_post_comment" name="telelog_on_post_comment" value="1"' . checked(1, esc_attr($checked), false) . '/>';
        $html .= '<label for="on_post_comment">' . __('Let you know when a comment is posted.', 'telelog') . '</label>';

        echo wp_kses($html, array(
            'input' => array(
                'type' => array(),
                'id' => array(),
                'name' => array(),
                'value' => array(),
                'checked' => array()
            ),
            'label' => array(
                'for' => array()
            )
        ));
    }
    public function telelog_on_login_fail()
    {
        $checked = get_option('telelog_on_login_fail');

        $html = '<input type="checkbox" id="on_login_fail" name="telelog_on_login_fail" value="1"' . checked(1, esc_attr($checked), false) . '/>';
        $html .= '<label for="on_login_fail">' . __('Let you know when an attemp to login is failed.', 'telelog') . '</label>';

        echo wp_kses($html, array(
            'input' => array(
                'type' => array(),
                'id' => array(),
                'name' => array(),
                'value' => array(),
                'checked' => array()
            ),
            'label' => array(
                'for' => array()
            )
        ));
    }
}
