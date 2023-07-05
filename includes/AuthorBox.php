<?php

declare( strict_types=1 );

namespace MRH\AuthorBox;

final class AuthorBox {

    /**
     * Static class object.
     *
     * @var object
     */
    private static $instance;

    public const version = '1.0.0';
    public const domain  = 'mrhab-author-box';

    /**
     * Private class constructor.
     */
    private function __construct() {
        $this->define_constants();
        $this->init_hooks();
    }

    /**
     * Private class cloner.
     */
    private function __clone() {
    }

    public static function instance(): AuthorBox {
        if ( !isset( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Defines the required constants.
     */
    public function define_constants(): void {
        define( 'MRHAB_VERSION', self::version );
        define( 'MRHAB_URL', plugins_url( '', MRHAB_FILE ) );
        define( 'MRHAB_ASSETS', MRHAB_URL . '/assets' );
        define( 'MRHAB_INCLUDES', MRHAB_PATH . '/includes' );
        define( 'MRHAB_DOMAIN', self::domain );
    }

    /**
     * Initialize hooks.
     */
    private function init_hooks(): void {
        register_activation_hook( MRHAB_FILE, [$this, 'activate'] );
        add_action( 'plugins_loaded', [$this, 'init_classes'] );
    }

    /**
     * Updates info on plugin activation.
     */
    public function activate(): void {
        $activator = new Activator();
        $activator->run();
    }

    /**
     * Initializes the necessary classes for the plugin.
     */
    public function init_classes(): void {
        new Assets();
        new Frontend();

        if ( is_user_logged_in() ) {
            new User();
        }
    }
}
