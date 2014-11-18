<?php get_header(); ?>
	<div id="main-content">
		<div id="content">
<?php
	while( have_posts() ) {
		the_post();
?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2 class="entry-title"><?php the_title(); ?></h2>
				<div class="sh-btn" id="fb-sh-btn" data-permalink="<?php the_permalink(); ?>">Share to facebook</div>
				<div class="entry-content">
					<?php the_content(); ?>
					<?php wp_link_pages(); ?>
				</div>
					<?php the_tags( '<div class="entry-meta"><span>Tagged as: ', ', ', '</span></div>' ); ?>
			</article>
<?php
	}
?>
			<nav id="page-nav-below" class="nav-below">
				<div id="post-nav-next" class="alignleft"><?php next_post_link( '&laquo; %link' ); ?></div>
				<div id="post-nav-prev" class="alignright"><?php previous_post_link( '%link &raquo;' ); ?></div>
			</nav>
			<?php comments_template(); ?>
		</div>
		<?php get_sidebar(); ?>
	</div><!-- #main-content -->
<?php get_footer(); ?>