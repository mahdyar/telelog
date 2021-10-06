<?php

/**
 * @package Telelog
 */

namespace Telelog\Inc;


final class Init
{
    /**
     * Store all the classes inside an array
     * @return array list of classes
     */
    public static function get_services()
    {
        return [
            Base\Translation::class,
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class,

            // Hooks
            Telegram\PostTransition::class,
            Telegram\PostComment::class,
            Telegram\LoginFail::class,
            Telegram\RegisterUser::class,
            Telegram\ThemeSwitch::class,
            Telegram\PluginActivate::class,
            Telegram\PluginDeactivate::class,

            // WooCommerce Hooks
            Telegram\WooCommerce\WooCommerceOrderNew::class,
        ];
    }

    /**
     * Loop through the classes, initialize them,
     * and call the register() function if it exists
     * @return void
     */
    public static function register_services()
    {
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    /**
     * Initialize the class
     * @param class $class class from the services array
     * @return object new instance of the class
     */
    private static function instantiate($class)
    {
        return new $class();
    }
}
