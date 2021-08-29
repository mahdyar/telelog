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
    }
}
