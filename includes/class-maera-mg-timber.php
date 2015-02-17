<?php

class Maera_MG_Timber {

	function __construct() {
		add_filter( 'maera/timber/context', array( $this, 'timber_global_context' ) );
	}

	/**
	* Modify Timber global context
	*/
	function timber_global_context( $data ) {

		$data['sidebar']['front_top'] = Timber::get_widgets( 'front_top' );
		$data['sidebar']['front_main'] = Timber::get_widgets( 'front_main' );
		$data['sidebar']['header'] = Timber::get_widgets( 'header' );
		$data['sidebar']['pre_main_top'] = Timber::get_widgets( 'pre_main_top' );
		$data['sidebar']['main_top'] = Timber::get_widgets( 'main_top' );
		$data['sidebar']['main_bottom'] = Timber::get_widgets( 'main_bottom' );

		return $data;

	}

}
