<?php

declare( strict_types=1 );

namespace MRH\AuthorBox;

class Assets {

    public function __construct() {
        add_action( 'wp_enqueue_scripts', [$this, 'register_assets'] );
    }

    /**
     * Retrives stylesheet info.
     */
    private function get_styles(): array {
        return [
            'mrhab-enquiry-style' => [
                'src'     => MRHAB_ASSETS . '/css/enquiry.css',
                'deps'    => false,
                'version' => filemtime( MRHAB_PATH . '/assets/css/enquiry.css' ),
            ],
            'mrhab-style' => [
                'src'     => MRHAB_ASSETS . '/css/style.css',
                'deps'    => false,
                'version' => filemtime( MRHAB_PATH . '/assets/css/style.css' ),
            ],
        ];
    }

    /**
     * Retrives scripts info.
     */
    private function get_scripts(): array {
        return [
            'mrhab-enquiry-script' => [
                'src'     => MRHAB_ASSETS . '/js/enquiry.js',
                'deps'    => ['jquery'],
                'version' => filemtime( MRHAB_PATH . '/assets/js/enquiry.js' ),
                'footer'  => true,
            ],
        ];
    }

    /**
     * Registers the assets.
     */
    public function register_assets(): void {
        $this->register_styles();
        $this->register_scripts();
    }

    private function register_styles(): void {
        $styles = $this->get_styles();

        foreach ( $styles as $handle => $style ) {
            wp_register_style( $handle, $style['src'], $style['deps'], $style['version'] );
        }
    }

    private function register_scripts(): void {
        $scripts = $this->get_scripts();

        foreach ( $scripts as $handle => $script ) {
            wp_register_script( $handle, $script['src'], $script['deps'], $script['version'], $script['footer'] );

            if ( $handle === 'mrhab-enquiry-script' ) {
                wp_localize_script(
                    $handle,
                    'mrhab',
                    [
                        'ajaxurl' => admin_url( 'admin-ajax.php' ),
                        'error'   => __( 'Something went wrong', 'mrh-author-box' ),
                    ]
                );
            }
        }
    }
}
