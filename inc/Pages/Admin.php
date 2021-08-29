<?php

/**
 * @package Telelog
 */

namespace Telelog\Inc\Pages;

use Telelog\Inc\Pages\Callbacks\AdminCallbacks;

class Admin
{
    public $callbacks;

    public $settings = array();

    public $sections = array();

    public $fields = array();

    /**
     * Add TeleLog to the admin menu
     * @return void
     */
    public function register()
    {
        $this->callbacks = new AdminCallbacks();
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
        register_setting('telelog_options', 'telelog_api_key', array($this->callbacks, 'sanitize_api_key'));
        register_setting('telelog_options', 'telelog_chat_id', array($this->callbacks, 'sanitize_chat_id'));
        register_setting('telelog_options', 'telelog_on_post_publish', array($this->callbacks, 'sanitize_on_post_publish'));
        register_setting('telelog_options', 'telelog_on_post_update', array($this->callbacks, 'sanitize_on_post_update'));
        register_setting('telelog_options', 'telelog_on_post_comment', array($this->callbacks, 'sanitize_on_post_comment'));

        add_settings_section('api_settings', __('Settings', 'telelog'), array($this->callbacks, 'api_settings_text'), 'telelog');
        add_settings_section('hooks_settings', __('Hooks', 'telelog'), array($this->callbacks, 'hooks_settings_text'), 'telelog');

        add_settings_field('telelog_api_key', __('API Key', 'telelog'), array($this->callbacks, 'telelog_api_key'), 'telelog', 'api_settings');
        add_settings_field('telelog_chat_id', __('Chat ID', 'telelog'), array($this->callbacks, 'telelog_chat_id'), 'telelog', 'api_settings');

        add_settings_field('telelog_on_post_publish', __('Post Publish', 'telelog'), array($this->callbacks, 'telelog_on_post_publish'), 'telelog', 'hooks_settings');
        add_settings_field('telelog_on_post_update', __('Post Update', 'telelog'), array($this->callbacks, 'telelog_on_post_update'), 'telelog', 'hooks_settings');
        add_settings_field('telelog_on_post_comment', __('New comment', 'telelog'), array($this->callbacks, 'telelog_on_post_comment'), 'telelog', 'hooks_settings');
    }
}
