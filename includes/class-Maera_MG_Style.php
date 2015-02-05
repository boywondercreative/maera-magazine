<?php

class Maera_MG_Style {

	public $sidebar_width;

	function __construct() {
		add_filter( 'body_class', array( $this, 'body_classes' ) );

		$this->sidebar_width = get_theme_mod( 'sidebar_width', '336' );
	}

	/**
	 * Add some classes to the <body> element.
	 */
	public function body_classes( $classes ) {

		$classes[] = 'sidebar-' . $this->sidebar_width;

		return $classes;

	}

}
