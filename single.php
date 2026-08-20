<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Namba
 * @since Namba 1.0
 */

get_header(); ?>

		<div id="primary" class="site-content" role="main">

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php comments_template( '', true ); ?>

		<?php endwhile; // end of the loop. ?>

		</div><!-- end #primary -->

		<nav id="nav-single" class="clearfix">
			<div class="nav-next"><?php next_post_link( '%link', __( '<span>Next Post  &raquo;</span>', 'namba' ) ); ?></div>
			<div class="nav-previous"><?php previous_post_link( '%link', __( '<span>&laquo; Previous Post</span>', 'namba' ) ); ?></div>
		</nav><!-- #nav-single -->


<?php get_footer(); ?>