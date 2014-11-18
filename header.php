<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="main-wrapper">
	<header id="main-header">
		<div id="top-header">
			<div id="head-left">
				<h1 id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			</div>
			<div id="head-right">
			</div>
		</div>
		<nav id="main-menu">
			<?php wp_nav_menu( 'theme_location=primary&container_class=menu&menu_class=ul-menu&fallback_cb=main_menu' ); ?>
		</nav>
	</header><!-- #main-header -->
	<div class="clear"></div>
