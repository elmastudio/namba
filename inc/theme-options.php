<?php
/**
 * Namba Theme Options
 *
 * @subpackage Namba
 * @since Namba 1.0
 */

/*-----------------------------------------------------------------------------------*/
/* Properly enqueue styles and scripts for our theme options page.
/*
/* This function is attached to the admin_enqueue_scripts action hook.
/*
/* @param string $hook_suffix The action passes the current page to the function.
/* We don't do anything if we're not on our theme options page.
/*-----------------------------------------------------------------------------------*/

function namba_admin_enqueue_scripts( $hook_suffix ) {
	if ( $hook_suffix != 'appearance_page_theme_options' )
		return;

	wp_enqueue_style( 'namba-theme-options', get_template_directory_uri() . '/inc/theme-options.css', false, '2013-07-28' );
	wp_enqueue_script( 'namba-theme-options', get_template_directory_uri() . '/inc/theme-options.js', array( 'farbtastic' ), '2013-07-28' );
	wp_enqueue_style( 'farbtastic' );
}
add_action( 'admin_enqueue_scripts', 'namba_admin_enqueue_scripts' );

/*-----------------------------------------------------------------------------------*/
/* Register the form setting for our namba_options array.
/*
/* This function is attached to the admin_init action hook.
/*
/* This call to register_setting() registers a validation callback, namba_theme_options_validate(),
/* which is used when the option is saved, to ensure that our option values are complete, properly
/* formatted, and safe.
/*
/* We also use this function to add our theme option if it doesn't already exist.
/*-----------------------------------------------------------------------------------*/

function namba_theme_options_init() {

	// If we have no options in the database, let's add them now.
	if ( false === namba_get_theme_options() )
		add_option( 'namba_theme_options', namba_get_default_theme_options() );

	register_setting(
		'namba_options',       // Options group, see settings_fields() call in theme_options_render_page()
		'namba_theme_options', // Database option, see namba_get_theme_options()
		'namba_theme_options_validate' // The sanitization callback, see namba_theme_options_validate()
	);
}
add_action( 'admin_init', 'namba_theme_options_init' );


/*-----------------------------------------------------------------------------------*/
/* Add our theme options page to the admin menu.
/*
/* This function is attached to the admin_menu action hook.
/*-----------------------------------------------------------------------------------*/

function namba_theme_options_add_page() {
	add_theme_page(
		__( 'Theme Options', 'namba' ), // Name of page
		__( 'Theme Options', 'namba' ), // Label in menu
		'edit_theme_options',                  // Capability required
		'theme_options',                       // Menu slug, used to uniquely identify the page
		'theme_options_render_page'            // Function that renders the options page
	);
}
add_action( 'admin_menu', 'namba_theme_options_add_page' );


/*-----------------------------------------------------------------------------------*/
/* Returns an array of layout options registered for Namba
/*-----------------------------------------------------------------------------------*/
function namba_layouts() {
	$layout_options = array(
		'blog-twocolumn' => array(
			'value' => 'blog-twocolumn',
			'label' => __( 'Two Column', 'namba' ),
			'thumbnail' => get_template_directory_uri() . '/inc/images/twocolumn.png',
		),
		'blog-onecolumn' => array(
			'value' => 'blog-onecolumn',
			'label' => __( 'One Column', 'namba' ),
			'thumbnail' => get_template_directory_uri() . '/inc/images/onecolumn.png',
		),
	);

	return apply_filters( 'namba_layouts', $layout_options );
}

/*-----------------------------------------------------------------------------------*/
/* Returns the default options for Namba
/*-----------------------------------------------------------------------------------*/

function namba_get_default_theme_options() {
	$default_theme_options = array(
		'standard_color'   => '#78c1c4',
		'bg_color'   => '#ffffff',
		'image_color'   => '#a8d4b8',
		'gallery_color'   => '#947a6d',
		'quote_color'   => '#f39768',
		'link_color'   => '#91b493',
		'video_color'   => '#f8b885',
		'audio_color'   => '#9b91c3',
		'status_color'   => '#91c6e5',
		'theme_layout' => 'blog-twocolumn',
		'custom_logo' => '',
		'custom_logo_width' => '',
		'custom_logo_height' => '',
		'custom_footertext' => '',
		'show-excerpt' => '',
		'share-posts' => '',
		'share-singleposts' => '',
		'custom-css' => '',
	);

	return apply_filters( 'namba_default_theme_options', $default_theme_options );
}

/*-----------------------------------------------------------------------------------*/
/* Returns the options array for Namba
/*-----------------------------------------------------------------------------------*/

function namba_get_theme_options() {
	return get_option( 'namba_theme_options' );
}

/*-----------------------------------------------------------------------------------*/
/* Returns the options array for Namba
/*-----------------------------------------------------------------------------------*/

