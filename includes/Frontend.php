<?php

declare(strict_types=1);

namespace MRH\AuthorBox;

class Frontend
{

    public function __construct()
    {
        if (defined('DOING_AJAX') && DOING_AJAX) {
            new Frontend\Ajax();
        }
        new Frontend\Shortcode();
        new Frontend\AuthorBox();
    }
}
