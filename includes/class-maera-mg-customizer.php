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
			'header'          => array( 'title' => __( 'Header Options', 'maera_mg' ), 'priority' => 1, ),
			'main_style'      => array( 'title' => __( 'Main Area styles', 'maera_mg' ), 'priority' => 10, ),
			'front_top_style' => array( 'title' => __( 'Frontpage-Top styles', 'maera_mg' ), 'priority' => 20, ),
            'archives'        => array( 'title' => __( 'Archives', 'maera_mg' ), 'priority' => 30, ),
            'single_post'     => array( 'title' => __( 'Single Posts', 'maera_mg' ), 'priority' => 40, ),
            'layout'          => array( 'title' => __( 'Layout', 'maera_mg' ), 'priority' => 50 ),
            'typography'      => array( 'title' => __( 'Typography', 'maera_mg' ), 'priority' => 60, ),
            'colors'          => array( 'title' => __( 'Colors', 'maera_mg' ), 'priority' => 70 ),
            'background'      => array( 'title' => __( 'Background', 'maera_mg' ), 'priority' => 100 ),
            'typo_base'       => array( 'title' => __( 'Base Typography', 'maera_mg' ), 'priority' => 100 ),
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
			'type'     => 'sortable',
			'setting'  => 'single_post_parts',
			'label'    => __( 'Single Post Parts', 'maera_mg' ),
			'section'  => 'single_post',
			'default'  => '',
			'priority' => 2,
			'choices'  => array(
				'title'    => __( 'Title', 'maera_mg' ),
				'image'    => __( 'Featured Image', 'maera_mg' ),
				'content'  => __( 'Post Content', 'maera_mg' ),
				'meta'     => __( 'Post Meta', 'maera_mg' ),
				'author'   => __( 'Author', 'maera_mg' ),
				'comments' => __( 'Comments', 'maera_mg' ),
			),
		);

		$controls[] = array(
			'type'     => 'radio',
			'mode'     => 'buttonset',
			'setting'  => 'site_mode',
			'label'    => __( 'My Setting', 'textdomain' ),
			'section'  => 'layout',
			'default'  => 'default',
			'priority' => 2,
			'choices'  => array(
				'default' => __( 'Default', 'maera_mg' ),
				'boxed'   => __( 'Boxed', 'maera_mg' ),
				'full'    => __( 'Full-width', 'maera_mg' ),
			),
		);

		$controls[] = array(
			'type'         => 'background',
			'setting'      => 'main_bg',
			'label'        => __( 'Background', 'textdomain' ),
			'section'      => 'main_style',
			'default'      => array(
				'color'    => '#f7f7f7',
				'image'    => null,
				'repeat'   => 'repeat',
				'size'     => 'inherit',
				'attach'   => 'inherit',
				'position' => 'left-top',
				'opacity'  => 100,
			),
			'priority' => 3,
			'output' => '.content-primary-wrapper.main'
		);

		$controls[] = array(
			'type'         => 'background',
			'setting'      => 'header_bg',
			'label'        => __( 'Background', 'textdomain' ),
			'section'      => 'header',
			'default'      => array(
				'color'    => '#f7f7f7',
				'image'    => null,
				'repeat'   => 'repeat',
				'size'     => 'inherit',
				'attach'   => 'inherit',
				'position' => 'left-top',
				'opacity'  => 100,
			),
			'priority' => 3,
			'output' => '.global.header'
		);
		$controls[] = array(
			'type'         => 'background',
			'setting'      => 'front_top_bg',
			'label'        => __( 'Background', 'textdomain' ),
			'section'      => 'front_top_style',
			'default'      => array(
				'color'    => '#f7f7f7',
				'image'    => null,
				'repeat'   => 'repeat',
				'size'     => 'inherit',
				'attach'   => 'inherit',
				'position' => 'left-top',
				'opacity'  => 100,
			),
			'priority' => 3,
			'output' => '.front-top-wrapper',
		);

        $controls[] = array(
            'type'     => 'select',
            'setting'  => 'font_base_family',
            'label'    => __( 'Base font', 'maera_bs' ),
            'section'  => 'typo_base',
            'default'  => '"Helvetica Neue", Helvetica, Arial, sans-serif',
            'priority' => 20,
            'choices'  => Kirki_Fonts::get_font_choices(),
            'output' => array(
                'element'  => 'body',
                'property' => 'font-family',
            ),
        );

        $controls[] = array(
            'type'     => 'multicheck',
            'setting'  => 'font_subsets',
            'label'    => __( 'Google-Font subsets', 'maera_bs' ),
            'description' => __( 'The subsets used from Google\'s API.', 'maera_bs' ),
            'section'  => 'typo_base',
            'default'  => 'latin',
            'priority' => 22,
            'choices'  => Kirki_Fonts::get_google_font_subsets(),
            'output' => array(
                'element'  => 'body',
                'property' => 'font-subset',
            ),
        );

        $controls[] = array(
            'type'     => 'slider',
            'setting'  => 'font_base_weight',
            'label'    => __( 'Base Font Weight', 'maera_bs' ),
            'section'  => 'typo_base',
            'default'  => 400,
            'priority' => 24,
            'choices'  => array(
                'min'  => 100,
                'max'  => 900,
                'step' => 100,
            ),
            'output' => array(
                'element'  => 'body',
                'property' => 'font-weight',
            ),
        );

        $controls[] = array(
            'type'     => 'slider',
            'setting'  => 'font_base_size',
            'label'    => __( 'Base Font Size', 'maera_bs' ),
            'section'  => 'typo_base',
            'default'  => 14,
            'priority' => 25,
            'choices'  => array(
                'min'  => 7,
                'max'  => 48,
                'step' => 1,
            ),
            'output' => array(
                'element'  => 'body',
                'property' => 'font-size',
                'units'    => 'px',
            ),
        );

        $controls[] = array(
            'type'     => 'slider',
            'setting'  => 'font_base_height',
            'label'    => __( 'Base Line Height', 'maera_bs' ),
            'section'  => 'typo_base',
            'default'  => 1.43,
            'priority' => 26,
            'choices'  => array(
                'min'  => 0,
                'max'  => 3,
                'step' => 0.01,
            ),
            'output' => array(
                'element'  => 'body',
                'property' => 'line-height',
            ),
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
