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
            'typography'  => array( 'title' => __( 'Typography', 'maera_mg' ), 'priority' => 50, ),
            'colors'      => array( 'title' => __( 'Colors', 'maera_mg' ), 'priority' => 10 ),
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

        return $controls;

    }

}
