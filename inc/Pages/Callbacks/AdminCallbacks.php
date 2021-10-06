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

    public function telelog_custom_fields_sanatize($input)
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
        $html =  '<input autocomplete="off" class="reqular-text" name="telelog_api_key" type="text" value="' . esc_attr($value) . '" />';
        echo wp_kses(
            $html,
            array(
                'input' => array(
                    'autocomplete' => array(),
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

    private function hooks_sanitizer($html)
    {
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

    public function telelog_on_post_update()
    {
        $checked = get_option('telelog_on_post_update');

        $html = '<input type="checkbox" id="on_post_update" name="telelog_on_post_update" value="1"' . checked(1, esc_attr($checked), false) . '/>';
        $html .= '<label for="on_post_update">' . __('Let you know when a post is updated.', 'telelog') . '</label>';

        $this->hooks_sanitizer($html);
    }

    public function telelog_on_post_publish()
    {
        $checked = get_option('telelog_on_post_publish');

        $html = '<input type="checkbox" id="on_post_publish" name="telelog_on_post_publish" value="1"' . checked(1, esc_attr($checked), false) . '/>';
        $html .= '<label for="on_post_publish">' . __('Let you know when a post is published.', 'telelog') . '</label>';

        $this->hooks_sanitizer($html);
    }

    public function telelog_on_post_comment()
    {
        $checked = get_option('telelog_on_post_comment');

        $html = '<input type="checkbox" id="on_post_comment" name="telelog_on_post_comment" value="1"' . checked(1, esc_attr($checked), false) . '/>';
        $html .= '<label for="on_post_comment">' . __('Let you know when a comment is posted.', 'telelog') . '</label>';

        $this->hooks_sanitizer($html);
    }

    public function telelog_on_login_fail()
    {
        $checked = get_option('telelog_on_login_fail');

        $html = '<input type="checkbox" id="on_login_fail" name="telelog_on_login_fail" value="1"' . checked(1, esc_attr($checked), false) . '/>';
        $html .= '<label for="on_login_fail">' . __('Let you know when an attemp to login is failed.', 'telelog') . '</label>';

        $this->hooks_sanitizer($html);
    }

    public function telelog_on_register_user()
    {
        $checked = get_option('telelog_on_register_user');

        $html = '<input type="checkbox" id="on_register_user" name="telelog_on_register_user" value="1"' . checked(1, esc_attr($checked), false) . '/>';
        $html .= '<label for="on_register_user">' . __('Let you know when a new user registers.', 'telelog') . '</label>';

        $this->hooks_sanitizer($html);
    }

    public function telelog_on_theme_switch()
    {
        $checked = get_option('telelog_on_theme_switch');

        $html = '<input type="checkbox" id="on_theme_switch" name="telelog_on_theme_switch" value="1"' . checked(1, esc_attr($checked), false) . '/>';
        $html .= '<label for="on_theme_switch">' . __('Let you know when the theme is switched.', 'telelog') . '</label>';

        $this->hooks_sanitizer($html);
    }

    public function telelog_on_plugin_activate()
    {
        $checked = get_option('telelog_on_plugin_activate');

        $html = '<input type="checkbox" id="on_plugin_activate" name="telelog_on_plugin_activate" value="1"' . checked(1, esc_attr($checked), false) . '/>';
        $html .= '<label for="on_plugin_activate">' . __('Let you know when a plugin is activated.', 'telelog') . '</label>';

        $this->hooks_sanitizer($html);
    }

    public function telelog_on_plugin_deactivate()
    {
        $checked = get_option('telelog_on_plugin_deactivate');

        $html = '<input type="checkbox" id="on_plugin_deactivate" name="telelog_on_plugin_deactivate" value="1"' . checked(1, esc_attr($checked), false) . '/>';
        $html .= '<label for="on_plugin_deactivate">' . __('Let you know when a plugin is deactivated.', 'telelog') . '</label>';

        $this->hooks_sanitizer($html);
    }

    public function telelog_on_woocommerce_order_new()
    {
        $checked = get_option('telelog_on_woocommerce_order_new');

        $html = '<input type="checkbox" id="on_woocommerce_order_new" name="telelog_on_woocommerce_order_new" value="1"' . checked(1, esc_attr($checked), false) . '/>';
        $html .= '<label for="on_woocommerce_order_new">' . __('Let you know when a new order in Woocommerce is submited.', 'telelog') . '</label>';

        $this->hooks_sanitizer($html);
    }
}
