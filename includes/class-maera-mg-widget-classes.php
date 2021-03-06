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
					'1-12' => array( 'label' => '1/12', 'classes' => 'col-md-1' ),
					'2-12' => array( 'label' => '2/12', 'classes' => 'col-md-2' ),
					'3-12' => array( 'label' => '3/12', 'classes' => 'col-md-3' ),
					'4-12' => array( 'label' => '4/12', 'classes' => 'col-md-4' ),
					'5-12' => array( 'label' => '5/12', 'classes' => 'col-md-5' ),
					'6-12' => array( 'label' => '6/12', 'classes' => 'col-md-6' ),
					'7-12' => array( 'label' => '7/12', 'classes' => 'col-md-7' ),
					'8-12' => array( 'label' => '8/12', 'classes' => 'col-md-8' ),
					'9-12' => array( 'label' => '9/12', 'classes' => 'col-md-9' ),
					'10-12' => array( 'label' => '10/12', 'classes' => 'col-md-10' ),
					'11-12' => array( 'label' => '12/12', 'classes' => 'col-md-11' ),
					'12-12' => array( 'label' => '12/12', 'classes' => 'col-md-12' ),
				),
				'default' => '12-12',
			)
		);

		$widget_colors = new Maera_Widget_Dropdown_Class(
			array(
				'id'      => 'maera_mg_color',
				'label'   => __( 'Accent Color', 'maera_md' ),
				'choices' => array(
					'00bcd4' => array( 'label' => 'cyan',          'classes' => 'cyan' ),
					'009688' => array( 'label' => 'teal',          'classes' => 'teal' ),
					'4caf50' => array( 'label' => 'green',         'classes' => 'green' ),
					'2e7d32' => array( 'label' => 'dark-green',    'classes' => 'dark-green' ),
					'2196f3' => array( 'label' => 'blue',          'classes' => 'blue' ),
					'3f51b5' => array( 'label' => 'indigo',        'classes' => 'indigo' ),
					'e91e63' => array( 'label' => 'pink',          'classes' => 'pink' ),
					'9c27b0' => array( 'label' => 'purple',        'classes' => 'purple' ),
					'4e342e' => array( 'label' => 'brown',         'classes' => 'brown' ),
					'263238' => array( 'label' => 'blue-grey',     'classes' => 'blue-grey' ),
					'ffc107' => array( 'label' => 'amber',         'classes' => 'amber' ),
					'ff9800' => array( 'label' => 'orange',        'classes' => 'orange' ),
					'ff5722' => array( 'label' => 'deep-orange',   'classes' => 'deep-orange' ),
					'ffeb3b' => array( 'label' => 'yellow',        'classes' => 'yellow' ),
					'f44336' => array( 'label' => 'red',           'classes' => 'red' ),
					'c62828' => array( 'label' => 'red-dark',      'classes' => 'red-dark' ),
					'fafafa' => array( 'label' => 'almost-white',  'classes' => 'almost-white' ),
					'e0e0e0' => array( 'label' => 'almost-grey',   'classes' => 'almost-grey' ),
					'9e9e9e' => array( 'label' => 'concrete-grey', 'classes' => 'concrete-grey' ),
					'757575' => array( 'label' => 'asbestos-grey', 'classes' => 'asbestos-grey' ),
					'000000' => array( 'label' => 'black',         'classes' => 'black' ),
				),
				'default' => '',
			)
		);

	}
}
