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
    }

}