function theme_options_render_page() {
	?>
	<div class="wrap">
		<h2><?php printf( __( '%s Theme Options', 'namba' ), wp_get_theme() ); ?></h2>
		<?php settings_errors(); ?>

		<form method="post" action="options.php">
			<?php
				settings_fields( 'namba_options' );
				$options = namba_get_theme_options();
				$default_options = namba_get_default_theme_options();
			?>

			<table class="form-table">
			<h3 class="title" style="margin-top:40px;"><?php _e( 'Custom Colors', 'namba' ); ?></h3>

				<tr valign="top"><th scope="row"><?php _e( 'Main Theme Color', 'namba' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Main Theme Color', 'namba' ); ?></span></legend>
							 <input type="text" name="namba_theme_options[standard_color]" value="<?php echo esc_attr( $options['standard_color'] ); ?>" id="standard-color" />
							<div style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;" id="colorpicker1"></div>
							<br />
							<small class="description"><?php printf( __( 'Choose your main theme color (used for standard posts and as the default link color). The default color is: <strong>%s</strong>.', 'namba' ), $default_options['standard_color'] ); ?></small>
						</fieldset>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Main Background Color', 'namba' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Main Background Color', 'namba' ); ?></span></legend>
							 <input type="text" name="namba_theme_options[bg_color]" value="<?php echo esc_attr( $options['bg_color'] ); ?>" id="bg-color" />
							<div style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;" id="colorpicker9"></div>
							<br />
							<small class="description"><?php printf( __( 'Choose your main background color. The default background color is: <strong>%s</strong>.', 'namba' ), $default_options['bg_color'] ); ?></small>
						</fieldset>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Image Post Format Color', 'namba' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Image Post Format Color', 'namba' ); ?></span></legend>
							 <input type="text" name="namba_theme_options[image_color]" value="<?php echo esc_attr( $options['image_color'] ); ?>" id="image-color" />
							<div style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;" id="colorpicker3"></div>
							<br />
							<small class="description"><?php printf( __( 'Choose your Image post format color, the default color is: <strong>%s</strong>.', 'namba' ), $default_options['image_color'] ); ?></small>
						</fieldset>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Gallery Post Format Color', 'namba' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Gallery Post Format Color', 'namba' ); ?></span></legend>
							 <input type="text" name="namba_theme_options[gallery_color]" value="<?php echo esc_attr( $options['gallery_color'] ); ?>" id="gallery-color" />
							<div style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;" id="colorpicker2"></div>
							<br />
							<small class="description"><?php printf( __( 'Choose your Gallery post format color, the default color is: <strong>%s</strong>.', 'namba' ), $default_options['gallery_color'] ); ?></small>
						</fieldset>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Quote Post Format Color', 'namba' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Quote Post Format Color', 'namba' ); ?></span></legend>
							 <input type="text" name="namba_theme_options[quote_color]" value="<?php echo esc_attr( $options['quote_color'] ); ?>" id="quote-color" />
							<div style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;" id="colorpicker4"></div>
							<br />
							<small class="description"><?php printf( __( 'Choose your Quote post format color, the default color is: <strong>%s</strong>.', 'namba' ), $default_options['quote_color'] ); ?></small>
						</fieldset>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Link Post Format Color', 'namba' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Link Post Format Color', 'namba' ); ?></span></legend>
							 <input type="text" name="namba_theme_options[link_color]" value="<?php echo esc_attr( $options['link_color'] ); ?>" id="link-color" />
							<div style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;" id="colorpicker5"></div>
							<br />
							<small class="description"><?php printf( __( 'Choose your Link post format color, the default color is: <strong>%s</strong>.', 'namba' ), $default_options['link_color'] ); ?></small>
						</fieldset>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Video Post Format Color', 'namba' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Video Post Format Color', 'namba' ); ?></span></legend>
							 <input type="text" name="namba_theme_options[video_color]" value="<?php echo esc_attr( $options['video_color'] ); ?>" id="video-color" />
							<div style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;" id="colorpicker6"></div>
							<br />
							<small class="description"><?php printf( __( 'Choose your Video post format color, the default color is: <strong>%s</strong>.', 'namba' ), $default_options['video_color'] ); ?></small>
						</fieldset>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Audio Post Format Color', 'namba' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Audio Post Format Color', 'namba' ); ?></span></legend>
							 <input type="text" name="namba_theme_options[audio_color]" value="<?php echo esc_attr( $options['audio_color'] ); ?>" id="audio-color" />
							<div style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;" id="colorpicker7"></div>
							<br />
							<small class="description"><?php printf( __( 'Choose your Audio post format color, the default color is: <strong>%s</strong>.', 'namba' ), $default_options['audio_color'] ); ?></small>
						</fieldset>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Status Post Format Color', 'namba' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Status Post Format Color', 'namba' ); ?></span></legend>
							 <input type="text" name="namba_theme_options[status_color]" value="<?php echo esc_attr( $options['status_color'] ); ?>" id="status-color" />
							<div style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;" id="colorpicker8"></div>
							<br />
							<small class="description"><?php printf( __( 'Choose your Status post format color, the default color is: <strong>%s</strong>.', 'namba' ), $default_options['status_color'] ); ?></small>
						</fieldset>
					</td>
				</tr>

				</table>

				<table class="form-table">
					<h3 style="margin-top:30px;"><?php _e( 'Blog Layout Options', 'namba' ); ?></h3>
					<tr valign="top" class="image-radio-option"><th scope="row"><?php _e( 'Blog Layout', 'namba' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Blog Layout', 'namba' ); ?></span></legend>
						<?php
							foreach ( namba_layouts() as $layout ) {
								?>
								<div class="layout">
								<label class="description">
									<input type="radio" name="namba_theme_options[theme_layout]" value="<?php echo esc_attr( $layout['value'] ); ?>" <?php checked( $options['theme_layout'], $layout['value'] ); ?> />
									<span>
										<img src="<?php echo esc_url( $layout['thumbnail'] ); ?>"/>
										<?php echo $layout['label']; ?>
									</span>
								</label>
								</div>
								<?php
							}
						?>
						</fieldset>
					</td>
					</tr>
				</table>

				<table class="form-table">
				<h3 class="title" style="margin-top:40px;"><?php _e( 'Custom Logo, Post Excerpts and Footer Text', 'namba' ); ?></h3>

				<tr valign="top"><th scope="row"><?php _e( 'Logo Image', 'namba' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Logo Image', 'namba' ); ?></span></legend>
							<input class="regular-text" type="text" name="namba_theme_options[custom_logo]" value="<?php echo esc_attr( $options['custom_logo'] ); ?>" />
						<br/><label class="description" for="namba_theme_options[custom_logo]"><?php _e('Upload your own logo image with a max width of 225px and a flexible height (e.g. 135x135px) using the ', 'namba'); ?><a href="<?php echo home_url(); ?>/wp-admin/media-new.php" target="_blank"><?php _e('WordPress Media Uploader', 'namba'); ?></a><?php _e('. Then copy your logo image file URL and insert the URL here. If you want to include a Retina-ready logo image, just prepare the image 2x the actual size (e.g. 270x270px), but still type in the 135x135 as width and height value below.', 'namba'); ?></label>
						</fieldset>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Logo Image Width', 'namba' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Logo Image Width', 'namba' ); ?></span></legend>
							<input class="short-text" type="text" name="namba_theme_options[custom_logo_width]" value="<?php echo esc_attr( $options['custom_logo_width'] ); ?>" />
						<br/><label class="description" for="namba_theme_options[custom_logo_width]"><?php _e( 'Include your custom logo width, e.g. 135 (value only, no unit)', 'namba' ); ?></label>
						</fieldset>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Logo Image Height', 'namba' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Logo Image Height', 'namba' ); ?></span></legend>
							<input class="short-text" type="text" name="namba_theme_options[custom_logo_height]" value="<?php echo esc_attr( $options['custom_logo_height'] ); ?>" />
						<br/><label class="description" for="namba_theme_options[custom_logo_height]"><?php _e( 'Include your custom logo height, e.g. 135 (value only, no unit)', 'namba' ); ?></label>
						</fieldset>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Post Excerpts', 'namba' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Post Excerpts', 'namba' ); ?></span></legend>
							<input id="namba_theme_options[show-excerpt]" name="namba_theme_options[show-excerpt]" type="checkbox" value="1" <?php checked( '1', $options['show-excerpt'] ); ?> />
							<label class="description" for="namba_theme_options[show-excerpt]"><?php _e( 'Check this box to show automatic post excerpts for standard posts. With this option you will not need to add the more tag in posts.', 'namba' ); ?></label>
						</fieldset>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Footer Credit Text', 'namba' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Footer Credit Text', 'namba' ); ?></span></legend>
							<textarea id="namba_theme_options[custom_footertext]" class="small-text" cols="100" rows="2" name="namba_theme_options[custom_footertext]"><?php echo esc_textarea( $options['custom_footertext'] ); ?></textarea>
						<br/><label class="description" for="namba_theme_options[custom_footertext]"><?php _e( 'Customize the footer credit text. Standard HTML is allowed.', 'namba' ); ?></label>
						</fieldset>
					</td>
				</tr>

				</table>

				<table class="form-table">

				<h3 class="title" style="margin-top:40px;"><?php _e( 'Share Buttons', 'namba' ); ?></h3>

				<tr valign="top"><th scope="row"><?php _e( 'Share option for posts', 'namba' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Share option for posts', 'namba' ); ?></span></legend>
							<input id="namba_theme_options[share-posts]" name="namba_theme_options[share-posts]" type="checkbox" value="1" <?php checked( '1', $options['share-posts'] ); ?> />
							<label class="description" for="namba_theme_options[share-posts]"><?php _e( 'Check this box to include share buttons (for Twitter, Facebook, Google+) on your blogs front page and on single post pages.', 'namba' ); ?></label>
						</fieldset>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Share option on single posts only', 'namba' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Share option on single posts only', 'namba' ); ?></span></legend>
							<input id="namba_theme_options[share-singleposts]" name="namba_theme_options[share-singleposts]" type="checkbox" value="1" <?php checked( '1', $options['share-singleposts'] ); ?> />
							<label class="description" for="namba_theme_options[share-singleposts]"><?php _e( 'Check this box to include the share post buttons <strong>only</strong> on single posts (below the post content).', 'namba' ); ?></label>
						</fieldset>
					</td>
				</tr>
				</table>

				<table class="form-table">
				<h3 class="title" style="margin-top:40px;"><?php _e( 'Custom CSS', 'namba' ); ?></h3>

				<tr valign="top"><th scope="row"><?php _e( 'Include Custom CSS', 'namba' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Include Custom CSS', 'namba' ); ?></span></legend>
							<textarea id="namba_theme_options[custom-css]" class="small-text" cols="100" rows="10" name="namba_theme_options[custom-css]"><?php echo esc_textarea( $options['custom-css'] ); ?></textarea>
						<br/><label class="description" for="namba_theme_options[custom-css]"><?php _e( 'Include custom CSS styles, use !important to overwrite existing styles.', 'namba' ); ?></label>
						</fieldset>
					</td>
				</tr>

				</table>

			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}

