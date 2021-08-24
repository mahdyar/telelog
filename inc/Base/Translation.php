<?php

/**
 * @package Telelog
 */

namespace Telelog\Inc\Base;

use Telelog\Inc\Base\BaseController;

class Translation extends BaseController
{
    public function register()
    {
        load_plugin_textdomain('telelog', false, str_replace('/telelog.php', '/languages/', $this->plugin));
    }
}
