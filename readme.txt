=== TeleLog ===
Contributors: mahdyarme
Plugin URI: https://github.com/mahdyar/telelog
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Tags: activity log, wordpress activity logs, security audit log, audit log, user tracking, security event log, audit trail, wordpress security monitor, user activity, admin, telegram, telegram alerts, telegram notification, wordpress telegram alerts
Requires PHP: 7.0
Requires at least: 4.4
Tested up to: 5.8
Stable tag: 1.0.3

Keep track of everything happening on your WordPress in Telegram

== Description ==

This plugin is still under development and more hooks will be added soon, but for now, the full list of its hooks are:

* Post publish
* Post update
* New comment
* Login fail
* New plugin activation
* New plugin deactivation
* Theme switch
* New user registation
* New WooCommerce order

### Set up
1. Create a new Telegram bot. ([Learn more](https://core.telegram.org/bots#3-how-do-i-create-a-bot))
1. Go to TeleLog admin page from your wordpress dashboard.
1. Copy your bot token from botfather and paste it in the "API Key" field.
1. If you want TeleLog to send the logs to your personal account, you can use your userid and put it in the "Chat ID" field ([Find your userid](https://t.me/userinfobot)), the other option is to create a channel and make your bot an admin with "Post Messages" access and enter the channel username as "Chat ID", with an atsign(@) before it, e.g: `@username`.

For every event that TeleLog sends it also reports the:

* User who did the change
* The object on which the change happenned.


#### TeleLog in your language!
We need help translating TeleLog, feel free to contribute to our
 [GitHub Repository](https://github.com/mahdyar/telelog). TeleLog currently supports:

 * English
 * Persian

== Installation ==

=== Install TeleLog from within WordPress ===

1. Visit 'Plugins > Add New'
1. Search for 'TeleLog'
1. Install and activate the TeleLog plugin

=== Install TeleLog manually ===

1. Upload the `telelog` directory to the `/wp-content/plugins/` directory
1. Activate the TeleLog plugin from the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= Support and Documentation =

Please refer to our [GitHub Repository](https://github.com/mahdyar/telelog).

== Screenshots ==

1. Set up with your API key and chat id.
2. Get notified on Telegram.

== Changelog ==

To read the changelog for TeleLog, please navigate to the <a href="https://github.com/mahdyar/telelog/releases">release page</a>.