/*-----------------------------------------------------------------------------------*/
/* Sanitize and validate form input. Accepts an array, return a sanitized array.
/*-----------------------------------------------------------------------------------*/

function namba_theme_options_validate( $input ) {
	global $layout_options, $font_options;

	// custom color must be 3 or 6 hexadecimal characters
	if ( isset( $input['standard_color'] ) && preg_match( '/^#?([a-f0-9]{3}){1,2}$/i', $input['standard_color'] ) )
			$output['standard_color'] = '#' . strtolower( ltrim( $input['standard_color'], '#' ) );

	if ( isset( $input['bg_color'] ) && preg_match( '/^#?([a-f0-9]{3}){1,2}$/i', $input['bg_color'] ) )
			$output['bg_color'] = '#' . strtolower( ltrim( $input['bg_color'], '#' ) );

	if ( isset( $input['image_color'] ) && preg_match( '/^#?([a-f0-9]{3}){1,2}$/i', $input['image_color'] ) )
			$output['image_color'] = '#' . strtolower( ltrim( $input['image_color'], '#' ) );

	if ( isset( $input['gallery_color'] ) && preg_match( '/^#?([a-f0-9]{3}){1,2}$/i', $input['gallery_color'] ) )
			$output['gallery_color'] = '#' . strtolower( ltrim( $input['gallery_color'], '#' ) );

	if ( isset( $input['quote_color'] ) && preg_match( '/^#?([a-f0-9]{3}){1,2}$/i', $input['quote_color'] ) )
			$output['quote_color'] = '#' . strtolower( ltrim( $input['quote_color'], '#' ) );

	if ( isset( $input['link_color'] ) && preg_match( '/^#?([a-f0-9]{3}){1,2}$/i', $input['link_color'] ) )
			$output['link_color'] = '#' . strtolower( ltrim( $input['link_color'], '#' ) );

	if ( isset( $input['video_color'] ) && preg_match( '/^#?([a-f0-9]{3}){1,2}$/i', $input['video_color'] ) )
			$output['video_color'] = '#' . strtolower( ltrim( $input['video_color'], '#' ) );

	if ( isset( $input['audio_color'] ) && preg_match( '/^#?([a-f0-9]{3}){1,2}$/i', $input['audio_color'] ) )
			$output['audio_color'] = '#' . strtolower( ltrim( $input['audio_color'], '#' ) );

	if ( isset( $input['status_color'] ) && preg_match( '/^#?([a-f0-9]{3}){1,2}$/i', $input['status_color'] ) )
			$output['status_color'] = '#' . strtolower( ltrim( $input['status_color'], '#' ) );

	// Theme layout must be in our array of theme layout options
	if ( isset( $input['theme_layout'] ) && array_key_exists( $input['theme_layout'], namba_layouts() ) )
		$output['theme_layout'] = $input['theme_layout'];

	// Text options must be safe text with no HTML tags
	$input['custom_logo'] = wp_filter_nohtml_kses( $input['custom_logo'] );

	// Text options must be safe text with no HTML tags
	$input['custom_logo_width'] = wp_filter_nohtml_kses( $input['custom_logo_width'] );

	// Text options must be safe text with no HTML tags
	$input['custom_logo_heighth'] = wp_filter_nohtml_kses( $input['custom_logo_height'] );

	// checkbox values are either 0 or 1
	if ( ! isset( $input['share-posts'] ) )
		$input['share-posts'] = null;
	$input['share-posts'] = ( $input['share-posts'] == 1 ? 1 : 0 );

	if ( ! isset( $input['share-singleposts'] ) )
		$input['share-singleposts'] = null;
	$input['share-singleposts'] = ( $input['share-singleposts'] == 1 ? 1 : 0 );

	if ( ! isset( $input['show-excerpt'] ) )
		$input['show-excerpt'] = null;
	$input['show-excerpt'] = ( $input['show-excerpt'] == 1 ? 1 : 0 );

	return $input;
}

