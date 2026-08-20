<?php
/**
 * The template for displaying 404 error pages.
 *
 * @package Namba
 * @since Namba 1.0
 */

get_header(); ?>

		<div id="primary" class="site-content" role="main">

			<article id="post-0" class="page no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'namba' ); ?></h1>
				</header><!--end .entry-header -->

				<div class="entry-content clearfix">
					<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help!', 'namba' ); ?></p>
				</div><!-- end .entry-content -->
			</article><!-- end #post-0 -->

		</div><!-- end #primary -->

<?php get_footer(); ?>