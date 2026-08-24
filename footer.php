 <?php
/**
 * The template for displaying the footer.
 *
 * @package Namba
 * @since Namba 1.0
 */
?>

	<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
		<div class="sidebar-bottom">
			<div class="widget-area">
				<?php dynamic_sidebar( 'sidebar-3' ); ?>
			</div><!-- .widget-area -->
		</div><!-- .sidebar-bottom -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
		<div class="sidebar-recentposts"><span class="border-center"></span>
			<div class="widget-area">
				<?php dynamic_sidebar( 'sidebar-4' ); ?>
			</div><!-- .widget-area -->
		</div><!-- .sidebar-recentposts -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
		<div class="sidebar-footer">
			<div class="widget-area">
				<?php dynamic_sidebar( 'sidebar-5' ); ?>
			</div><!-- .widget-area -->
		</div><!-- .sidebar-footer -->
	<?php endif; ?>

	<footer id="colophon" class="site-footer clearfix" role="contentinfo">

		<div id="site-info">
			<div class="credit-wrap">
			<?php
				$options = get_option('namba_theme_options');
				if ( ! empty( $options['custom_footertext'] ) ){
					echo ('<p class="credittext">');
					echo stripslashes($options['custom_footertext']);
					echo ('</p>');
			} else { ?>
			<ul class="credit">
				<li class="copyright">&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url( '/' ); ?>"><?php bloginfo(); ?></a></li>
				<?php
					/* Include Privacy Policy link. */
					if ( function_exists( 'the_privacy_policy_link' ) ) {
					the_privacy_policy_link( '<li>', '</li>', 'namba');
					}
				?>
				<li class="wp-credit"><?php _e('Proudly powered by', 'namba') ?> <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'namba' ) ); ?>" ><?php _e('WordPress.', 'namba') ?></a></li>
				<li><?php printf( __( 'Theme: %1$s by %2$s', 'namba' ), 'Namba', '<a href="https://www.elmastudio.de/en/" title="Elmastudio WordPress Themes">Elmastudio</a>' ); ?></li>
			</ul><!-- end .credit -->
			<?php } ?>
			<?php if (has_nav_menu( 'optional' ) ) {
				wp_nav_menu( array('theme_location' => 'optional', 'container' => 'nav' , 'container_class' => 'footer-nav', 'depth' => 1 ));}
			?>
			</div><!-- end .credit-wrap -->
		</div><!-- end #site-info -->

	</footer><!-- end #colophon -->
	</div><!-- end #main-wrap -->
</div><!-- end #container -->

<?php // Includes Twitter and Google+ button code if the share post option is active.
	$options = get_option('namba_theme_options');
	if ( ! empty( $options['share-singleposts'] ) || ! empty( $options['share-posts'] ) ) : ?>
	<script type="text/javascript" src="https://platform.twitter.com/widgets.js"></script>
	<script type="text/javascript">
	(function() {
		var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
		po.src = 'https://apis.google.com/js/plusone.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	})();
	</script>

	<script type="text/javascript">
(function() {
		window.PinIt = window.PinIt || { loaded:false };
		if (window.PinIt.loaded) return;
		window.PinIt.loaded = true;
		function async_load(){
				var s = document.createElement("script");
				s.type = "text/javascript";
				s.async = true;
				s.src = "https://assets.pinterest.com/js/pinit.js";
				var x = document.getElementsByTagName("script")[0];
				x.parentNode.insertBefore(s, x);
		}
		if (window.attachEvent)
				window.attachEvent("onload", async_load);
		else
				window.addEventListener("load", async_load, false);
})();
</script>

<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
