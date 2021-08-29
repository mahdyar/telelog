<?php

/**
 * @package Telelog
 */

namespace Telelog\Inc\Base;

class Deactivate
{
    public static function deactivate()
    {
        flush_rewrite_rules();

        delete_option('telelog_api_key');
        delete_option('telelog_chat_id');
        delete_option('telelog_on_post_update');
        delete_option('telelog_on_post_publish');
        delete_option('telelog_on_post_comment');
    }
}
