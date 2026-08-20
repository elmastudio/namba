<?php
/**
 * Namba functions and definitions
 *
 * @package Namba
 * @since Namba 1.0
 */

 /*-----------------------------------------------------------------------------------*/
/* Sets up the content width value based on the theme's design.
/*-----------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) )
	$content_width = 900;

/*-----------------------------------------------------------------------------------*/
/* Sets up theme defaults and registers support for various WordPress features.
/*-----------------------------------------------------------------------------------*/

function namba_setup() {

	// Make Namba available for translation. Translations can be added to the /languages/ directory.
	load_theme_textdomain( 'namba', get_template_directory() . '/languages' );

	// Remove support form block widget screens.
	remove_theme_support( 'widgets-block-editor' );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	// Add support for editor font sizes.
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => __( 'small', 'namba' ),
			'shortName' => __( 'S', 'namba' ),
			'size' => 16,
			'slug' => 'small'
		),
		array(
			'name' => __( 'regular', 'namba' ),
			'shortName' => __( 'M', 'namba' ),
			'size' => 19,
			'slug' => 'regular'
		),
		array(
			'name' => __( 'large', 'namba' ),
			'shortName' => __( 'L', 'namba' ),
			'size' => 22,
			'slug' => 'large'
		),
		array(
			'name' => __( 'larger', 'namba' ),
			'shortName' => __( 'XL', 'namba' ),
			'size' => 25,
			'slug' => 'larger'
		)
	) );

	// Add editor color palette.
	add_theme_support( 'editor-color-palette', array(
		array(
			'name' => __( 'black', 'namba' ),
			'slug' => 'black',
			'color' => '#000000',
		),
		array(
			'name' => __( 'white', 'namba' ),
			'slug' => 'white',
			'color' => '#ffffff',
		),
		array(
			'name' => __( 'light grey', 'namba' ),
			'slug' => 'light-grey',
			'color' => '#f4f4f4',
		),
		array(
			'name' => __( 'light yellow', 'namba' ),
			'slug' => 'light-yellow',
			'color' => '#ffffcc',
		),
		array(
			'name' => __( 'light red', 'namba' ),
			'slug' => 'light-red',
			'color' => '#fff0f1',
		),
		array(
			'name' => __( 'light green', 'namba' ),
			'slug' => 'light-green',
			'color' => '#e7f3e0',
		),
		array(
			'name' => __( 'light blue', 'namba' ),
			'slug' => 'light-blue',
			'color' => '#eef6fe',
		),
		array(
		'name' => __( 'blue', 'namba' ),
		'slug' => 'blue',
		'color' => '#54a8d0',
		),
	) );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'editor-style.css' ) );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Load up the Namba theme options page and related code.
	require( get_template_directory() . '/inc/theme-options.php' );

	// Grab the Namba Custom widgets.
	require( get_template_directory() . '/inc/widgets.php' );

	// This theme supports all available post formats by default.
	add_theme_support( 'post-formats', array (
		'audio', 'gallery', 'image', 'link', 'quote', 'video', 'status'
	) );

	// This theme uses wp_nav_menu().
	register_nav_menus( array (
		'primary' => __( 'Primary Navigation', 'namba' ),
		'optional' => __( 'Footer Navigation (no sub menus supported)', 'namba' )
	) );

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

}
add_action( 'after_setup_theme', 'namba_setup' );


/*-----------------------------------------------------------------------------------*/
/*  Returns the Google font stylesheet URL if available.
/*-----------------------------------------------------------------------------------*/

function namba_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Cabin translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$cabin = _x( 'on', 'Cabin font: on or off', 'namba' );

	$satisfy = _x( 'on', 'Satisfy font: on or off', 'namba' );

	if ( 'off' !== $cabin || 'off' !== $satisfy ) {

		$font_families = array();

		if ( 'off' !== $cabin )
			$font_families[] = 'Cabin:400,700';

		if ( 'off' !== $satisfy )
			$font_families[] = 'Satisfy';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;
}


/*-----------------------------------------------------------------------------------*/
/*  Enqueue scripts and styles
/*-----------------------------------------------------------------------------------*/

