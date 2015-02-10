<?php

class Maera_MG_Style {

	public $sidebar_width;
	public $site_mode;

	function __construct() {
		add_filter( 'body_class', array( $this, 'body_classes' ) );

		$this->sidebar_width = get_theme_mod( 'sidebar_width', '336' );
		$this->site_mode     = get_theme_mod( 'site_mode', 'default' );
	}

	/**
	 * Add some classes to the <body> element.
	 */
	public function body_classes( $classes ) {

		$classes[] = 'sidebar-' . $this->sidebar_width;
		$classes[] = 'site-mode-' . $this->site_mode;

		return $classes;

	}

}
