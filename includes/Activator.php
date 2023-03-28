<?php

declare( strict_types=1 );

namespace MRH\AuthorBox;

class Activator {

    /**
     * Runs the activator.
     */
    public function run(): void {
        $this->add_plugin_info();
    }

    /**
     * Adds plugin info.
     */
    public function add_plugin_info(): void {
        $activated = get_option( 'mrhab_installation_time' );

        if ( !$activated ) {
            update_option( 'mrhab_installation_time', time() );
        }

        update_option( 'mrhab_version', MRHAB_VERSION );
    }
}
