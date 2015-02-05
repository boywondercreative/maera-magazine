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

        return $controls;

    }

}