function namba_scripts() {
	global $wp_styles;

	// Loads JavaScript to pages with the comment form to support sites with threaded comments (when in use)
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );

	// Loads JavaScript for Masonry
	wp_enqueue_script( 'namba-masonry', get_template_directory_uri() . '/js/jquery.masonry.min.js', array( 'jquery' ), '2.1.08' );

	// Adds JavaScript ImagesLoaded
	wp_enqueue_script( 'namba-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.js', array( 'jquery' ), '3.0.2' );

	// Loads Custom Namba JavaScript functionality
	wp_enqueue_script( 'namba-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '2013-10-15' );

	// Add Google Webfonts
	wp_enqueue_style( 'namba-fonts', namba_fonts_url(), array(), null );

	// Loads main stylesheet.
	wp_enqueue_style( 'namba-style', get_stylesheet_uri(), array(), '2013-10-15' );

}
add_action( 'wp_enqueue_scripts', 'namba_scripts' );

/*-----------------------------------------------------------------------------------*/
/* Load block editor styles.
/*-----------------------------------------------------------------------------------*/
function namba_block_editor_styles() {
 wp_enqueue_style( 'namba-block-editor-styles', get_template_directory_uri() . '/block-editor.css');
 wp_enqueue_style( 'namba-fonts', namba_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'namba_block_editor_styles' );

/*-----------------------------------------------------------------------------------*/
/* Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
/*-----------------------------------------------------------------------------------*/
add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
function add_menu_parent_class( $items ) {

	$parents = array();
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}

	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
			$item->classes[] = 'menu-parent-item';
		}
	}

	return $items;
}

/*-----------------------------------------------------------------------------------*/
/* Sets the post excerpt length to 15 characters.
/*-----------------------------------------------------------------------------------*/
function namba_excerpt_length( $length ) {
	return 15;
}
add_filter( 'excerpt_length', 'namba_excerpt_length' );


/*-----------------------------------------------------------------------------------*/
/* Returns a "Continue Reading" link for excerpts
/*-----------------------------------------------------------------------------------*/
function namba_more_link($more_link, $more_link_text) {
	return '<a href="'. get_permalink() . '" class="more-link">' . __( '&#91;Read more&#93;', 'namba' ) . '</a>';
}
add_filter('the_content_more_link', 'namba_more_link', 10, 2);


function namba_continue_reading_link() {
	return '<span>' . __( '&#91;...&#93;', 'namba' ) . '</span>';
}

/*-----------------------------------------------------------------------------------*/
/* Adds a pretty "Continue Reading" link to custom post excerpts.
/*
/* To override this link in a child theme, remove the filter and add your own
/* function tied to the get_the_excerpt filter hook.
/*-----------------------------------------------------------------------------------*/
function namba_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= namba_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'namba_custom_excerpt_more' );


/*-----------------------------------------------------------------------------------*/
/* Remove inline styles printed when the gallery shortcode is used.
/*-----------------------------------------------------------------------------------*/
function namba_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'namba_remove_gallery_css' );


/**
 * Callback to change just html output on a comment.
 */
function namba_comments_callback($comment, $args, $depth){
	//checks if were using a div or ol|ul for our output
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
	?>
	<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $args['has_children'] ? 'parent' : '', $comment ); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-avatar">
				<?php echo get_avatar( $comment, 115 ); ?>
			</div>
			<div class="comment-content">
				<ul class="comment-meta">
					<?php
						if (function_exists('gtcn_comment_numbering')) echo gtcn_comment_numbering($comment->comment_ID, $args);
					?>
					<li class="comment-author"><?php printf( __( ' %s ', 'namba' ), sprintf( ' %s ', get_comment_author_link() ) ); ?></li>
					<li class="comment-time"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
					<?php
						/* translators: 1: date */
						printf( __( '%1$s', 'namba' ),
						get_comment_date('d. F Y'));
					?></a></li>
					<li class="comment-edit"><?php edit_comment_link( __( 'Edit', 'namba' ));?></li>
				</ul>
				<div class="comment-text">
					<?php comment_text(); ?>
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'namba' ); ?></p>
					<?php endif; ?>
					<p class="comment-reply"><?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'namba' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></p>
				</div><!-- end .comment-text -->
			</div><!-- end .comment-content -->
		</article><!-- end .comment -->
	<?php
}

