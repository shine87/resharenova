<?php

class rn_rand_posts extends WP_Widget {

	function __construct() {
		$widget_ops = array(
			'description'	=>	'Display Random Posts'
		);
		parent::__construct( false, 'RN Random Posts', $widget_ops );
	}

	function widget( $args, $instance ) {
		$rn_rand_query = new WP_Query(array(
			'orderby'			=>	'rand',
			'posts_per_page'	=>	10,
			'meta_key'			=>	'_thumbnail_id',
			'ignore_sticky_posts'	=>	true
		));
		if( $rn_rand_query->have_posts() ) {
			echo $args['before_widget'];
			echo $args['before_title'] . $instance['title'] . $args['after_title'];
?>
			<ul>
				<?php
				while( $rn_rand_query->have_posts() ) {
					$rn_rand_query->the_post();
					?>
					<li style="margin-bottom: 10px; text-align: center">
						<a href="<?php the_permalink(); ?>">
							<?php
							the_post_thumbnail( 'medium' );
							echo '<br>';
							echo the_title();
							?>
						</a>
					</li>
					<?php
				}
				?>
			</ul>
<?php
			echo $args['after_widget'];
		}
		wp_reset_postdata();
	}

	function form( $instance ) {
		
	}

	function update( $new_instance, $old_instance ) {

	}
}
add_action( 'widgets_init', 'rn_rand_posts' );
function rn_rand_posts() {
	register_widget( 'rn_rand_posts' );
}