/*-----------------------------------------------------------------------------------*/
/* Adds Namba layout classes to the array of body classes.
/*-----------------------------------------------------------------------------------*/
function namba_layout_classes( $existing_classes ) {
	$options = namba_get_theme_options();
	$current_layout = $options['theme_layout'];

	if ( 'blog-onecolumn' == $current_layout )
		$classes[] = 'blog-onecolumn';
	else
	$classes[] = $current_layout;

	$classes = apply_filters( 'namba_layout_classes', $classes, $current_layout );

	return array_merge( $existing_classes, $classes );
}
add_filter( 'body_class', 'namba_layout_classes' );

/*-----------------------------------------------------------------------------------*/
/* Add a style block to the theme for the current main theme color.
/*-----------------------------------------------------------------------------------*/
function namba_print_standard_color_style() {
	$options = namba_get_theme_options();
	$standard_color = $options['standard_color'];

	$default_options = namba_get_default_theme_options();

	// Don't do anything if the current main theme color is the default.
	if ( $default_options['standard_color'] == $standard_color )
		return;
?>
<style type="text/css">
/* Custom Main Theme Color */
a,
.entry-details,
#colophon .footer-nav,
.entry-content h4,
.entry-header h2.entry-title a:hover,
.widget_categories a:hover,
.widget_archive a:hover,
.widget_pages a:hover,
.widget_meta a:hover,
.widget_recent_entries a:hover,
.widget_recent_comments a:hover,
#colophon #site-info a:hover,
.entry-content p.intro,
.sidebar-recentposts .rp-meta-standard,
.sidebar-recentposts .rp-meta-standard a,
.nav-next a:hover,
.nav-previous a:hover,
.previous-image a:hover,
.next-image a:hover {
	color: <?php echo $standard_color; ?>;
}
.template-archive .monthly-archive-list a:hover,
.template-archive .latest-posts-list a:hover {
	color: <?php echo $standard_color; ?> !important;
}
input#submit,
input.wpcf7-submit,
.jetpack_subscription_widget input[type="submit"]:hover,
.widget_search input[type="submit"]:hover,
#site-nav a:hover,
.widget_nav_menu a:hover {
	background: <?php echo $standard_color; ?>;
}
.entry-format,
.rp-pf a.rp-pf-standard {
	background: <?php echo $standard_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/pf-icons-small.png) 0 0 no-repeat;
}
.widget h3.widget-title {
	border-bottom: 3px solid <?php echo $standard_color; ?>;
}
@media screen and (min-width: 1350px) {
.sticky .entry-format,
.single-post .entry-format {background: <?php echo $standard_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/pf-icons-big.png) -27.5px -17.5px no-repeat;}
}
@media (-moz-min-device-pixel-ratio: 1.5),
(-o-min-device-pixel-ratio: 3/2),
(-webkit-min-device-pixel-ratio: 1.5),
(min-device-pixel-ratio: 1.5) {
.entry-format,
.rp-pf a.rp-pf-standard {background: <?php echo $standard_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/x2/pf-icons-small.png) 0 0 no-repeat; background-size: 24px 192px;}
}
@media (-moz-min-device-pixel-ratio: 1.5) and (min-width: 1350px),
(-o-min-device-pixel-ratio: 3/2) and (min-width: 1350px),
(-webkit-min-device-pixel-ratio: 1.5) and (min-width: 1350px),
(min-device-pixel-ratio: 1.5) and (min-width: 1350px) {
.sticky .entry-format,
.single-post .entry-format {background: <?php echo $standard_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/x2/pf-icons-big.png) -27.5px -17.5px no-repeat;  background-size: 95px 760px;}
}
</style>
<?php
}
add_action( 'wp_head', 'namba_print_standard_color_style' );

