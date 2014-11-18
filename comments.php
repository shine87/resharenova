<?php
if ( !empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die( 'Please do not load this page directly. Thanks!' );
}
if ( post_password_required() ) { ?>
	<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
<?php
	return;
} ?>

<?php if ( comments_open() ) { ?>
	<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="10" data-colorscheme="light"></div>
<?php } ?>


<div id="comments" class="comments-area">
	<?php if ( have_comments() ) { ?>
	<h3 class="comments-title"><?php printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number() ),
		number_format_i18n( get_comments_number() ), '&ldquo;' . get_the_title() . '&rdquo;' ) ?></h3>
	<nav class="nav-below">
		<div class="alignleft"><?php next_comments_link( '&larr; Newer Comments' ); ?></div>
		<div class="alignright"><?php previous_comments_link( 'Older Comments &rarr;' ); ?></div>
	</nav>
	<ol class="comment-list">
		<?php
		wp_list_comments( array(
			'style'			=>	'ol',
			'short_ping'	=>	true,
			'avatar_size'	=>	34,
		) );
		?>
	</ol>
	<?php if ( !comments_open() ) { ?>
	<p class="no-comments">Comments are closed.</p>
	<?php } ?>
	<?php } ?>
	<?php comment_form(); ?>
</div>