<?php get_header(); ?>
	<div id="main-content">
		<div id="content">

			<div id="no-entry">
				<h2>Oops!, something went wrong</h2>
				<p>Check out the list below, maybe you will find something interesting.</p>
			</div>

			<div id="er-content">
			<?php
			$the_query	=	new WP_Query( array(
				'orderby'				=>	'rand',
				'posts_per_page'		=>	25,
				'ignore_sticky_posts'	=>	1
			) );
			if ( $the_query->have_posts() ) {
				?>
				<ul>
					<?php
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						the_title('<li><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">', '</a></li>');
					}
					?>
				</ul>
			<?php
			}
			wp_reset_postdata();
			?>
			</div>

		</div>
		<?php get_sidebar(); ?>
	</div><!-- #main-content -->
<?php get_footer(); ?>