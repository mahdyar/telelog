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
        add_action('admin_enqueue_scripts', array($this, 'enqueue_styles'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
    }
    function enqueue_scripts()
    {
        wp_enqueue_script('telelog_scripts', $this->plugin_url . 'assets/scripts.js', __FILE__);
    }
    function enqueue_styles()
    {
        wp_enqueue_style('telelog_styles', $this->plugin_url . 'assets/styles.css', __FILE__);
    }
}
