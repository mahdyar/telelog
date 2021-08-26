<?php

/**
 * @package Telelog
 */

namespace Telelog\Inc\Telegram;

use Telelog\Inc\Telegram\Telegram;

class PostTransition extends Telegram
{
    private $onPostUpdate;
    private $onPostPublish;
    public function __construct()
    {
        parent::__construct();

        $this->onPostPublish = get_option('telelog_on_post_publish');
        $this->onPostUpdate = get_option('telelog_on_post_update');
    }
    public function register()
    {
        add_action('transition_post_status', array($this, 'post_transition'), 10, 3);
    }
    function post_transition($new_status, $old_status, $post = null)
    {
        if ($new_status == 'publish') {
            $url = get_permalink($post->ID);
            $post_author_string = "\n\n👤 " . __('By', 'telelog') . ": #" . get_the_author_meta('user_login', $post->post_author);
            if ($old_status !== "publish" && $this->onPostPublish === '1') {
                $text = '❕' . __('Post published', 'telelog') . ': <a href="' . $url . '">' . $post->post_title . '</a>' . "\n\n#️⃣ #publish_post";
                $text .=  $post_author_string;
                $this->send_message($text);
            } else if ($old_status === "publish" && $this->onPostUpdate === '1') {
                $text = '❕' . __('Post updated', 'telelog') . ': <a href="' . $url . '">' . $post->post_title . '</a>' . "\n\n#️⃣ #update_post";
                $text .=  $post_author_string;
                $this->send_message($text);
            }
        }
    }
}
