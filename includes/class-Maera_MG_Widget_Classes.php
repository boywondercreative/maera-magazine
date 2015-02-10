<?php

class Maera_MG_Widget_Classes {

	public $classes;

	public function __construct() {
		$this->classes = $this->widget_classes();
	}

	public function widget_classes() {

		$widget_widths = new Maera_Widget_Dropdown_Class(
			array(
				'id'      => 'maera_mg_width',
				'label'   => __( 'Width', 'maera_md' ),
				'choices' => array(
					'1-4' => array( 'label' => '1/4', 'classes' => 'col-xs-12 col-sm-12 col-md-3' ),
					'1-3' => array( 'label' => '1/3', 'classes' => 'col-xs-12 col-sm-12 col-md-4' ),
					'1-2' => array( 'label' => '1/2', 'classes' => 'col-xs-12 col-sm-12 col-md-6' ),
					'2-3' => array( 'label' => '2/3', 'classes' => 'col-xs-12 col-sm-12 col-md-8' ),
					'3-4' => array( 'label' => '3/4', 'classes' => 'col-xs-12 col-sm-12 col-md-9' ),
					'1'   => array( 'label' => '4/4', 'classes' => 'col-xs-12' ),
				),
				'default' => '1',
			)
		);

		// $widget_colors = new Maera_Widget_Dropdown_Class(
		// 	array(
		// 		'id'      => 'maera_mg_color',
		// 		'label'   => __( 'Width', 'maera_md' ),
		// 		'choices' => array(
		// 		),
		// 		'default' => '',
		// 	)
		// );

	}
}
