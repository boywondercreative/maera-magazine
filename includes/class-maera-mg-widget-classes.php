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
		// 		'label'   => __( 'Accent Color', 'maera_md' ),
		// 		'choices' => array(
		// 			'f44336' => array( 'label' => 'red', 'classes' => 'red' ),
		// 			'e91e63' => array( 'label' => 'pink', 'classes' => 'pink' ),
		// 			'9c27b0' => array( 'label' => 'purple', 'classes' => 'purple' ),
		// 			'673ab7' => array( 'label' => 'deep-purple', 'classes' => 'deep-purple' ),
		// 			'3f51b5' => array( 'label' => 'indigo', 'classes' => 'indigo' ),
		// 			'2196f3' => array( 'label' => 'blue', 'classes' => 'blue' ),
		// 			'03a9f4' => array( 'label' => 'light-blue', 'classes' => 'light-blue' ),
		// 			'00bcd4' => array( 'label' => 'cyan', 'classes' => 'cyan' ),
		// 			'009688' => array( 'label' => 'teal', 'classes' => 'teal' ),
		// 			'4caf50' => array( 'label' => 'green', 'classes' => 'green' ),
		// 			'8bc34a' => array( 'label' => 'light-green', 'classes' => 'light-green' ),
		// 			'cddc39' => array( 'label' => 'lime', 'classes' => 'lime' ),
		// 			'ffeb3b' => array( 'label' => 'yellow', 'classes' => 'yellow' ),
		// 			'ffc107' => array( 'label' => 'amber', 'classes' => 'amber' ),
		// 			'ff9800' => array( 'label' => 'orange', 'classes' => 'orange' ),
		// 			'ff5722' => array( 'label' => 'deep-orange', 'classes' => 'deep-orange' ),
		// 			'795548' => array( 'label' => 'brown', 'classes' => 'brown' ),
		// 			'9e9e9e' => array( 'label' => 'grey', 'classes' => 'grey' ),
		// 			'607d8b' => array( 'label' => 'blue-grey', 'classes' => 'blue-grey' ),
		// 		),
		// 		'default' => '',
		// 	)
		// );

	}
}
