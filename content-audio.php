<?php
/**
 * The template for displaying posts in the Audio post format
 *
 * @package Namba
 * @since Namba 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( is_search() && ! get_post_format() ) : // Only display excerpts for archives and search. ?>
		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div><!-- end .entry-content -->

	<?php else : ?>

	<div class="entry-content clearfix">
		<?php // Show Excerpt via Theme Options
			$options = get_option('namba_theme_options');
			if( ! empty( $options['show-excerpt'] ) && ! get_post_format() ) : ?>
				<?php the_excerpt(); ?>
		<?php else : ?>
				<?php the_content(); ?>
		<?php endif; ?>
	</div><!-- end .entry-content -->

	<div class="entry-meta">
		<a href="<?php the_permalink(); ?>" class="entry-format"><span><?php _e( 'Audio', 'namba' ); ?></span></a>
		<div class="entry-details">
			<div class="entry-date">
				<a href="<?php the_permalink(); ?>" class="entry-date"><?php echo get_the_date(); ?></a>
			</div><!-- end .entry-date -->
			<?php if ( comments_open() ) : ?>
				<div class="entry-comments">
				<?php comments_popup_link( '<span class="leave-reply">' . __( '0 comment', 'namba' ) . '</span>', __( '1 comment', 'namba' ), __( '% comments', 'namba' ) ); ?>
				</div><!-- end .entry-comments -->
			<?php endif; // comments_open() ?>
			<div class="entry-author">
				<?php
					printf( __( '<a href="%1$s" title="%2$s">by %3$s</a>', 'namba' ),
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					sprintf( esc_attr__( 'All posts by %s', 'namba' ), get_the_author() ),
					get_the_author() );
				?>
				</div><!-- end .entry-author -->
				<?php edit_post_link( __( 'Edit', 'namba' ), '<div class="entry-edit">', '</div>' ); ?>
		</div><!--end .entry-details -->
	</div><!--end .entry-meta -->

	<?php // Include Share-Btns
		if( ! empty( $options['share-posts'] ) ) : ?>
		<?php get_template_part( 'share'); ?>
	<?php endif; ?>

	<?php endif; ?>

</article><!-- end post -<?php the_ID(); ?> -->