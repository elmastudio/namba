<?php
/**
 * The template for displaying search results.
 *
 * @package Namba
 * @since Namba 1.0
 */

get_header(); ?>

		<div id="primary-search" class="site-content">

		<?php if ( have_posts() ) : ?>
		<header class="archive-header">
			<h2 class="archive-title"><?php echo $wp_query->found_posts; ?> <?php printf( __( 'Search Results for &lsquo;%s&rsquo;', 'namba' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
		</header><!--end .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php	get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- end #primary -->

		<?php /* Display navigation to next/previous pages when applicable, also check if WP pagenavi plugin is activated */ ?>
		<?php if(function_exists('wp_pagenavi')) : wp_pagenavi(); else: ?>
			<?php namba_content_nav( 'nav-below' ); ?>
		<?php endif; ?>

		<?php else : ?>

		<article id="post-0" class="page no-results not-found">
			<header class="entry-header">
				<h1 class="entry-title"><?php _e( 'Nothing Found', 'namba' ); ?></h1>
			</header><!--end .entry-header -->
			<div class="entry-content">
				<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again!', 'namba' ); ?></p>
			<?php get_search_form(); ?>
			</div><!-- end .entry-content -->
		</article>

		<?php endif; ?>

<?php get_footer(); ?>