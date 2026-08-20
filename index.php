<?php
/**
 * The main template file.
 *
 * @package Namba
 * @since Namba 1.0
 */

get_header(); ?>

		<div id="primary" class="site-content" role="main">
			<span class="border-center"></span>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- end #primary -->

			<?php /* Display navigation to next/previous pages when applicable, also check if WP pagenavi plugin is activated */ ?>
			<?php if(function_exists('wp_pagenavi')) : wp_pagenavi(); else: ?>
				<?php namba_content_nav( 'nav-below' ); ?>
			<?php endif; ?>

<?php get_footer(); ?>