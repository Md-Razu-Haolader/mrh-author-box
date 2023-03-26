<?php

declare(strict_types=1);

namespace MRH\AuthorBox\Frontend;

use MRH\AuthorBox\Helpers\Template;

class Shortcode
{

    public function __construct()
    {
        add_shortcode('mrhab-enquiry', [$this, 'render_shortcode']);
    }

    public function render_shortcode($atts, string $content = '')
    {
        $this->enqueue_scripts();
        ob_start();
        Template::render(MRHAB_INCLUDES . '/Frontend/views/enquiry-form.php');
        $content = ob_get_clean();
        return $content;
    }

    private function enqueue_scripts()
    {
        wp_enqueue_style('mrhab-enquiry-style');
        wp_enqueue_script('mrhab-enquiry-script');
    }
}
