<?php

/**
 * @package Telelog
 */

namespace Telelog\Inc\Base;

class Activate
{
    public static function activate()
    {
        flush_rewrite_rules();

        if (get_option('telelog_on_post_publish') === false)
            update_option('telelog_on_post_publish', '1');
        if (get_option('telelog_on_post_update') === false)
            update_option('telelog_on_post_update', '1');
        if (get_option('telelog_on_post_comment') === false)
            update_option('telelog_on_post_comment', '1');
        if (get_option('telelog_on_login_fail') === false)
            update_option('telelog_on_login_fail', '1');
        if (get_option('telelog_on_register_user') === false)
            update_option('telelog_on_register_user', '1');
        if (get_option('telelog_on_theme_switch') === false)
            update_option('telelog_on_theme_switch', '1');
    }
}