/*-----------------------------------------------------------------------------------*/
/* Add a style block to the theme for the current theme background color.
/*-----------------------------------------------------------------------------------*/
function namba_print_bg_color_style() {
	$options = namba_get_theme_options();
	$bg_color = $options['bg_color'];

	$default_options = namba_get_default_theme_options();

	// Don't do anything if the current main background color is the default.
	if ( $default_options['bg_color'] == $bg_color )
		return;
?>
<style type="text/css">
/* Custom Theme Background Color */
body,
#container,
.archive-header,
.site-content .sticky,
.sidebar-recentposts .widget-area .widget_namba_headlines {background: <?php echo $bg_color; ?>;}
@media screen and (min-width: 1350px) {
.blog-onecolumn .site-content .post {background: <?php echo $bg_color; ?>;}
}
</style>
<?php
}
add_action( 'wp_head', 'namba_print_bg_color_style' );


/*-----------------------------------------------------------------------------------*/
/* Add a style block to the theme for the current Image post format color.
/*-----------------------------------------------------------------------------------*/
function namba_print_image_color_style() {
	$options = namba_get_theme_options();
	$image_color = $options['image_color'];

	$default_options = namba_get_default_theme_options();

	// Don't do anything if the current Image post format color is the default.
	if ( $default_options['image_color'] == $image_color )
		return;
?>
<style type="text/css">
/* Custom Image Post Format Color */
.format-image .entry-details,
.format-image a,
.single-format-image #comments a,
.sidebar-recentposts .rp-meta-image,
.format-image .entry-content p.intro,
.sidebar-recentposts .rp-meta-image a {color: <?php echo $image_color; ?>;}
.single-format-image #comments input#submit {background: <?php echo $image_color; ?>;}
.format-image .entry-format,
.rp-pf a.rp-pf-image {background: <?php echo $image_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/pf-icons-small.png) 0 -24px no-repeat;}
ul.namba-postformats li.pf-image-archive {background: <?php echo $image_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/pf-icons-big.png) center -95px no-repeat;}
@media screen and (min-width: 1350px) {
.format-image.sticky .entry-format,
.single .format-image .entry-format {background: <?php echo $image_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/pf-icons-big.png) -27.5px -112.5px no-repeat;}
}
@media (-moz-min-device-pixel-ratio: 1.5),
(-o-min-device-pixel-ratio: 3/2),
(-webkit-min-device-pixel-ratio: 1.5),
(min-device-pixel-ratio: 1.5) {
.format-image .entry-format,
.rp-pf a.rp-pf-image {background: <?php echo $image_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/x2/pf-icons-small.png) 0 -24px no-repeat; background-size: 24px 192px;}
ul.namba-postformats li.pf-image-archive {background: <?php echo $image_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/x2/pf-icons-big.png) center -95px no-repeat; background-size: 95px 760px;}
}
@media (-moz-min-device-pixel-ratio: 1.5) and (min-width: 1350px),
(-o-min-device-pixel-ratio: 3/2) and (min-width: 1350px),
(-webkit-min-device-pixel-ratio: 1.5) and (min-width: 1350px),
(min-device-pixel-ratio: 1.5) and (min-width: 1350px) {
.format-image.sticky .entry-format,
.single .format-image .entry-format {background: <?php echo $image_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/x2/pf-icons-big.png) -27.5px -112.5px no-repeat; background-size: 95px 760px;}
}
</style>
<?php
}
add_action( 'wp_head', 'namba_print_image_color_style' );


