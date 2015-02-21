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

        $panels = array(
            'structure'   => array( 'title' => __( 'Structure', 'maera_bs' ), 'description' => __( 'Set the structure options', 'maera_bs' ), 'priority' => 10 ),
            'styles'      => array( 'title' => __( 'Styles', 'maera_bs' ), 'description' => __( 'Set the site backgrounds', 'maera_bs' ), 'priority' => 20 ),
            'typography'  => array( 'title' => __( 'Typography', 'maera_bs' ), 'description' => __( 'Set the site typography options', 'maera_bs' ), 'priority' => 30 ),
        );

        $sections = array(
			'header'          => array( 'title' => __( 'Header Options', 'maera_mg' ), 'priority' => 1, ),
			'main_style'      => array( 'title' => __( 'Main Area styles', 'maera_mg' ), 'priority' => 10, 'panel' => 'styles' ),
			'front_top_style' => array( 'title' => __( 'Frontpage-Top styles', 'maera_mg' ), 'priority' => 20, 'panel' => 'styles' ),
            'single_post'     => array( 'title' => __( 'Single Posts', 'maera_mg' ), 'priority' => 40, 'panel' => 'structure' ),
            'layout'          => array( 'title' => __( 'Layout', 'maera_mg' ), 'priority' => 50, 'panel' => 'structure' ),
            'colors'          => array( 'title' => __( 'Colors', 'maera_mg' ), 'priority' => 70, 'panel' => 'styles' ),
            'background'      => array( 'title' => __( 'Background', 'maera_mg' ), 'priority' => 100, 'panel' => 'styles' ),
            'typo_base'       => array( 'title' => __( 'Base Typography', 'maera_mg' ), 'priority' => 100, 'panel' => 'typography' ),
            'typo_headers'    => array( 'title' => __( 'Headers Typography', 'maera_mg' ), 'priority' => 100, 'panel' => 'typography' ),
            'advanced'        => array( 'title' => __( 'Advanced', 'maera_mg' ), 'priority' => 999 ),
        );

        foreach ( $sections as $section => $args ) {

            $wp_customize->add_section( $section, array(
                'title'    => $args['title'],
                'priority' => $args['priority'],
                'panel'    => $args['panel']
            ) );

        }

        foreach ( $panels as $panel => $args ) {

            $wp_customize->add_panel( $panel, array(
                'priority'       => $args['priority'],
                'capability'     => 'edit_theme_options',
                'theme_supports' => '',
                'title'          => $args['title'],
                'description'    => $args['description']
            ) );

        }

    }

    function settings( $controls ) {

		$controls[] = array(
			'type'     => 'select',
			'setting'  => 'sidebar_width',
			'label'    => __( 'Sidebar Width', 'maera_mg' ),
			'section'  => 'layout',
			'default'  => '300',
			'priority' => 1,
			'choices'  => array(
                '250' => __( '250px', 'maera_mg' ),
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
			'default'  => serialize( array( 'title', 'meta', 'content', 'comments' ) ),
			'priority' => 2,
			'choices'  => array(
				'title'        => __( 'Title', 'maera_mg' ),
				'image'        => __( 'Featured Image', 'maera_mg' ),
				'content'      => __( 'Post Content', 'maera_mg' ),
				'meta'         => __( 'Post Meta', 'maera_mg' ),
				'author'       => __( 'Author', 'maera_mg' ),
                'comments'     => __( 'Comments', 'maera_mg' ),
                'in_post_ad_1' => __( 'in-post ads 1', 'maera_mg' ),
                'in_post_ad_2' => __( 'in-post ads 2', 'maera_mg' ),
			),
		);

		// $controls[] = array(
		// 	'type'     => 'radio',
		// 	'mode'     => 'buttonset',
		// 	'setting'  => 'site_mode',
		// 	'label'    => __( 'My Setting', 'textdomain' ),
		// 	'section'  => 'layout',
		// 	'default'  => 'default',
		// 	'priority' => 2,
		// 	'choices'  => array(
		// 		'default' => __( 'Default', 'maera_mg' ),
		// 		'boxed'   => __( 'Boxed', 'maera_mg' ),
		// 		'full'    => __( 'Full-width', 'maera_mg' ),
		// 	),
		// );

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
            'default'  => '"Roboto"',
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
            'default'  => 'all',
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
            'default'  => 18,
            'priority' => 26,
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
            'priority' => 28,
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

        $controls[] = array(
            'type'     => 'textarea',
            'setting'  => 'css',
            'label'    => __( 'Custom CSS', 'maera_mg' ),
            'subtitle' => __( 'You can write your custom CSS here. This code will appear in a script tag appended in the header section of the page (Uses Jetpack\'s custom CSS).', 'maera_mg' ),
            'section'  => 'advanced',
            'priority' => 1,
            'default'  => '',
        );

        $controls[] = array(
            'type'     => 'select',
            'setting'  => 'font_headers_family',
            'label'    => __( 'Headers font', 'maera_bs' ),
            'section'  => 'typo_headers',
            'default'  => "Roboto Slab",
            'priority' => 20,
            'choices'  => Kirki_Fonts::get_font_choices(),
            'output' => array(
                'element'  => 'h1, h2, h3, h4, h5, h6',
                'property' => 'font-family',
            ),
        );

        $controls[] = array(
            'type'     => 'slider',
            'setting'  => 'font_headers_weight_h1',
            'label'    => __( 'H1 Font Weight', 'maera_bs' ),
            'section'  => 'typo_headers',
            'default'  => 900,
            'priority' => 22,
            'choices'  => array(
                'min'  => 100,
                'max'  => 900,
                'step' => 100,
            ),
            'output' => array(
                'element'  => 'h1',
                'property' => 'font-weight',
            ),
        );

        $controls[] = array(
            'type'     => 'slider',
            'setting'  => 'font_headers_weight_h2',
            'label'    => __( 'H2 Font Weight', 'maera_bs' ),
            'section'  => 'typo_headers',
            'default'  => 800,
            'priority' => 24,
            'choices'  => array(
                'min'  => 100,
                'max'  => 900,
                'step' => 100,
            ),
            'output' => array(
                'element'  => 'h2',
                'property' => 'font-weight',
            ),
        );

        $controls[] = array(
            'type'     => 'slider',
            'setting'  => 'font_headers_weight_h3',
            'label'    => __( 'H2 Font Weight', 'maera_bs' ),
            'section'  => 'typo_headers',
            'default'  => 600,
            'priority' => 26,
            'choices'  => array(
                'min'  => 100,
                'max'  => 900,
                'step' => 100,
            ),
            'output' => array(
                'element'  => 'h3',
                'property' => 'font-weight',
            ),
        );

        $controls[] = array(
            'type'     => 'slider',
            'setting'  => 'font_headers_weight_h4',
            'label'    => __( 'H4 Font Weight', 'maera_bs' ),
            'section'  => 'typo_headers',
            'default'  => 400,
            'priority' => 28,
            'choices'  => array(
                'min'  => 100,
                'max'  => 900,
                'step' => 100,
            ),
            'output' => array(
                'element'  => 'h4',
                'property' => 'font-weight',
            ),
        );

        $controls[] = array(
            'type'     => 'slider',
            'setting'  => 'font_h1_size',
            'label'    => __( 'H1 Font Size', 'maera_bs' ),
            'section'  => 'typo_headers',
            'default'  => 52,
            'priority' => 30,
            'choices'  => array(
                'min'  => 7,
                'max'  => 72,
                'step' => 1,
            ),
            'output' => array(
                'element'  => 'h1',
                'property' => 'font-size',
                'units'    => 'px',
            ),
        );

        $controls[] = array(
            'type'     => 'slider',
            'setting'  => 'font_h2_size',
            'label'    => __( 'H2 Font Size', 'maera_bs' ),
            'section'  => 'typo_headers',
            'default'  => 36,
            'priority' => 32,
            'choices'  => array(
                'min'  => 7,
                'max'  => 72,
                'step' => 1,
            ),
            'output' => array(
                'element'  => 'h2',
                'property' => 'font-size',
                'units'    => 'px',
            ),
        );

        $controls[] = array(
            'type'     => 'slider',
            'setting'  => 'font_h3_size',
            'label'    => __( 'H3 Font Size', 'maera_bs' ),
            'section'  => 'typo_headers',
            'default'  => 24,
            'priority' => 34,
            'choices'  => array(
                'min'  => 7,
                'max'  => 72,
                'step' => 1,
            ),
            'output' => array(
                'element'  => 'h3',
                'property' => 'font-size',
                'units'    => 'px',
            ),
        );

        $controls[] = array(
            'type'     => 'slider',
            'setting'  => 'font_h4_size',
            'label'    => __( 'H4 Font Size', 'maera_bs' ),
            'section'  => 'typo_headers',
            'default'  => 18,
            'priority' => 36,
            'choices'  => array(
                'min'  => 7,
                'max'  => 72,
                'step' => 1,
            ),
            'output' => array(
                'element'  => 'h4',
                'property' => 'font-size',
                'units'    => 'px',
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
