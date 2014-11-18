<?php get_header(); ?>
	<div id="main-content">
		<div id="content">
<?php
if( have_posts() ) {
	while( have_posts() ) {
		the_post();
?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<figure class="entry-thumbnail">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'main-video-thumb' ); ?></a>
				</figure>
				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div>
			</article>
<?php
	}
} else {
?>
			<div id="no-entry">
				<h2>Nothing Found!</h2>
			</div>
<?php
}
?>
			<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if( $total_pages > 1 ) { ?>
				<nav id="page-nav-below" class="nav-below">
					<div id="page-nav-next" class="alignleft"><?php previous_posts_link( '<span class="meta-nav">&larr;</span> Newer posts' ); ?></div>
					<div id="page-nav-prev" class="alignright"><?php next_posts_link( 'Older posts <span class="meta-nav">&rarr;</span>' ); ?></div>
				</nav>
			<?php } ?>
		</div>
		<?php get_sidebar(); ?>
	</div><!-- #main-content -->
<?php get_footer(); ?>