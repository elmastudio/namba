<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package Namba
 * @since Namba 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php if ( has_post_format( 'Image' ) ) : ?>
			<div class="entry-format"><span><?php _e( 'Image', 'namba' ); ?></span></div>
		<?php elseif ( has_post_format( 'link' ) ) : ?>
			<div class="entry-format"><span><?php _e( 'Link', 'namba' ); ?></span></div>
		<?php elseif ( has_post_format( 'gallery' ) ) : ?>
			<div class="entry-format"><span><?php _e( 'Gallery', 'namba' ); ?></span></div>
		<?php elseif ( has_post_format( 'quote' ) ) : ?>
			<div class="entry-format"><span><?php _e( 'Quote', 'namba' ); ?></span></div>
		<?php elseif ( has_post_format( 'video' ) ) : ?>
			<div class="entry-format"><span><?php _e( 'Video', 'namba' ); ?></span></div>
		<?php elseif ( has_post_format( 'audio' ) ) : ?>
			<div class="entry-format"><span><?php _e( 'Audio', 'namba' ); ?></span></div>
		<?php elseif ( has_post_format( 'status' ) ) : ?>
			<div class="entry-format"><span><?php _e( 'Status', 'namba' ); ?></span></div>
		<?php else : ?>
			<div class="entry-format"><span><?php _e( 'Article', 'namba' ); ?></span></div>
		<?php endif; ?>

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
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!--end .entry-header -->

		<?php if ( '' != get_the_post_thumbnail() && ! post_password_required() &&  ! has_post_format('image') &&  ! has_post_format('gallery') &&  ! has_post_format('audio') &&  ! has_post_format('video') &&  ! has_post_format('quote') &&  ! has_post_format('link') &&  ! has_post_format('status') ) : ?>
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'namba' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_post_thumbnail(); ?></a>
			</div><!--end .entry-thumbnail -->
		<?php endif; ?>

	<div class="entry-content clearfix">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'namba' ), 'after' => '</div>' ) ); ?>
	</div><!-- end .entry-content -->

	<?php if ( get_the_author_meta( 'description' ) && ! get_post_format() ) : // If a user filled out their author bio, show it on standard posts ?>
		<div class="author-wrap">
			<div class="author-info">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'namba_author_bio_avatar_size', 100 ) ); ?>
				<h3><?php printf( __( 'Posted by %s', 'namba' ), "<a href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='author'>" . get_the_author() . "</a>" ); ?></h3>
				<p class="author-description"><?php the_author_meta( 'description' ); ?></p>
			</div><!-- end .author-info -->
		</div><!-- end .author-wrap -->
	<?php endif; ?>

	<footer class="entry-meta clearfix">
		<div class="entry-cats"><span><?php _e('Category', 'namba') ?></span><?php the_category(); ?></div>
		<?php $tags_list = get_the_tag_list();
		if ( $tags_list ): ?>
		<div class="entry-tags"><span><?php _e('Tags', 'namba') ?></span><?php the_tags('<ul><li>','</li><li>','</li></ul>'); ?></div>
		<?php endif; // get_the_tag_list() ?>
	</footer><!-- end .entry-meta -->

	<?php // Include Share-Btns
		$options = get_option('namba_theme_options');
		if($options['share-singleposts'] or $options['share-posts']) : ?>
		<?php get_template_part( 'share'); ?>
	<?php endif; ?>

</article><!-- end .post-<?php the_ID(); ?> -->
