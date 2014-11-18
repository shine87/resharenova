<?php

if ( ! isset( $content_width ) ) { $content_width = 730; }

//Theme title support
function resharenova_wp_title( $title, $sep ) {
	global $paged, $page;

	if( is_feed() ) {
		return $title;
	}

	$title .=get_bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	if( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( 'Page %s', max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'resharenova_wp_title', 10, 2 );

//Theme scripts and styles
function resharenova_scripts() {
	wp_enqueue_style( 'resharenova-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );
	wp_enqueue_script( 'latestjquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js' );
	wp_enqueue_script( 'html5', get_template_directory_uri(). '/js/html5shiv.js' );
	wp_enqueue_script( 'fitvids', get_template_directory_uri(). '/js/fitvids.js' );
	wp_enqueue_script( 'custom', get_template_directory_uri(). '/js/custom.js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'resharenova_scripts' );

//Registering navigation menus
register_nav_menus( array(
	'primary'	=>	'Main Menu',
	'footer'	=>	'Footer Menu'
) );
function main_menu() {
	wp_page_menu( 'show_home=1' );
}

//Adding theme supports
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-background' );
add_theme_support( 'post-thumbnails' );
add_image_size( 'main-video-thumb', 628, 235, true );
add_theme_support( 'html5', array(
	'search-form', 'comment-form', 'comment-list',
) );

// Adding Custom  excerpt $more and excerpt length.
function new_excerpt_more( $more ) {
	$more = ' <div class="readmore"><a href="'.get_permalink().'">Read More &raquo;</a></div>';
	return $more;
}
add_filter('excerpt_more', 'new_excerpt_more');
function custom_excerpt_length( $length ) {
	return 70;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

//Registering sidebars
function sidebar_gadgets() {
	register_sidebar( array(
		'name'			=>	'Right Sidebar 1',
		'id'			=>	'right-sidebar-gadget-1',
		'description'	=>	'Right Sidebar Gadgets',
		'before_widget'	=>	'<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=>	'</aside>',
		'before_title'	=>	'<h3 class="widget-title">',
		'after_title'	=>	'</h3>'
	) );
	register_sidebar( array(
		'name'			=>	'Right Sidebar 2',
		'id'			=>	'right-sidebar-gadget-2',
		'description'	=>	'Right Sidebar Gadgets',
		'before_widget'	=>	'<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=>	'</aside>',
		'before_title'	=>	'<h3 class="widget-title">',
		'after_title'	=>	'</h3>'
	) );
	register_sidebar( array(
		'name'			=>	'Right Sidebar 3',
		'id'			=>	'right-sidebar-gadget-3',
		'description'	=>	'Right Sidebar Gadgets',
		'before_widget'	=>	'<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=>	'</aside>',
		'before_title'	=>	'<h3 class="widget-title">',
		'after_title'	=>	'</h3>'
	) );
}
add_action( 'widgets_init', 'sidebar_gadgets' );

//Including random post widget
include 'inc/random_posts_widget.php';

//Facebook SDK
function fbsdk() {
?>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=754916011220645&version=v2.0";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
<?php
}
add_action( 'wp_footer', 'fbsdk' );


