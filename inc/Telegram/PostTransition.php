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
        $author = get_the_author_meta('user_login', $post->post_author);
        $email = get_the_author_meta('user_email', $post->post_author);
        if ($new_status == 'publish') {
            if ($old_status !== "publish" && $this->onPostPublish === '1') {
                $this->alert(__('Post published', 'telelog'), $post->ID, null, __FUNCTION__, $author, $this->get_client_ip(), $email);
            } else if ($old_status === "publish" && $this->onPostUpdate === '1') {
                $this->alert(__('Post updated', 'telelog'), $post->ID, null, __FUNCTION__, $author, $this->get_client_ip(), $email);
            }
        }
    }
}
