<?php

class Maera_MG_Scripts {

	function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ), 110 );
	}

	/**
	 * Register all scripts and additional stylesheets (if necessary)
	 */
	function scripts() {

		wp_register_script( 'bootstrap-min', MAERA_MAGAZINE_SHELL_URL . '/assets/js/bootstrap.min.js', false, null, true  );
		wp_enqueue_script( 'bootstrap-min' );

		wp_register_script( 'bootstrap-accessibility', MAERA_MAGAZINE_SHELL_URL . '/assets/js/bootstrap-accessibility.min.js', false, null, true  );
		wp_enqueue_script( 'bootstrap-accessibility' );

		wp_register_style( 'bootstrap-accessibility', MAERA_MAGAZINE_SHELL_URL . '/assets/css/bootstrap-accessibility.css', false, null, true );
		wp_enqueue_style( 'bootstrap-accessibility' );

		wp_enqueue_style( 'dashicons' );

	}

}
