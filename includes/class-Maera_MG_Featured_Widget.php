<?php

class Maera_MG_Featured_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'maera_mg_featured_articles',
			__( 'Maera Magazine Featured Articles', 'maera_mg' ),
			array(
				'classname'   => 'widget_maera_mg_featured',
				'description' => __( 'Featured posts module' )
			)
		);
	}

	public function widget( $args, $instance ) {

		extract( $args );
		$context = Maera()->views->context();

		$context['widget'] = array(
			'title'          => apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base ),
			'category'       => $instance['term'],
			'per_page'       => $instance['per_page'],
			'offset'         => $instance['offset'],
			'excerpt_length' => $instance['excerpt_length'],
			'more_text'      => $instance['more_text'],
			'before_widget'  => $before_widget,
			'after_widget'   => $after_widget,
			'before_title'   => $before_title,
			'after_title'    => $after_title,
		);

		switch ( $instance['mode'] ) {
			case 'fpm_grid_5' :
				$per_page = 5;
				break;
			case 'fpm_single_big' :
				$per_page = 1;
				break;
			case 'normal_1_4_hor' :
				$per_page = 5;
				break;
			case 'normal_1_2_ver' :
				$per_page = 3;
				break;
		}

		$context['post']   = Timber::query_post();
		$context['posts']  = Timber::get_posts( array(
			'post_type'        => $instance['post_type'],
			'tax_query'        => ( 'any' != $instance['term'] ) ? array( array( 'taxonomy' => 'category', 'terms' => $instance['term'] ) ) : '',
			'posts_per_page'   => $per_page,
			'offset'           => $instance['offset'],
		));

		Maera()->views->render( 'modules/' . $instance['mode'] . '.twig', $context );

	}

	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		/* Strip terms (if needed) and update the widget settings. */
		$instance['title']           = strip_tags( $new_instance['title'] );
		$instance['mode']            = strip_tags( $new_instance['mode'] );
		$instance['term']            = strip_tags( $new_instance['term'] );
		$instance['offset']          = strip_tags( $new_instance['offset'] );
		$instance['more_text']       = strip_tags( $new_instance['more_text'] );

		return $instance;

	}

	public function form( $instance ) {

		$defaults = array(
			'title'           => 'Latest Articles',
			'term'            => 'any',
			'offset'          => 0,
			'excerpt_length'  => 20,
			'more_text'       => __( 'Read More', 'maera_mg' ),
		);

		$modes = array(
			'fpm_grid_5'     => __( 'BIG - 5-post grid', 'maera_mg' ),
			'fpm_single_big' => __( 'BIG - Single Post', 'maera_mg' ),
			'normal_1_4_hor' => __( 'NORMAL - Horizontal - 1 big, 4 smaller', 'maera_mg' ),
			'normal_1_2_ver' => __( 'NORMAL - Vertical - 1 big, 2 smaller', 'maera_mg' ),
		);

		$instance = wp_parse_args( ( array ) $instance, $defaults );

		$title = strip_tags( $instance['title'] ); ?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<table style="margin-top: 10px;">
			<tr style="margin: 10px 0;">
				<td><?php _e( 'Mode:','maera_mg' ); ?></td>
				<td>
					<?php foreach ( $modes as $mode => $label ) : ?>
						<input class="radio" type="radio" <?php if ( $instance['mode'] == $mode ) { ?>checked <?php } ?>name="<?php echo $this->get_field_name( 'mode' ); ?>" value="<?php echo $mode; ?>" id="<?php echo $this->get_field_id( 'mode' ); ?>_<?php echo $mode; ?>" />
						<?php echo $label; ?>
						<br />
					<?php endforeach; ?>
				</td>
			</tr>
			<tr>
				<td><?php _e( 'Category:','maera_mg' ); ?></td>
				<td>
					<select name="<?php echo $this->get_field_name( 'term' ); ?>">
						<?php $selected = ( $instance['term'] == 'any' ) ? 'selected' : ''; ?>
						<option <?php echo $selected; ?> value="any"><?php _e( 'Any Category', 'maera_mg' ); ?></option>
						<?php $terms_args = array( 'orderby' => 'name', 'order' => 'ASC', 'hide_empty' => 1 ); ?>
						<?php $terms = get_terms( 'category', $terms_args ); ?>
						<?php foreach ( $terms as $term ) : ?>
							<?php $selected = ( $instance['term'] == $term->term_id ) ? 'selected' : ''; ?>
							<option <?php echo $selected; ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>

			<tr>
				<td><?php _e( 'Offset','maera_mg' ); ?></td>
				<td><input id="<?php echo $this->get_field_id( 'per_page' ); ?>" name="<?php echo $this->get_field_name( 'offset' ); ?>" value="<?php echo $instance['offset']; ?>" type="number" /></td>
			</tr>

			<tr>
				<td><?php _e( 'Read More text:','maera_mg' ); ?></td>
				<td><input id="<?php echo $this->get_field_id( 'more_text' ); ?>" name="<?php echo $this->get_field_name( 'more_text' ); ?>" value="<?php echo $instance['more_text']; ?>" class="widefat" type="text" /></td>
			</tr>
		</table>
		<?php
	}
}


/**
* Register the widget.
*/
function maera_mg_featured_articles_widget() {
	register_widget( 'Maera_MG_Featured_Widget' );
}
add_action( 'widgets_init', 'maera_mg_featured_articles_widget' );
