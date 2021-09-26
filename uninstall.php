<?php

/**
 * Trigger this file on plugin uninstall
 * 
 * @package Telelog
 */

// If this file is called directly, abort!
defined('WP_UNINSTALL_PLUGIN') or die('-1');

delete_option('telelog_api_key');
delete_option('telelog_chat_id');
delete_option('telelog_on_post_update');
delete_option('telelog_on_post_publish');
delete_option('telelog_on_post_comment');
delete_option('telelog_on_login_fail');
delete_option('telelog_on_register_user');
delete_option('telelog_on_theme_switch');
