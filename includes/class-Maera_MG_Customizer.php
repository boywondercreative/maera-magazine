<?php

class Maera_MG_Customizer {

    function __construct() {

        add_action( 'customize_register', array( $this, 'customizer_sections' ) );
        add_filter( 'kirki/controls', array( $this, 'settings' ) );

    }

    /*
     * Create the sections
     */
    function customizer_sections( $wp_customize ) {

        $sections = array(
            'frontpage'   => array( 'title' => __( 'Frontpage', 'maera_mg' ), 'priority' => 20, ),
            'archives'    => array( 'title' => __( 'Archives', 'maera_mg' ), 'priority' => 30, ),
            'single_post' => array( 'title' => __( 'Single Posts', 'maera_mg' ), 'priority' => 40, ),
            'layout'      => array( 'title' => __( 'Layout', 'maera_mg' ), 'priority' => 50 ),
            'typography'  => array( 'title' => __( 'Typography', 'maera_mg' ), 'priority' => 60, ),
            'colors'      => array( 'title' => __( 'Colors', 'maera_mg' ), 'priority' => 70 ),
        );

        foreach ( $sections as $section => $args ) {

            $wp_customize->add_section( $section, array(
                'title'    => $args['title'],
                'priority' => $args['priority'],
                'panel'    => isset( $args['panel'] ) ? $args['panel'] : '',
            ) );

        }

    }

    function settings( $controls ) {

		$controls[] = array(
			'type'     => 'radio',
			'setting'  => 'sidebar_width',
			'label'    => __( 'Sidebar Width', 'maera_mg' ),
			'section'  => 'layout',
			'default'  => '336',
			'priority' => 1,
			'choices'  => array(
				'300' => __( '300px', 'maera_mg' ),
				'320' => __( '320px', 'maera_mg' ),
				'336' => __( '336px', 'maera_mg' ),
			),
		);

		$controls[] = array(
			'type'     => 'radio',
			'setting'  => 'fpm_top',
			'label'    => __( 'Frontpage Module - Top', 'maera_mg' ),
			'section'  => 'frontpage',
			'default'  => 'grid',
			'priority' => 1,
			'choices'  => array(
				'none'   => __( 'None', 'maera_mg' ),
				'grid_5' => __( '5-post grid', 'maera_mg' ),
				'single_big' => __( 'Single Post, BIG', 'maera_mg' ),
			),
		);

		$controls[] = array(
			'type'     => 'select',
			'setting'  => 'fpm_top_cat',
			'label'    => __( 'Frontpage Module - Top - Category', 'maera_mg' ),
			'section'  => 'frontpage',
			'default'  => 'all',
			'priority' => 2,
			'choices'  => $this->get_categories(),
		);

        return $controls;

    }

	public function get_categories() {

		$cats = array();
		$cats['all'] = __( 'All', 'maera_mg' );

		$args = array(
			'type'                     => 'post',
			'orderby'                  => 'count',
			'order'                    => 'ASC',
			'hide_empty'               => 1,
			'hierarchical'             => 0,
			'number'                   => 20,
			'taxonomy'                 => 'category',
			'pad_counts'               => false
		);

		$categories = get_categories( $args );

		foreach ( $categories as $category ) {
			$cats[$category->term_id] = $category->name;
		}

		return $cats;

	}

}
