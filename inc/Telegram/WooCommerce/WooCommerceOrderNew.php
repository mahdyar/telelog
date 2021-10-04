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
        $order = wc_get_order( $order_id );
        $ip = $order->customer_ip_address;
        $order_id  = $order->get_id();
        
        $site_url = get_site_url();
        $order_url = $site_url . '/wp-admin/post.php?post=' . $order_id . '&action=edit';

        $author = $order->get_billing_first_name() . ' ' . $order->get_billing_last_name();
        $email = $order->get_billing_email();

        $title = __('New WooCommerce order', 'telelog') . ": <a href='$order_url'>$order_id</a>";
        $this->alert($title, null, __FUNCTION__, $author, $ip, $email);
    }
}
