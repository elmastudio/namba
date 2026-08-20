<?php
/**
 * The template for displaying Archive pages.
 *
 * @package Namba
 * @since Namba 1.0
 */

get_header(); ?>

		<?php if ( have_posts() ) : ?>

			<header class="archive-header">
				<h2 class="archive-title">
					<?php
							if ( is_category() ) :
								printf( __( 'All Posts Filed in &lsquo;%s&rsquo;', 'namba' ), '<span>' . single_cat_title( '', false ) . '</span>' );

							elseif ( is_tag() ) :
								printf( __( 'All Posts Tagged &lsquo;%s&rsquo;', 'namba' ), '<span>' . single_tag_title( '', false ) . '</span>' );

							elseif ( is_author() ) :
								/* Queue the first post, that way we know
								 * what author we're dealing with (if that is the case).
								*/
								the_post();
								printf( __( 'All Posts by &lsquo;%s&rsquo;', 'namba' ), '<span class="vcard">' . get_the_author() . '</span>' );
								/* Since we called the_post() above, we need to
								 * rewind the loop back to the beginning that way
								 * we can run the loop properly, in full.
								 */
								rewind_posts();

							elseif ( is_day() ) :
								printf( __( 'Daily Archives of: %s', 'namba' ), '<span>' . get_the_date() . '</span>' );

							elseif ( is_month() ) :
								printf( __( 'Monthly Archives of: %s', 'namba' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

							elseif ( is_year() ) :
								printf( __( 'Yearly Archives of: %s', 'namba' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

							elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
								_e( 'All Gallery Posts', 'namba' );

							elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
								_e( 'All Image Posts', 'namba');

							elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
								_e( 'All Video Posts', 'namba' );

							elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
								_e( 'All Quote Posts', 'namba' );

							elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
								_e( 'All Status Posts', 'namba' );

							elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
								_e( 'All Link Posts', 'namba' );

							elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
								_e( 'All Audio Posts', 'namba' );

							else :
								_e( 'Archives', 'namba' );

							endif;
						?>
				</h2>
				<?php
						if ( is_category() ) {
							// show an optional category description
							$category_description = category_description();
							if ( ! empty( $category_description ) )
								echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

						} elseif ( is_tag() ) {
							// show an optional tag description
							$tag_description = tag_description();
							if ( ! empty( $tag_description ) )
								echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
						}
					?>
			</header><!-- end .archive-header -->

			<div id="primary" class="site-content" role="main">
			<div class="border-center"></div>


			<?php rewind_posts(); ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; // end of the loop. ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'namba' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'namba' ); ?></p>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

		</div><!-- end #primary -->

		<?php /* Display navigation to next/previous pages when applicable, also check if WP pagenavi plugin is activated */ ?>
			<?php if(function_exists('wp_pagenavi')) : wp_pagenavi(); else: ?>
				<?php namba_content_nav( 'nav-below' ); ?>
			<?php endif; ?>

<?php get_footer(); ?>