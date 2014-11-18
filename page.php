<?php get_header(); ?>
	<div id="main-content">
		<div id="content">
<?php
while( have_posts() ) {
	the_post();
?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
<?php
}
?>
		</div>
		<?php get_sidebar(); ?>
	</div><!-- #main-content -->
<?php get_footer(); ?>