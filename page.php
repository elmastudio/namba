<?php
/**
 * The template for displaying standard pages with sidebar.
 *
 * @package Namba
 * @since Namba 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content" role="main">

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'page' ); ?>

			<?php comments_template( '', true ); ?>

		<?php endwhile; // end of the loop. ?>

	</div><!-- end #primary -->

<?php get_footer(); ?>