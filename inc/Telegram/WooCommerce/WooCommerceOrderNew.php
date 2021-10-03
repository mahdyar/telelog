<?php

/**
 * @package Telelog
 */

namespace Telelog\Inc\Telegram\WooCommerce;

use Telelog\Inc\Telegram\Telegram;

class WooCommerceOrderNew extends Telegram
{
    private $onWooCommerceOrderNew;
    public function __construct()
    {
        parent::__construct();

        $this->onWooCommerceOrderNew = get_option('telelog_on_woocommerce_order_new');
    }
    public function register()
    {
        if ($this->onWooCommerceOrderNew === '1' && in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))))
            add_action('woocommerce_new_order', array($this, 'woocommerce_order_new'), 10, 1);
    }
    public function woocommerce_order_new($order_id)
    {
        $ip = $this->get_client_ip();
        $order = wc_get_order( $order_id );
        $order_id  = $order->get_id();

        $title = __('New WooCommerce order', 'telelog') . ": <code>$order_id</code>";
        $this->alert($title, null, __FUNCTION__, null, $ip, null);
    }
}