/*-----------------------------------------------------------------------------------*/
/* Add a style block to the theme for the current Gallery post format color.
/*-----------------------------------------------------------------------------------*/
function namba_print_gallery_color_style() {
	$options = namba_get_theme_options();
	$gallery_color = $options['gallery_color'];

	$default_options = namba_get_default_theme_options();

	// Don't do anything if the current Gallery post format color is the default.
	if ( $default_options['gallery_color'] == $gallery_color )
		return;
?>
<style type="text/css">
/* Custom Gallery Post Format Color */
.format-gallery .entry-header h2.entry-title a:hover,
.format-gallery .entry-details,
.format-gallery a,
.single-format-gallery #comments a,
.sidebar-recentposts .rp-meta-gallery,
.format-gallery .entry-content p.intro,
.sidebar-recentposts .rp-meta-gallery a {color: <?php echo $gallery_color; ?>;}
.single-format-gallery #comments input#submit {background: <?php echo $gallery_color; ?>;}
.format-gallery .entry-format {background: <?php echo $gallery_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/pf-icons-small.png) 0 -72px no-repeat;}
ul.namba-postformats li.pf-gallery-archive {background: <?php echo $gallery_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/pf-icons-big.png) center -285px no-repeat;}
.rp-pf a.rp-pf-gallery {background: <?php echo $gallery_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/pf-icons-small.png) 0 -72px no-repeat;}
@media screen and (min-width: 1350px) {
.format-gallery.sticky .entry-format,
.single .format-gallery .entry-format {background: <?php echo $gallery_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/pf-icons-big.png) -27.5px -302.5px no-repeat;}
}
@media (-moz-min-device-pixel-ratio: 1.5),
(-o-min-device-pixel-ratio: 3/2),
(-webkit-min-device-pixel-ratio: 1.5),
(min-device-pixel-ratio: 1.5) {
.format-gallery .entry-format,
.rp-pf a.rp-pf-gallery {background: <?php echo $gallery_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/x2/pf-icons-small.png) 0 -72px no-repeat; background-size: 24px 192px;}
ul.namba-postformats li.pf-gallery-archive {background: <?php echo $gallery_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/x2/pf-icons-big.png) center -285px no-repeat; background-size: 95px 760px;}
}
@media (-moz-min-device-pixel-ratio: 1.5) and (min-width: 1350px),
(-o-min-device-pixel-ratio: 3/2) and (min-width: 1350px),
(-webkit-min-device-pixel-ratio: 1.5) and (min-width: 1350px),
(min-device-pixel-ratio: 1.5) and (min-width: 1350px) {
.format-gallery.sticky .entry-format,
.single .format-gallery .entry-format {background: <?php echo $gallery_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/x2/pf-icons-big.png) -27.5px -302.5px no-repeat; background-size: 95px 760px;}
}
</style>
<?php
}
add_action( 'wp_head', 'namba_print_gallery_color_style' );


/*-----------------------------------------------------------------------------------*/
/* Add a style block to the theme for the current Quote post format color.
/*-----------------------------------------------------------------------------------*/
function namba_print_quote_color_style() {
	$options = namba_get_theme_options();
	$quote_color = $options['quote_color'];

	$default_options = namba_get_default_theme_options();

	// Don't do anything if the current Quote post format color is the default.
	if ( $default_options['quote_color'] == $quote_color )
		return;
?>
<style type="text/css">
/* Custom Quote Post Format Color */
.format-quote .entry-details,
.format-quote a,
.single-format-quote #comments a,
.sidebar-recentposts .rp-meta-quote,
.format-format .entry-content p.intro,
.sidebar-recentposts .rp-meta-quote a {color: <?php echo $quote_color; ?>;}
.single-format-quote #comments input#submit {background: <?php echo $quote_color; ?>;}
.format-quote .entry-format,
.rp-pf a.rp-pf-quote {background: <?php echo $quote_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/pf-icons-small.png) 0 -96px no-repeat;}
ul.namba-postformats li.pf-quote-archive {background: <?php echo $quote_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/pf-icons-big.png) center -380px no-repeat;}
@media screen and (min-width: 1350px) {
.format-quote.sticky .entry-format,
.single .format-quote .entry-format {background: <?php echo $quote_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/pf-icons-big.png) -27.5px -397.5px no-repeat;}
}
@media (-moz-min-device-pixel-ratio: 1.5),
(-o-min-device-pixel-ratio: 3/2),
(-webkit-min-device-pixel-ratio: 1.5),
(min-device-pixel-ratio: 1.5) {
.format-quote .entry-format,
.rp-pf a.rp-pf-quote {background: <?php echo $quote_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/x2/pf-icons-small.png) 0 -96px no-repeat; background-size: 24px 192px;}
ul.namba-postformats li.pf-quote-archive {background: <?php echo $quote_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/x2/pf-icons-big.png) center -380px no-repeat; background-size: 95px 760px;}
}
@media (-moz-min-device-pixel-ratio: 1.5) and (min-width: 1350px),
(-o-min-device-pixel-ratio: 3/2) and (min-width: 1350px),
(-webkit-min-device-pixel-ratio: 1.5) and (min-width: 1350px),
(min-device-pixel-ratio: 1.5) and (min-width: 1350px) {
.format-quote.sticky .entry-format,
.single .format-quote .entry-format {background: <?php echo $quote_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/x2/pf-icons-big.png) -27.5px -397.5px no-repeat; background-size: 95px 760px;}
}
</style>
<?php
}
add_action( 'wp_head', 'namba_print_quote_color_style' );


