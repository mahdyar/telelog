<?php

/**
 * @package Telelog
 */

namespace Telelog\Inc\Base;

use \Telelog\Inc\Base\BaseController;

class Enqueue extends BaseController
{
    /**
     * Enqueue the scripts and stylesheets
     * @return void
     */
    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }
    function enqueue()
    {
        // Todo: later
        // use PLUGIN_URL
        // wp_enqueue_style('telelog_styles', $this->plugin_url . 'assets/styles.css', __FILE__);
        wp_enqueue_script('telelog_styles', $this->plugin_url . 'assets/scripts.js', __FILE__);
    }
}
