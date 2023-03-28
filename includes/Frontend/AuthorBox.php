<?php

declare( strict_types=1 );

namespace MRH\AuthorBox\Frontend;

use MRH\AuthorBox\Helpers\Template;

class AuthorBox {

    public function __construct() {
        add_filter( 'the_content', [$this, 'get_author_bio'] );
    }

    public function get_author_bio( $content ) {
        global $post;
        $author            = get_user_by( 'ID', $post->post_author );
        $social_media_info = [
            'bio'      => get_user_meta( $author->ID, 'description', true ),
            'github'   => get_user_meta( $author->ID, 'github', true ),
            'linkedin' => get_user_meta( $author->ID, 'linkedin', true ),
            'twitter'  => get_user_meta( $author->ID, 'twitter', true ),
            'facebook' => get_user_meta( $author->ID, 'facebook', true ),
        ];

        if ( $post->post_type === 'post' ) {
            ob_start();
            Template::render(
                MRHAB_INCLUDES . '/Frontend/views/author-box.php',
                ['author' => $author, 'social_media_info' => $social_media_info]
            );
            $bio_content = ob_get_clean();
            wp_enqueue_style( 'mrhab-style' );
            $content .= $bio_content;
        }

        return $content;
    }
}
