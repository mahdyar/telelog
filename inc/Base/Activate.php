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
    }
}