/*-----------------------------------------------------------------------------------*/
/* Register widgetized areas
/*-----------------------------------------------------------------------------------*/
function namba_widgets_init() {

	register_sidebar( array (
		'name' => __( 'Main Widget Area', 'namba' ),
		'id' => 'sidebar-1',
		'description' => __( 'Widgets will appear in the left sidebar below the main navigation.', 'namba' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => __( 'Top Widget Area', 'namba' ),
		'id' => 'sidebar-2',
		'description' => __( 'Widget area for the social links at the top of the main content area.', 'namba' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => __( 'Below Main Content Widget Area', 'namba' ),
		'id' => 'sidebar-3',
		'description' => __( 'Widgets in this widget area will appear in a single-column below the main content area.', 'namba' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => __( 'Posts by Category Widget Area', 'namba' ),
		'id' => 'sidebar-4',
		'description' => __( 'Widget area to include 2, 4, 6 oder more Recent Posts by Category widgets below the main content area. The widgets will appear in a 2-column grid and can also include the Namba Headlines widget to give the Recent Posts widget a bigger headline.', 'namba' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => __( 'Above Footer Widget Area', 'namba' ),
		'id' => 'sidebar-5',
		'description' => __( 'Widgets will appear in a single-column above the footer area.', 'namba' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}
add_action( 'widgets_init', 'namba_widgets_init' );

if ( ! function_exists( 'namba_content_nav' ) ) :

/*-----------------------------------------------------------------------------------*/
/* Display navigation to next/previous pages when applicable
/*-----------------------------------------------------------------------------------*/
function namba_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>" class="clearfix">
				<div class="nav-previous"><?php next_posts_link( __( '<span>&laquo; Older Posts</span>', 'namba'  ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( __( '<span>Newer Posts &raquo;</span>', 'namba' ) ); ?></div>
			</nav><!-- end #nav-below -->
	<?php endif;
}

endif; // namba_content_nav


/*-----------------------------------------------------------------------------------*/
/* Extends the default WordPress body classes
/*-----------------------------------------------------------------------------------*/
function namba_body_class( $classes ) {

	if ( is_page_template( 'page-archive.php' ) )
		$classes[] = 'template-archive';

	return $classes;
}
add_filter( 'body_class', 'namba_body_class' );

/*-----------------------------------------------------------------------------------*/
/* Add One Click Demo Import code.
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/demo-installer.php';

/*-----------------------------------------------------------------------------------*/
/* Namba Shortcodes
/*-----------------------------------------------------------------------------------*/
// Enable shortcodes in widget areas
add_filter( 'widget_text', 'do_shortcode' );

// Replace WP autop formatting
if (!function_exists( "namba_remove_wpautop")) {
	function namba_remove_wpautop($content) {
		$content = do_shortcode( shortcode_unautop( $content ) );
		$content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content);
		return $content;
	}
}

/*-----------------------------------------------------------------------------------*/
/* Multi Columns Shortcodes
/* Don't forget to add "_last" behind the shortcode if it is the last column.
/*-----------------------------------------------------------------------------------*/
// Two Columns
function namba_shortcode_two_columns_one( $atts, $content = null ) {
	 return '<div class="two-columns-one">' . namba_remove_wpautop($content) . '</div>';
}
add_shortcode( 'two_columns_one', 'namba_shortcode_two_columns_one' );

function namba_shortcode_two_columns_one_last( $atts, $content = null ) {
	 return '<div class="two-columns-one last">' . namba_remove_wpautop($content) . '</div>';
}
add_shortcode( 'two_columns_one_last', 'namba_shortcode_two_columns_one_last' );

// Three Columns
function namba_shortcode_three_columns_one($atts, $content = null) {
	 return '<div class="three-columns-one">' . namba_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_one', 'namba_shortcode_three_columns_one' );

function namba_shortcode_three_columns_one_last($atts, $content = null) {
	 return '<div class="three-columns-one last">' . namba_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_one_last', 'namba_shortcode_three_columns_one_last' );

function namba_shortcode_three_columns_two($atts, $content = null) {
	 return '<div class="three-columns-two">' . namba_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_two', 'namba_shortcode_three_columns_two' );

function namba_shortcode_three_columns_two_last($atts, $content = null) {
	 return '<div class="three-columns-two last">' . namba_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_two_last', 'namba_shortcode_three_columns_two_last' );

// Four Columns
function namba_shortcode_four_columns_one($atts, $content = null) {
	 return '<div class="four-columns-one">' . namba_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_one', 'namba_shortcode_four_columns_one' );

function namba_shortcode_four_columns_one_last($atts, $content = null) {
	 return '<div class="four-columns-one last">' . namba_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_one_last', 'namba_shortcode_four_columns_one_last' );

function namba_shortcode_four_columns_two($atts, $content = null) {
	 return '<div class="four-columns-two">' . namba_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_two', 'namba_shortcode_four_columns_two' );

function namba_shortcode_four_columns_two_last($atts, $content = null) {
	 return '<div class="four-columns-two last">' . namba_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_two_last', 'namba_shortcode_four_columns_two_last' );

function namba_shortcode_four_columns_three($atts, $content = null) {
	 return '<div class="four-columns-three">' . namba_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_three', 'namba_shortcode_four_columns_three' );

function namba_shortcode_four_columns_three_last($atts, $content = null) {
	 return '<div class="four-columns-three last">' . namba_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_three_last', 'namba_shortcode_four_columns_three_last' );

// Divide Text Shortcode
function namba_shortcode_divider($atts, $content = null) {
	 return '<div class="divider"></div>';
}
add_shortcode( 'divider', 'namba_shortcode_divider' );

/*-----------------------------------------------------------------------------------*/
/* Text Highlight and Info Boxes Shortcodes
/*-----------------------------------------------------------------------------------*/
function namba_shortcode_white_box($atts, $content = null) {
	 return '<div class="white-box">' . do_shortcode( namba_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'white_box', 'namba_shortcode_white_box' );

function namba_shortcode_yellow_box($atts, $content = null) {
	 return '<div class="yellow-box">' . do_shortcode( namba_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'yellow_box', 'namba_shortcode_yellow_box' );

function namba_shortcode_red_box($atts, $content = null) {
	 return '<div class="red-box">' . do_shortcode( namba_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'red_box', 'namba_shortcode_red_box' );

function namba_shortcode_blue_box($atts, $content = null) {
	 return '<div class="blue-box">' . do_shortcode( namba_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'blue_box', 'namba_shortcode_blue_box' );

function namba_shortcode_green_box($atts, $content = null) {
	 return '<div class="green-box">' . do_shortcode( namba_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'green_box', 'namba_shortcode_green_box' );

function namba_shortcode_lightgrey_box($atts, $content = null) {
	 return '<div class="lightgrey-box">' . do_shortcode( namba_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'lightgrey_box', 'namba_shortcode_lightgrey_box' );

function namba_shortcode_grey_box($atts, $content = null) {
	 return '<div class="grey-box">' . do_shortcode( namba_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'grey_box', 'namba_shortcode_grey_box' );

function namba_shortcode_dark_box($atts, $content = null) {
	 return '<div class="dark-box">' . do_shortcode( namba_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'dark_box', 'namba_shortcode_dark_box' );

/*-----------------------------------------------------------------------------------*/
/* Buttons Shortcodes
/*-----------------------------------------------------------------------------------*/
function namba_button( $atts, $content = null ) {
		extract(shortcode_atts(array(
		'link'	=> '#',
		'target' => '',
		'color'	=> '',
		'size'	=> '',
	 'form'	=> '',
	 'font'	=> '',
		), $atts));

	$color = ($color) ? ' '.$color. '-btn' : '';
	$size = ($size) ? ' '.$size. '-btn' : '';
	$form = ($form) ? ' '.$form. '-btn' : '';
	$font = ($font) ? ' '.$font. '-btn' : '';
	$target = ($target == 'blank') ? ' target="_blank"' : '';

	$out = '<a' .$target. ' class="standard-btn' .$color.$size.$form.$font. '" href="' .$link. '"><span>' .do_shortcode($content). '</span></a>';

		return $out;
}
add_shortcode('button', 'namba_button');
