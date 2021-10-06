<?php

/**
 * @package Telelog
 */

namespace Telelog\Inc\Pages;

use Telelog\Inc\Pages\Callbacks\AdminCallbacks;

class Admin
{
    const custom_fields = [
        ['api_key', ''], ['chat_id', ''], ['on_post_publish', '1'],
        ['on_post_update', '1'], ['on_post_comment', '1'], ['on_login_fail', '1'],
        ['on_register_user', '1'], ['on_theme_switch', '1'], ['on_plugin_activate', '1'],
        ['on_plugin_deactivate', '1'], ['on_woocommerce_order_new', '0'],
    ];

    public $callbacks;

    private $settings = array();

    private $sections = array();

    private $fields = array();

    private $page = 'telelog';

    /**
     * Add TeleLog to the admin menu
     * @return void
     */
    public function register()
    {
        $this->callbacks = new AdminCallbacks();

        $this->set_settings();
        $this->set_sections();
        $this->set_fields();


        add_action('admin_menu', array($this, 'add_admin_pages'));
        add_action('admin_init', array($this, 'register_custom_fields'));
    }

    /**
     * Add the admin pages
     * @return void
     */
    public function add_admin_pages()
    {
        add_menu_page(__('TeleLog', 'telelog'), __('TeleLog', 'telelog'), 'manage_options', 'telelog', array($this->callbacks, 'admin_index'), 'dashicons-megaphone', 110);
    }

    public function register_custom_fields()
    {
        // register settings
        foreach ($this->settings as $setting) {
            register_setting($setting['option_group'], $setting['option_name'], (isset($setting['callback']) ? $setting['callback'] : ''));
        }

        // add settings sections
        foreach ($this->sections as $section) {
            add_settings_section($section['id'], $section['title'], (isset($section['callback']) ? $section['callback'] : ''), $section['page']);
        }

        // add settings fields
        foreach ($this->fields as $field) {
            add_settings_field($field['id'], $field['title'], (isset($field['callback']) ? $field['callback'] : ''), $field['page'], $field['section'], (isset($field['args']) ? $field['args'] : ''));
        }
    }

    private function set_settings()
    {
        $option_group = 'telelog_options';
        $callback = array($this->callbacks, 'telelog_custom_fields_sanatize');

        $args = array();

        foreach (Admin::custom_fields as $custom_field) {
            array_push($args, array(
                'option_group' => $option_group,
                'option_name' => "telelog_{$custom_field[0]}",
                'callback' => $callback,
            ));
        }

        $this->settings = $args;
    }
    private function set_sections()
    {
        $args = array(
            array(
                'id' => 'api_settings',
                'title' => __('Settings', 'telelog'),
                'callback' => array($this->callbacks, 'api_settings_text'),
                'page' => $this->page,
            ),
            array(
                'id' => 'hooks_settings',
                'title' => __('Hooks', 'telelog'),
                'callback' => array($this->callbacks, 'hooks_settings_text'),
                'page' => $this->page,
            ),
        );

        $this->sections = $args;
    }
    private function set_fields()
    {
        $args = array(
            array(
                'id' => 'telelog_api_key',
                'title' => __('API Key', 'telelog'),
                'callback' => array($this->callbacks, 'telelog_api_key'),
                'page' => $this->page,
                'section' => 'api_settings'
            ),
            array(
                'id' => 'telelog_chat_id',
                'title' => __('Chat ID', 'telelog'),
                'callback' => array($this->callbacks, 'telelog_chat_id'),
                'page' => $this->page,
                'section' => 'api_settings'
            ),
            array(
                'id' => 'telelog_on_post_publish',
                'title' => __('Post Publish', 'telelog'),
                'callback' => array($this->callbacks, 'telelog_on_post_publish'),
                'page' => $this->page,
                'section' => 'hooks_settings'
            ),
            array(
                'id' => 'telelog_on_post_update',
                'title' => __('Post Update', 'telelog'),
                'callback' => array($this->callbacks, 'telelog_on_post_update'),
                'page' => $this->page,
                'section' => 'hooks_settings'
            ),
            array(
                'id' => 'telelog_on_post_comment',
                'title' => __('New comment', 'telelog'),
                'callback' => array($this->callbacks, 'telelog_on_post_comment'),
                'page' => $this->page,
                'section' => 'hooks_settings'
            ),
            array(
                'id' => 'telelog_on_login_fail',
                'title' => __('Login fail', 'telelog'),
                'callback' => array($this->callbacks, 'telelog_on_login_fail'),
                'page' => $this->page,
                'section' => 'hooks_settings'
            ),
            array(
                'id' => 'telelog_on_register_user',
                'title' => __('User registeration', 'telelog'),
                'callback' => array($this->callbacks, 'telelog_on_register_user'),
                'page' => $this->page,
                'section' => 'hooks_settings'
            ),
            array(
                'id' => 'telelog_on_theme_switch',
                'title' => __('Theme switch', 'telelog'),
                'callback' => array($this->callbacks, 'telelog_on_theme_switch'),
                'page' => $this->page,
                'section' => 'hooks_settings'
            ),
            array(
                'id' => 'telelog_on_plugin_activate',
                'title' => __('Plugin activation', 'telelog'),
                'callback' => array($this->callbacks, 'telelog_on_plugin_activate'),
                'page' => $this->page,
                'section' => 'hooks_settings'
            ),
            array(
                'id' => 'telelog_on_plugin_deactivate',
                'title' => __('Plugin deactivation', 'telelog'),
                'callback' => array($this->callbacks, 'telelog_on_plugin_deactivate'),
                'page' => $this->page,
                'section' => 'hooks_settings'
            ),
        );

        $woocommerceArgs = array(
            array(
                'id' => 'telelog_on_woocommerce_order_new',
                'title' => __('WooCommerce New order', 'telelog'),
                'callback' => array($this->callbacks, 'telelog_on_woocommerce_order_new'),
                'page' => $this->page,
                'section' => 'hooks_settings'
            ),
        );

        if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
            foreach ($woocommerceArgs as $woocommerceArg) {
                array_push($args, $woocommerceArg);
            }
        }

        $this->fields = $args;
    }
}
