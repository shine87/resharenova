	<div class="clear"></div>
	<footer id="main-footer">
		<nav id="footer-menu">
			<?php wp_nav_menu( 'theme_location=footer&container_class=footer-menu&menu_class=ul-menu&fallback_cb=main_menu' ); ?>
		</nav>
		<div id="footer-credits">
			<p><?php echo get_bloginfo( 'name' ) ." | " . get_bloginfo( 'description' ); ?></p>
		</div>
	</footer><!-- #main-footer -->
	<i class="scroll-up fa fa-chevron-circle-up fa-2x"></i>
</div><!-- #main-wrapper -->
<?php wp_footer(); ?>
</body>
</html>