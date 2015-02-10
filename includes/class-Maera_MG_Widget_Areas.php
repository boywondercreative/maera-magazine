<?php

class Maera_MG_Widget_Areas {

	function __construct() {
		add_action( 'widgets_init', array( $this, 'widgets_init' ) );
	}

	function widgets_init() {

		register_sidebar( array(
			'name'          => 'Frontpage Top',
			'id'            => 'front_top',
			'before_widget' => '', // No need for these here, we'll add them in the twig template file.
			'after_widget'  => '', // No need for these here, we'll add them in the twig template file.
			'before_title'  => '', // No need for these here, we'll add them in the twig template file.
			'after_title'   => '', // No need for these here, we'll add them in the twig template file.
		) );
		register_sidebar( array(
			'name'          => 'Frontpage Main',
			'id'            => 'front_main',
			'before_widget' => '', // No need for these here, we'll add them in the twig template file.
			'after_widget'  => '', // No need for these here, we'll add them in the twig template file.
			'before_title'  => '', // No need for these here, we'll add them in the twig template file.
			'after_title'   => '', // No need for these here, we'll add them in the twig template file.
		) );

	}

}
