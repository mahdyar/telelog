<?php

/**
 * @package Telelog
 */

namespace Telelog\Inc\Base;

use Telelog\Inc\Pages\Admin;

class Activate
{
    public static function activate()
    {
        flush_rewrite_rules();

        foreach (Admin::custom_fields as $custom_field) {
            if (get_option("telelog_{$custom_field[0]}") === false)
                update_option("telelog_{$custom_field[0]}", $custom_field[1]);
        }
    }
}
