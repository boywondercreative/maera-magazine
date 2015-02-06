<?php
/*
Plugin Name:         Maera Magazine Shell
Plugin URI:          https://press.codes
Description:         Magazibe shell for the Maera theme.
Version:             0.1
Author:              Aristeides Stathopoulos
Author URI:          https://press.codes
Text Domain:         maera_mg
*/

define( 'MAERA_MG_VER', '0.95.1' );
define( 'MAERA_MAGAZINE_SHELL_URL', plugins_url( '', __FILE__ ) );
define( 'MAERA_MAGAZINE_SHELL_PATH', dirname( __FILE__ ) );

/**
 * Include the shell
 */
function maera_shell_magazine_include( $shells ) {

    // Add our shell to the array of available shells
    $shells[] = array(
        'value' => 'magazine',
        'label' => 'Magazine',
        'class' => 'Maera_Magazine',
    );

    return $shells;

}
add_filter( 'maera/shells/available', 'maera_shell_magazine_include' );

if ( ! class_exists( 'Maera_Magazine' ) ) {

    /**
     * The Magazine Shell module
     */
    class Maera_Magazine {

        private static $instance;
        public $customizer;
        public $enqueue;
        public $settings;
        public $style;

        /**
         * Class constructor
         */
        public function __construct() {

            if ( ! defined( 'MAERA_SHELL_PATH' ) ) {
                define( 'MAERA_SHELL_PATH', dirname( __FILE__ ) );
            }

            // Require any additional files
            require_once( __DIR__ . '/includes/class-Maera_MG_Customizer.php');
            require_once( __DIR__ . '/includes/class-Maera_MG_Enqueue.php');
            require_once( __DIR__ . '/includes/class-Maera_MG_Style.php');
            require_once( __DIR__ . '/includes/class-Maera_MG_Widget_Areas.php');
            require_once( __DIR__ . '/includes/class-Maera_MG_Featured_Widget.php');
            require_once( __DIR__ . '/includes/class-Maera_MG_Timber.php');

            $this->customizer = new Maera_MG_Customizer();
            $this->enqueue    = new Maera_MG_Enqueue();
            $this->style      = new Maera_MG_Style();
            $this->sidebars   = new Maera_MG_Widget_Areas();
            $this->timber     = new Maera_MG_Timber();

        }

        /**
         * Singleton
         */
        public static function get_instance() {

            if ( null == self::$instance ) {
                self::$instance = new self;
            }

            return self::$instance;

        }

    }

}

/**
 * Licensing handler
 */
function maera_mg_licensing() {

    if ( is_admin() && class_exists( 'Maera_Updater' ) ) {
        $maera_mg_license = new Maera_Updater( 'plugin', __FILE__, 'Maera Magazine Shell', MAERA_MG_VER, '@aristath, @fovoc' );
    }

}
add_action( 'init', 'maera_mg_licensing' );