/*-----------------------------------------------------------------------------------*/
/* Add a style block to the theme for the current Link post format color.
/*-----------------------------------------------------------------------------------*/
function namba_print_link_color_style() {
	$options = namba_get_theme_options();
	$link_color = $options['link_color'];

	$default_options = namba_get_default_theme_options();

	// Don't do anything if the current Link post format color is the default.
	if ( $default_options['link_color'] == $link_color )
		return;
?>
<style type="text/css">
/* Custom Link Post Format Color */
.format-link .entry-details,
.format-link a,
.single-format-link #comments a,
.sidebar-recentposts .rp-meta-link,
.format-link .entry-content p.intro,
.sidebar-recentposts .rp-meta-link a {color: <?php echo $link_color; ?>;}
.single-format-link #comments input#submit {background: <?php echo $link_color; ?>;}
.format-link .entry-format,
.rp-pf a.rp-pf-link {background: <?php echo $link_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/pf-icons-small.png) 0 -48px no-repeat;}
ul.namba-postformats li.pf-link-archive {background: <?php echo $link_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/pf-icons-big.png) center -190px no-repeat;}
@media screen and (min-width: 1350px) {
.format-link.sticky .entry-format,
.single .format-link .entry-format {background: <?php echo $link_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/pf-icons-big.png) -27.5px -207.5px no-repeat;}
}
@media (-moz-min-device-pixel-ratio: 1.5),
(-o-min-device-pixel-ratio: 3/2),
(-webkit-min-device-pixel-ratio: 1.5),
(min-device-pixel-ratio: 1.5) {
.format-link .entry-format,
.rp-pf a.rp-pf-link {background: <?php echo $link_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/x2/pf-icons-small.png) 0 -48px no-repeat; background-size: 24px 192px;}
ul.namba-postformats li.pf-link-archive {background: <?php echo $link_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/x2/pf-icons-big.png) center -190px no-repeat; background-size: 95px 760px;}
}
@media (-moz-min-device-pixel-ratio: 1.5) and (min-width: 1350px),
(-o-min-device-pixel-ratio: 3/2) and (min-width: 1350px),
(-webkit-min-device-pixel-ratio: 1.5) and (min-width: 1350px),
(min-device-pixel-ratio: 1.5) and (min-width: 1350px) {
.format-link.sticky .entry-format,
.single .format-link .entry-format {background: <?php echo $link_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/x2/pf-icons-big.png) -27.5px -207.5px no-repeat; background-size: 95px 760px;}
}
</style>
<?php
}
add_action( 'wp_head', 'namba_print_link_color_style' );


/*-----------------------------------------------------------------------------------*/
/* Add a style block to the theme for the current Video post format color.
/*-----------------------------------------------------------------------------------*/
function namba_print_video_color_style() {
	$options = namba_get_theme_options();
	$video_color = $options['video_color'];

	$default_options = namba_get_default_theme_options();

	// Don't do anything if the current Video post format color is the default.
	if ( $default_options['video_color'] == $video_color )
		return;
?>
<style type="text/css">
/* Custom Video Post Format Color */
.format-video .entry-details,
.format-video a,
.single-format-video #comments a,
.sidebar-recentposts .rp-meta-video,
.format-video .entry-content p.intro,
.sidebar-recentposts .rp-meta-video a {color: <?php echo $video_color; ?>;}
.single-format-video #comments input#submit {background: <?php echo $video_color; ?>;}
.format-video .entry-format,
.rp-pf a.rp-pf-video {background: <?php echo $video_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/pf-icons-small.png) 0 -120px no-repeat;}
ul.namba-postformats li.pf-video-archive {background: <?php echo $video_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/pf-icons-big.png) center -475px no-repeat;}
@media screen and (min-width: 1350px) {
.format-video.sticky .entry-format,
.single .format-video .entry-format {background: <?php echo $video_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/pf-icons-big.png) -27.5px -489.5px no-repeat;}
}
@media (-moz-min-device-pixel-ratio: 1.5),
(-o-min-device-pixel-ratio: 3/2),
(-webkit-min-device-pixel-ratio: 1.5),
(min-device-pixel-ratio: 1.5) {
.format-video .entry-format,
.rp-pf a.rp-pf-video {background: <?php echo $video_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/x2/pf-icons-small.png) 0 -120px no-repeat; background-size: 24px 192px;}
ul.namba-postformats li.pf-video-archive {background: <?php echo $video_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/x2/pf-icons-big.png) center -475px no-repeat; background-size: 95px 760px;}
}
@media (-moz-min-device-pixel-ratio: 1.5) and (min-width: 1350px),
(-o-min-device-pixel-ratio: 3/2) and (min-width: 1350px),
(-webkit-min-device-pixel-ratio: 1.5) and (min-width: 1350px),
(min-device-pixel-ratio: 1.5) and (min-width: 1350px) {
.format-video.sticky .entry-format,
.single .format-video .entry-format {background: <?php echo $video_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/x2/pf-icons-big.png) -27.5px -498.5px no-repeat; background-size: 95px 760px;}
}
</style>
<?php
}
add_action( 'wp_head', 'namba_print_video_color_style' );


/*-----------------------------------------------------------------------------------*/
/* Add a style block to the theme for the current Audio post format color.
/*-----------------------------------------------------------------------------------*/
function namba_print_audio_color_style() {
	$options = namba_get_theme_options();
	$audio_color = $options['audio_color'];

	$default_options = namba_get_default_theme_options();

	// Don't do anything if the current Audio post format color is the default.
	if ( $default_options['audio_color'] == $audio_color )
		return;
?>
<style type="text/css">
/* Custom Audio Post Format Color */
.format-audio .entry-details,
.format-audio a,
.single-format-audio #comments a,
.sidebar-recentposts .rp-meta-audio,
.format-audio .entry-content p.intro,
.sidebar-recentposts .rp-meta-audio a {color: <?php echo $audio_color; ?>;}
.single-format-audio #comments input#submit {background: <?php echo $audio_color; ?>;}
.format-audio .entry-format,
.rp-pf a.rp-pf-audio {background: <?php echo $audio_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/pf-icons-small.png) 0 -144px no-repeat;}
ul.namba-postformats li.pf-audio-archive {background: <?php echo $audio_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/pf-icons-big.png) center -570px no-repeat;}
@media screen and (min-width: 1350px) {
.format-audio.sticky .entry-format,
.single .format-audio .entry-format {background: <?php echo $audio_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/pf-icons-big.png) -27.5px -587.5px no-repeat;}
}
@media (-moz-min-device-pixel-ratio: 1.5),
(-o-min-device-pixel-ratio: 3/2),
(-webkit-min-device-pixel-ratio: 1.5),
(min-device-pixel-ratio: 1.5) {
.format-audio .entry-format,
.rp-pf a.rp-pf-audio {background: <?php echo $audio_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/x2/pf-icons-small.png) 0 -144px no-repeat; background-size: 24px 192px;}
ul.namba-postformats li.pf-audio-archive {background: <?php echo $audio_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/x2/pf-icons-big.png) center -570px no-repeat; background-size: 95px 760px;}
}
@media (-moz-min-device-pixel-ratio: 1.5) and (min-width: 1350px),
(-o-min-device-pixel-ratio: 3/2) and (min-width: 1350px),
(-webkit-min-device-pixel-ratio: 1.5) and (min-width: 1350px),
(min-device-pixel-ratio: 1.5) and (min-width: 1350px) {
.format-audio.sticky .entry-format,
.single .format-audio .entry-format {background: <?php echo $audio_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/x2/pf-icons-big.png) -27.5px -587.5px no-repeat; background-size: 95px 760px;}
}
</style>
<?php
}
add_action( 'wp_head', 'namba_print_audio_color_style' );


