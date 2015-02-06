<?php

class Maera_MG_Enqueue {

    function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ), 100 );
    }

    /**
     * Add our custom stylesheets and scripts
     */
    function scripts() {

        // Add our custom styles
		wp_register_style( 'maera-mg', trailingslashit( MAERA_MAGAZINE_SHELL_URL ) . 'assets/css/app.css' );
		wp_register_style( 'normalize', trailingslashit( MAERA_MAGAZINE_SHELL_URL ) . 'assets/css/normalize.css' );

        wp_enqueue_style( 'normalize' );
		wp_enqueue_style( 'maera-mg' );
    }

}
