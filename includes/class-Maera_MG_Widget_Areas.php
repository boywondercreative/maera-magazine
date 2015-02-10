<?php

class Maera_MG_Widget_Areas {

	function __construct() {
		add_action( 'widgets_init', array( $this, 'widgets_init' ) );
	}

	function widgets_init() {

		$class        = apply_filters( 'maera/widgets/class', '' );
		$before_title = apply_filters( 'maera/widgets/title/before', '<h3 class="widget-title">' );
		$after_title  = apply_filters( 'maera/widgets/title/after', '</h3>' );

		register_sidebar( array(
			'name'          => 'Frontpage Top',
			'id'            => 'front_top',
			'before_widget' => apply_filters( 'maera/widgets/before', '<section id="%1$s" class="' . $class . ' widget %2$s">' ),
			'after_widget'  => apply_filters( 'maera/widgets/after', '</section>' ),
			'before_title'  => $before_title,
			'after_title'   => $after_title,
		) );
		register_sidebar( array(
			'name'          => 'Frontpage Main',
			'id'            => 'front_main',
			'before_widget' => apply_filters( 'maera/widgets/before', '<section id="%1$s" class="' . $class . ' widget %2$s">' ),
			'after_widget'  => apply_filters( 'maera/widgets/after', '</section>' ),
			'before_title'  => $before_title,
			'after_title'   => $after_title,
		) );

	}

}
