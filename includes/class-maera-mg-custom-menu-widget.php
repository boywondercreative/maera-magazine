<?php


/**
 * Navigation Menu widget class
 *
 * @since 3.0.0
 */
class Maera_MG_Custom_Menu_Widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array( 'description' => __('Add a custom menu to your sidebar.') );
		parent::__construct( 'nav_menu', __('Custom Menu'), $widget_ops );
	}

	public function widget($args, $instance) {
		// Get menu
		$nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;

		if ( ! $nav_menu ) {
			return;
		}

		/** This filter is documented in wp-includes/default-widgets.php */
		$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$instance['template'] = ( isset( $instance['template'] ) || ! empty( $instance['template'] ) ) ? $instance['template'] : 'navbar';

		echo $args['before_widget'];

		if ( ! empty($instance['title'] ) ) {
			echo $args['before_title'] . $instance['title'] . $args['after_title'];
		}

		$context['menu'] = new TimberMenu( (int) $instance['nav_menu'] );
		Maera()->views->render( 'menus/' . $instance['template'] . '.twig', $context );

		echo $args['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		if ( ! empty( $new_instance['title'] ) ) {
			$instance['title'] = strip_tags( stripslashes($new_instance['title']) );
		}
		if ( ! empty( $new_instance['nav_menu'] ) ) {
			$instance['nav_menu'] = (int) $new_instance['nav_menu'];
		}
		if ( ! empty( $new_instance['template'] ) ) {
			$instance['template'] = $new_instance['template'];
		}
		return $instance;
	}

	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : '';
		$nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';
		$selected_template = isset( $instance['template'] ) ? $instance['template'] : '';

		$templates = array(
			'humburger'         => __( 'Humburger', 'maera_mg' ),
			'navbar'            => __( 'Navbar', 'maera_mg' ),
			'nav-pills'         => __( 'Nav - Pills', 'maera_mg' ),
			'nav-pills-stacked' => __( 'Nav - Pills - Stacked', 'maera_mg' ),
		);

		// Get menus
		$menus = wp_get_nav_menus();

		// If no menus exists, direct the user to go and create some.
		if ( ! $menus ) {
			echo '<p>'. sprintf( __('No menus have been created yet. <a href="%s">Create some</a>.'), admin_url('nav-menus.php') ) .'</p>';
			return;
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('nav_menu'); ?>"><?php _e('Select Menu:'); ?></label>
			<select id="<?php echo $this->get_field_id('nav_menu'); ?>" name="<?php echo $this->get_field_name('nav_menu'); ?>">
				<option value="0"><?php _e( '&mdash; Select &mdash;' ) ?></option>
		<?php
			foreach ( $menus as $menu ) {
				echo '<option value="' . $menu->term_id . '"'
					. selected( $nav_menu, $menu->term_id, false )
					. '>'. esc_html( $menu->name ) . '</option>';
			}
		?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('template'); ?>"><?php _e('Template:'); ?></label>
			<select id="<?php echo $this->get_field_id('template'); ?>" name="<?php echo $this->get_field_name('template'); ?>">
				<option value="0"><?php _e( '&mdash; Select &mdash;' ) ?></option>
		<?php
			foreach ( $templates as $file => $label ) {
				echo '<option value="' . $file . '"'
					. selected( $selected_template, $file, false )
					. '>'. esc_html( $label ) . '</option>';
			}
		?>
			</select>
		</p>
		<?php
	}
}

/*
 * Replace the default menus widget with our custom one
 */
function maera_mg_replace_menu_widget() {
	unregister_widget( 'WP_Nav_Menu_Widget' );
	register_widget( 'Maera_MG_Custom_Menu_Widget' );
}
add_action( 'widgets_init', 'maera_mg_replace_menu_widget' );
