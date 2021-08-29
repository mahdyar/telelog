<?php

/**
 * @package Telelog
 */

namespace Telelog\Inc\Telegram;

use Telelog\Inc\Telegram\Telegram;

class PostComment extends Telegram
{
    private $onPostComment;
    public function __construct()
    {
        parent::__construct();

        $this->onPostComment = get_option('telelog_on_post_comment');
    }
    public function register()
    {
        if ($this->onPostComment === '1')
            add_action('comment_post', array($this, 'post_comment'), 10, 3);
    }
    function post_comment($comment_id, $comment_approved, $comment_data)
    {
        if ($comment_approved === 0) {
            $url = get_permalink($comment_data['comment_post_ID']);
            $title = get_the_title($comment_data['comment_post_ID']);
            $text = '❕' . __('New comment', 'telelog') . ': <a href="' . $url . '">' . $title . '</a>' . "\n\n💬 " . $comment_data['comment_content'] . "\n\n#️⃣ #" . __FUNCTION__;
            $post_author_string = "\n\n👤 " . __('By', 'telelog') . ': ' . $comment_data['comment_author'] . ' (' . $comment_data['comment_author_IP'] . ') - ' . $comment_data['comment_author_email'];
            $this->send_message($text . $post_author_string);
        }
    }
}
