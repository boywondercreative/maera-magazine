<?php

class Maera_MG_Widget_Classes {

	public $classes;

	public function __construct() {
		$this->classes = $this->widget_classes();
	}

	public function widget_classes() {

		$widget_colors = new Maera_Widget_Dropdown_Class(
			array(
				'id'      => 'maera_mg_width',
				'label'   => __( 'Width', 'maera_md' ),
				'choices' => array(
					'20' => array( 'label' => '20%', 'classes' => 'column percent-20' ),
					'30' => array( 'label' => '30%', 'classes' => 'column percent-30' ),
					'40' => array( 'label' => '40%', 'classes' => 'column percent-40' ),
					'50' => array( 'label' => '50%', 'classes' => 'column percent-50' ),
					'60' => array( 'label' => '60%', 'classes' => 'column percent-60' ),
					'70' => array( 'label' => '70%', 'classes' => 'column percent-70' ),
					'80' => array( 'label' => '80%', 'classes' => 'column percent-80' ),
				),
				'default' => '100',
			)
		);
	}
}
