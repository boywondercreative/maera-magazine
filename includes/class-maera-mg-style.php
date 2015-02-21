<?php

class Maera_MG_Style {

	public $sidebar_width;
	public $site_mode;

	function __construct() {

		global $wp_customize;

		if ( $wp_customize ) {
			add_action( 'wp_enqueue_scripts', array( $this, 'custom_css' ), 105 );
			remove_action( 'wp_head', array( 'Jetpack_Custom_CSS', 'link_tag' ), 101 );
		}

		add_action( 'wp_loaded', array( $this, 'activate_custom_css' ) );
		add_action( 'customize_save_after', array( $this, 'custom_css_theme_mod_to_jetpack' ) );
		add_action( 'safecss_parse_post', array( $this, 'custom_css_jetpack_to_theme_mod' ) );

		add_filter( 'body_class', array( $this, 'body_classes' ) );

		$this->sidebar_width = get_theme_mod( 'sidebar_width', '336' );
		$this->site_mode     = get_theme_mod( 'site_mode', 'default' );
	}

	/**
	 * Add some classes to the <body> element.
	 */
	public function body_classes( $classes ) {

		$classes[] = 'sidebar-' . $this->sidebar_width;
		$classes[] = 'site-mode-' . $this->site_mode;

		return $classes;

	}

	/**
	 * Include the custom CSS
	 * Activate the custom CSS module.
	 */
	public function custom_css() {
		$css = get_theme_mod( 'css', '' );
		if ( ! empty( $css ) ) {
			wp_add_inline_style( 'maera', $css );
		}
	}

	/**
	 * Activate the custom CSS module.
	 */
	public function activate_custom_css() {

		$jetpack_active_modules = get_option( 'jetpack_active_modules' );

		if ( ! in_array( 'custom-css', $jetpack_active_modules ) ) {
			$jetpack_active_modules[] = 'custom-css';
			update_option( 'jetpack_active_modules', $jetpack_active_modules );
		} else {
			// Get CSS saved as a theme mod
			$css = get_theme_mod( 'css', '' );

			if ( ! empty( $css ) && empty( Jetpack_Custom_CSS::get_css() ) ) {
				// Jetpack_Custom_CSS::save( array( 'css' => $css ) );
			}
		}

	}

	/**
	 * Copy the custom CSS from theme_mod to Jetpack
	 */
	public function custom_css_theme_mod_to_jetpack() {
		$css = get_theme_mod( 'css', '' );
		Jetpack_Custom_CSS::save( array( 'css' => $css ) );
	}

	/**
	 * Copy the custom CSS from Jetpack to theme_mod
	 */
	public function custom_css_jetpack_to_theme_mod() {
		$css = Jetpack_Custom_CSS::get_css();
		if ( $css != get_theme_mod( 'css', '' ) ) {
			set_theme_mod( 'css', $css );
		}
	}

}