/*-----------------------------------------------------------------------------------*/
/* Add a style block to the theme for the current Status post format color.
/*-----------------------------------------------------------------------------------*/
function namba_print_status_color_style() {
	$options = namba_get_theme_options();
	$status_color = $options['status_color'];

	$default_options = namba_get_default_theme_options();

	// Don't do anything if the current Status post format color is the default.
	if ( $default_options['status_color'] == $status_color )
		return;
?>
<style type="text/css">
/* Custom Status Post Format Color */
.format-status .entry-details,
.format-status a,
.single-format-status #comments a,
.sidebar-recentposts .rp-meta-status,
.format-status .entry-content p.intro,
.sidebar-recentposts .rp-meta-status a {color: <?php echo $status_color; ?>;}
.single-format-status #comments input#submit {background: <?php echo $status_color; ?>;}
.format-status .entry-format,
.rp-pf a.rp-pf-status {background: <?php echo $status_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/pf-icons-small.png) 0 -168px no-repeat;}
ul.namba-postformats li.pf-status-archive {background: <?php echo $status_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/pf-icons-big.png) center -665px no-repeat;}
@media screen and (min-width: 1350px) {
.format-status.sticky .entry-format,
.single .format-status .entry-format {background: <?php echo $status_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/pf-icons-big.png) -27.5px -682.5px no-repeat;}
}
@media (-moz-min-device-pixel-ratio: 1.5),
(-o-min-device-pixel-ratio: 3/2),
(-webkit-min-device-pixel-ratio: 1.5),
(min-device-pixel-ratio: 1.5) {
.format-status .entry-format,
.rp-pf a.rp-pf-status {background: <?php echo $status_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/x2/pf-icons-small.png) 0 -168px no-repeat; background-size: 24px 192px;}
ul.namba-postformats li.pf-status-archive {background: <?php echo $status_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/x2/pf-icons-big.png) center -665px no-repeat; background-size: 95px 760px;}
}
@media (-moz-min-device-pixel-ratio: 1.5) and (min-width: 1350px),
(-o-min-device-pixel-ratio: 3/2) and (min-width: 1350px),
(-webkit-min-device-pixel-ratio: 1.5) and (min-width: 1350px),
(min-device-pixel-ratio: 1.5) and (min-width: 1350px) {
.format-status.sticky .entry-format,
.single .format-status .entry-format {background: <?php echo $status_color; ?> url(<?php echo get_template_directory_uri(); ?>/images/x2/pf-icons-big.png) -27.5px -682.5px no-repeat; background-size: 95px 760px;}
}
</style>
<?php
}
add_action( 'wp_head', 'namba_print_status_color_style' );


/*-----------------------------------------------------------------------------------*/
/* Add a style block to the theme for custom css styles.
/*
/* This function is attached to the wp_head action hook.
/*-----------------------------------------------------------------------------------*/

function namba_print_customcss_style() {
	$options = namba_get_theme_options();
	$customcss = $options['custom-css'];

	$default_options = namba_get_default_theme_options();

	// Don't do anything if custom CSS is empty.
	if ( $default_options['custom-css'] == $customcss )
		return;
?>
<style type="text/css">
/* Custom CSS */
<?php echo $customcss; ?>
</style>
<?php
}
add_action( 'wp_head', 'namba_print_customcss_style' );


/*-----------------------------------------------------------------------------------*/
/* Add a style block to the theme for custom logo styles.
/*
/* This function is attached to the wp_head action hook.
/*-----------------------------------------------------------------------------------*/

function namba_print_custom_logo_style() {
	$options = namba_get_theme_options();
	$custom_logo = $options['custom_logo'];
	$custom_logo_width = $options['custom_logo_width'];
	$custom_logo_height = $options['custom_logo_height'];

	$default_options = namba_get_default_theme_options();

	// Don't do anything if the custom logo option is empty.
	if ( $default_options['custom_logo'] == $custom_logo )
		return;
?>
<style type="text/css">
/* Custom Logo Image CSS */
h2.site-description, .logo-footer p.site-description-footer {display: none;}
#site-title h1 {margin: 0;}
#site-title h1 a {
	display: block;
	margin: 0 auto;
	padding: 0;
	width: <?php echo $custom_logo_width; ?>px;
	height:<?php echo $custom_logo_height; ?>px;
	background: url(<?php echo $custom_logo; ?>) center 0 no-repeat;
	background-size: 100%;
	text-indent: -99999px;
}
</style>
<?php
}
add_action( 'wp_head', 'namba_print_custom_logo_style' );
