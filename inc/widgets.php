<?php
/**
 * Available Namba Custom Widgets
 *
 * Learn more: http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * @package Namba
 * @since Namba 1.0
 */

/*-----------------------------------------------------------------------------------*/
/* Namba Social Links Widget
/*-----------------------------------------------------------------------------------*/

 class namba_sociallinks extends WP_Widget {
	
	public function __construct() {
		parent::__construct( 'namba_sociallinks', __( 'Social Links (Namba)', 'namba' ), array(
			'classname'   => 'widget_namba_sociallinks',
			'description' => __( 'Show icons with links to your social profiles', 'namba' ),
		) );
	}

	public function widget($args, $instance) {
		extract( $args );
		$title = $instance['title'];
		$twitter = $instance['twitter'];
		$facebook = $instance['facebook'];
		$googleplus = $instance['googleplus'];
		$appnet = $instance['appnet'];
		$flickr = $instance['flickr'];
		$instagram = $instance['instagram'];
		$picasa = $instance['picasa'];
		$fivehundredpx = $instance['fivehundredpx'];
		$youtube = $instance['youtube'];
		$vimeo = $instance['vimeo'];
		$dribbble = $instance['dribbble'];
		$ffffound = $instance['ffffound'];
		$pinterest = $instance['pinterest'];
		$behance = $instance['behance'];
		$deviantart = $instance['deviantart'];
		$squidoo = $instance['squidoo'];
		$slideshare = $instance['slideshare'];
		$lastfm = $instance['lastfm'];
		$grooveshark = $instance['grooveshark'];
		$soundcloud = $instance['soundcloud'];
		$foursquare = $instance['foursquare'];
		$github = $instance['github'];
		$linkedin = $instance['linkedin'];
		$xing = $instance['xing'];
		$wordpress = $instance['wordpress'];
		$tumblr = $instance['tumblr'];
		$rss = $instance['rss'];
		$rsscomments = $instance['rsscomments'];

		echo $before_widget; ?>
		<?php if($title != '')
			echo '<h3 class="widget-title"><span>'.$title.'</span></h3>'; ?>

        <ul class="sociallinks">
			<?php
			if($twitter != ''){
				echo '<li><a href="'.esc_url( $twitter ).'" class="twitter" title="' . __( 'Twitter', 'namba' ) . '">' . __( 'Twitter', 'namba' ) . '</a></li>';
			}
			?>

			<?php
			if($facebook != '') {
				echo '<li><a href="'.esc_url( $facebook ).'" class="facebook" title="' . __( 'Facebook', 'namba' ) . '">' . __( 'Facebook', 'namba' ) . '</a></li>';
			}
			?>

			<?php
			if($googleplus != '') {
				echo '<li><a href="'.esc_url( $googleplus ).'" class="googleplus" title="' . __( 'Google+', 'namba' ) . '">' . __( 'Google+', 'namba' ) . '</a></li>';
			}
			?>

			<?php
			if($appnet != '') {
				echo '<li><a href="'.esc_url( $appnet ).'" class="appnet" title="' . __( 'App.net', 'namba' ) . '">' . __( 'App.net', 'namba' ) . '</a></li>';
			}
			?>

			<?php if($flickr != '') {
				echo '<li><a href="'.esc_url( $flickr ).'" class="flickr" title="' . __( 'Flickr', 'namba' ) . '">' . __( 'Flickr', 'namba' ) . '</a></li>';
			}
			?>

			<?php if($instagram != '') {
				echo '<li><a href="'.esc_url( $instagram ).'" class="instagram" title="' . __( 'Instagram', 'namba' ) . '">' . __( 'Instagram', 'namba' ) . '</a></li>';
			}
			?>

			<?php if($picasa != '') {
				echo '<li><a href="'.esc_url( $picasa ).'" class="picasa" title="' . __( 'Picasa', 'namba' ) . '">' . __( 'Picasa', 'namba' ) . '</a></li>';
			}
			?>

			<?php if($fivehundredpx != '') {
				echo '<li><a href="'.esc_url( $fivehundredpx ).'" class="fivehundredpx" title="' . __( '500px', 'namba' ) . '">' . __( '500px', 'namba' ) . '</a></li>';
			}
			?>

			<?php if($youtube != '') {
				echo '<li><a href="'.esc_url( $youtube ).'" class="youtube" title="' . __( 'YouTube', 'namba' ) . '">' . __( 'YouTube', 'namba' ) . '</a></li>';
			}
			?>

			<?php if($vimeo != '') {
				echo '<li><a href="'.esc_url( $vimeo ).'" class="vimeo" title="' . __( 'Vimeo', 'namba' ) . '">' . __( 'Vimeo', 'namba' ) . '</a></li>';
			}
			?>

			<?php if($dribbble != '') {
				echo '<li><a href="'.esc_url( $dribbble ).'" class="dribbble" title="' . __( 'Dribbble', 'namba' ) . '">' . __( 'Dribbble', 'namba' ) . '</a></li>';
			}
			?>

			<?php if($ffffound != '') {
				echo '<li><a href="'.esc_url( $ffffound ).'" class="ffffound" title="' . __( 'Ffffound', 'namba' ) . '">' . __( 'Ffffound', 'namba' ) . '</a></li>';
			}
			?>

			<?php if($pinterest != '') {
				echo '<li><a href="'.esc_url( $pinterest ).'" class="pinterest" title="' . __( 'Pinterest', 'namba' ) . '">' . __( 'Pinterest', 'namba' ) . '</a></li>';
			}
			?>

			<?php if($behance != '') {
				echo '<li><a href="'.esc_url( $behance ).'" class="behance" title="' . __( 'Behance Network', 'namba' ) . '">' . __( 'Behance Network', 'namba' ) . '</a></li>';
			}
			?>

			<?php if($deviantart != '') {
				echo '<li><a href="'.esc_url( $deviantart ).'" class="deviantart" title="' . __( 'deviantART', 'namba' ) . '">' . __( 'deviantART', 'namba' ) . '</a></li>';
			}
			?>

			<?php if($squidoo != '') {
				echo '<li><a href="'.esc_url( $squidoo ).'" class="squidoo" title="' . __( 'Squidoo', 'namba' ) . '">' . __( 'Squidoo', 'namba' ) . '</a></li>';
			}
			?>

			<?php if($slideshare != '') {
				echo '<li><a href="'.esc_url( $slideshare ).'" class="slideshare" title="' . __( 'Slideshare', 'namba' ) . '">' . __( 'Slideshare', 'namba' ) . '</a></li>';
			}
			?>

			<?php if($lastfm != '') {
				echo '<li><a href="'.esc_url( $lastfm ).'" class="lastfm" title="' . __( 'Lastfm', 'namba' ) . '">' . __( 'Lastfm', 'namba' ) . '</a></li>';
			}
			?>

			<?php if($grooveshark != '') {
				echo '<li><a href="'.esc_url( $grooveshark ).'" class="grooveshark" title="' . __( 'Grooveshark', 'namba' ) . '">' . __( 'Grooveshark', 'namba' ) . '</a></li>';
			}
			?>

			<?php if($soundcloud != '') {
				echo '<li><a href="'.esc_url( $soundcloud ).'" class="soundcloud" title="' . __( 'Soundcloud', 'namba' ) . '">' . __( 'Soundcloud', 'namba' ) . '</a></li>';
			}
			?>

			<?php if($foursquare != '') {
				echo '<li><a href="'.esc_url( $foursquare ).'" class="foursquare" title="' . __( 'Foursquare', 'namba' ) . '">' . __( 'Foursquare', 'namba' ) . '</a></li>';
			}
			?>

			<?php if($github != '') {
				echo '<li><a href="'.esc_url( $github ).'" class="github" title="' . __( 'GitHub', 'namba' ) . '">' . __( 'GitHub', 'namba' ) . '</a></li>';
			}
			?>

			<?php if($linkedin != '') {
				echo '<li><a href="'.esc_url( $linkedin ).'" class="linkedin" title="' . __( 'LinkedIn', 'namba' ) . '">' . __( 'LinkedIn', 'namba' ) . '</a></li>';
			}
			?>

			<?php if($xing != '') {
				echo '<li><a href="'.esc_url( $xing ).'" class="xing" title="' . __( 'Xing', 'namba' ) . '">' . __( 'Xing', 'namba' ) . '</a></li>';
			}
			?>

			<?php if($wordpress != '') {
				echo '<li><a href="'.esc_url( $wordpress ).'" class="wordpress" title="' . __( 'WordPress', 'namba' ) . '">' . __( 'WordPress', 'namba' ) . '</a></li>';
			}
			?>

			<?php if($tumblr != '') {
				echo '<li><a href="'.esc_url( $tumblr ).'" class="tumblr" title="' . __( 'Tumblr', 'namba' ) . '">' . __( 'Tumblr', 'namba' ) . '</a></li>';
			}
			?>

			<?php if($rss != '') {
				echo '<li><a href="'.$rss.'" class="rss" title="' . __( 'RSS Feed', 'namba' ) . '">' . __( 'RSS Feed', 'namba' ) . '</a></li>';
			}
			?>

			<?php if($rsscomments != '') {
				echo '<li><a href="'.$rsscomments.'" class="rsscomments" title="' . __( 'RSS Comments', 'namba' ) . '">' . __( 'RSS Comments', 'namba' ) . '</a></li>';
			}
			?>
		</ul><!-- end .sociallinks -->

	   <?php
	   echo $after_widget;

	   // Reset the post globals as this query will have stomped on it
	   wp_reset_postdata();

   }

   function update($new_instance, $old_instance) {
       return $new_instance;
   }

   function form($instance) {
		$title = esc_attr($instance['title']);
		$twitter = esc_attr($instance['twitter']);
		$facebook = esc_attr($instance['facebook']);
		$googleplus = esc_attr($instance['googleplus']);
		$appnet = esc_attr($instance['appnet']);
		$flickr = esc_attr($instance['flickr']);
		$instagram = esc_attr($instance['instagram']);
		$picasa = esc_attr($instance['picasa']);
		$fivehundredpx = esc_attr($instance['fivehundredpx']);
		$youtube = esc_attr($instance['youtube']);
		$vimeo = esc_attr($instance['vimeo']);
		$dribbble = esc_attr($instance['dribbble']);
		$ffffound = esc_attr($instance['ffffound']);
		$pinterest = esc_attr($instance['pinterest']);
		$behance = esc_attr($instance['behance']);
		$deviantart = esc_attr($instance['deviantart']);
		$squidoo = esc_attr($instance['squidoo']);
		$slideshare = esc_attr($instance['slideshare']);
		$lastfm = esc_attr($instance['lastfm']);
		$grooveshark = esc_attr($instance['grooveshark']);
		$soundcloud = esc_attr($instance['soundcloud']);
		$foursquare = esc_attr($instance['foursquare']);
		$github = esc_attr($instance['github']);
		$linkedin = esc_attr($instance['linkedin']);
		$xing = esc_attr($instance['xing']);
		$wordpress = esc_attr($instance['wordpress']);
		$tumblr = esc_attr($instance['tumblr']);
		$rss = esc_attr($instance['rss']);
		$rsscomments = esc_attr($instance['rsscomments']);

		?>

		 <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('twitter'); ?>" value="<?php echo $twitter; ?>" class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('facebook'); ?>" value="<?php echo $facebook; ?>" class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('googleplus'); ?>"><?php _e('Google+ URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('googleplus'); ?>" value="<?php echo $googleplus; ?>" class="widefat" id="<?php echo $this->get_field_id('googleplus'); ?>" />
        </p>

		  <p>
            <label for="<?php echo $this->get_field_id('appnet'); ?>"><?php _e('App.net URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('appnet'); ?>" value="<?php echo $appnet; ?>" class="widefat" id="<?php echo $this->get_field_id('appnet'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('flickr'); ?>"><?php _e('Flickr URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('flickr'); ?>" value="<?php echo $flickr; ?>" class="widefat" id="<?php echo $this->get_field_id('flickr'); ?>" />
        </p>

		 <p>
            <label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('instagram'); ?>" value="<?php echo $instagram; ?>" class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('picasa'); ?>"><?php _e('Picasa URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('picasa'); ?>" value="<?php echo $picasa; ?>" class="widefat" id="<?php echo $this->get_field_id('picasa'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('fivehundredpx'); ?>"><?php _e('500px URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('fivehundredpx'); ?>" value="<?php echo $fivehundredpx; ?>" class="widefat" id="<?php echo $this->get_field_id('fivehundredpx'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('YouTube URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('youtube'); ?>" value="<?php echo $youtube; ?>" class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('vimeo'); ?>"><?php _e('Vimeo URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('vimeo'); ?>" value="<?php echo $vimeo; ?>" class="widefat" id="<?php echo $this->get_field_id('vimeo'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('dribbble'); ?>"><?php _e('Dribbble URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('dribbble'); ?>" value="<?php echo $dribbble; ?>" class="widefat" id="<?php echo $this->get_field_id('dribbble'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('ffffound'); ?>"><?php _e('Ffffound URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('ffffound'); ?>" value="<?php echo $ffffound; ?>" class="widefat" id="<?php echo $this->get_field_id('ffffound'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php _e('Pinterest URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('pinterest'); ?>" value="<?php echo $pinterest; ?>" class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('behance'); ?>"><?php _e('Behance Network URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('behance'); ?>" value="<?php echo $behance; ?>" class="widefat" id="<?php echo $this->get_field_id('behance'); ?>" />
        </p>

		 <p>
            <label for="<?php echo $this->get_field_id('deviantart'); ?>"><?php _e('deviantART URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('deviantart'); ?>" value="<?php echo $deviantart; ?>" class="widefat" id="<?php echo $this->get_field_id('deviantart'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('squidoo'); ?>"><?php _e('Squidoo URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('squidoo'); ?>" value="<?php echo $squidoo; ?>" class="widefat" id="<?php echo $this->get_field_id('squidoo'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('slideshare'); ?>"><?php _e('Slideshare URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('slideshare'); ?>" value="<?php echo $slideshare; ?>" class="widefat" id="<?php echo $this->get_field_id('slideshare'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('lastfm'); ?>"><?php _e('Last.fm URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('lastfm'); ?>" value="<?php echo $lastfm; ?>" class="widefat" id="<?php echo $this->get_field_id('lastfm'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('grooveshark'); ?>"><?php _e('Grooveshark URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('grooveshark'); ?>" value="<?php echo $grooveshark; ?>" class="widefat" id="<?php echo $this->get_field_id('grooveshark'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('soundcloud'); ?>"><?php _e('Soundcloud URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('soundcloud'); ?>" value="<?php echo $soundcloud; ?>" class="widefat" id="<?php echo $this->get_field_id('soundcloud'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('foursquare'); ?>"><?php _e('Foursquare URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('foursquare'); ?>" value="<?php echo $foursquare; ?>" class="widefat" id="<?php echo $this->get_field_id('foursquare'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('github'); ?>"><?php _e('GitHub URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('github'); ?>" value="<?php echo $github; ?>" class="widefat" id="<?php echo $this->get_field_id('github'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linkedin URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('linkedin'); ?>" value="<?php echo $linkedin; ?>" class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('xing'); ?>"><?php _e('Xing URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('xing'); ?>" value="<?php echo $xing; ?>" class="widefat" id="<?php echo $this->get_field_id('xing'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('wordpress'); ?>"><?php _e('WordPress URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('wordpress'); ?>" value="<?php echo $wordpress; ?>" class="widefat" id="<?php echo $this->get_field_id('wordpress'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('tumblr'); ?>"><?php _e('Tumblr URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('tumblr'); ?>" value="<?php echo $tumblr; ?>" class="widefat" id="<?php echo $this->get_field_id('tumblr'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('rss'); ?>"><?php _e('RSS-Feed URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('rss'); ?>" value="<?php echo $rss; ?>" class="widefat" id="<?php echo $this->get_field_id('rss'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('rsscomments'); ?>"><?php _e('RSS for Comments URL:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('rsscomments'); ?>" value="<?php echo $rsscomments; ?>" class="widefat" id="<?php echo $this->get_field_id('rsscomments'); ?>" />
        </p>

		<?php
	}
}

/*-----------------------------------------------------------------------------------*/
/* Namba Recent Posts Widget
/*-----------------------------------------------------------------------------------*/

class namba_recentposts extends WP_Widget {

	public function __construct() {
		parent::__construct( 'namba_recentposts', __( 'Recent Posts by Category (Namba)', 'namba' ), array(
			'classname'   => 'widget_namba_recentposts',
			'description' => __( 'A number of Recent Posts filtered by category', 'namba' ),
		) );
	}

	public function widget($args, $instance) {
		extract( $args );
		$title = $instance['title'];
		$postnumber = $instance['postnumber'];
		$cat = apply_filters('widget_title', $instance['cat']);

		echo $before_widget; ?>
		<?php if($title != '')
			echo '<h3 class="widget-title"><span>'.$title.'</span></h3>'; ?>

			<ul class="namba-rp">
				<?php
				global $post;
				$namba_post = $post;

				// get the category IDs and the number of posts and place them in an array
				if($cat) {
					$args = array(
						'posts_per_page' => $postnumber,
						'cat' => $cat,
					);
				} else {
					$args = array(
						'posts_per_page' => $postnumber,
					);
				}

				$myposts = get_posts( $args );
				foreach( $myposts as $post ) : setup_postdata($post); ?>

					<li class="rp-box">
						<?php if ( '' != get_the_post_thumbnail() ) : ?>
							<div class="rp-thumbnail">
								<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'namba' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
							</div>
						<?php endif; ?>

							<?php if ( has_post_format( 'Image' ) ) : ?>
								<div class="rp-meta-image">
									<div class="rp-pf"><a href="<?php the_permalink(); ?>" class="rp-pf-image"><?php _e( 'Image', 'namba' ); ?></a>
								</div>
							<?php elseif ( has_post_format( 'link' ) ) : ?>
								<div class="rp-meta-link">
									<div class="rp-pf"><a href="<?php the_permalink(); ?>" class="rp-pf-link"><?php _e( 'Link', 'namba' ); ?></a>
								</div>
							<?php elseif ( has_post_format( 'gallery' ) ) : ?>
								<div class="rp-meta-gallery">
									<div class="rp-pf"><a href="<?php the_permalink(); ?>" class="rp-pf-gallery"><?php _e( 'Gallery', 'namba' ); ?></a>
								</div>
							<?php elseif ( has_post_format( 'quote' ) ) : ?>
								<div class="rp-meta-quote">
									<div class="rp-pf"><a href="<?php the_permalink(); ?>" class="rp-pf-quote"><?php _e( 'Quote', 'namba' ); ?></a>
								</div>
							<?php elseif ( has_post_format( 'video' ) ) : ?>
								<div class="rp-meta-video">
									<div class="rp-pf"><a href="<?php the_permalink(); ?>" class="rp-pf-video"><?php _e( 'Video', 'namba' ); ?></a>
								</div>
							<?php elseif ( has_post_format( 'audio' ) ) : ?>
								<div class="rp-meta-audio">
									<div class="rp-pf"><a href="<?php the_permalink(); ?>" class="rp-pf-audio"><?php _e( 'Audio', 'namba' ); ?></a>
								</div>
							<?php elseif ( has_post_format( 'status' ) ) : ?>
								<div class="rp-meta-status">
									<div class="rp-pf"><a href="<?php the_permalink(); ?>" class="rp-pf-status"><?php _e( 'Status', 'namba' ); ?></a>
								</div>
							<?php else : ?>
								<div class="rp-meta-standard">
									<div class="rp-pf"><a href="<?php the_permalink(); ?>" class="rp-pf-standard"><?php _e( 'Standard', 'namba' ); ?></a>
								</div>
							<?php endif;  // has_post_format() ?>
								<div class="rp-date">
									<a href="<?php the_permalink(); ?>" class="entry-date"><?php echo get_the_date(); ?></a>
								</div>
							<?php if ( comments_open() ) : ?>
								<div class="rp-comments">
									<?php comments_popup_link( '<span class="leave-reply">' . __( 'comments 0', 'namba' ) . '</span>', __( 'comment 1', 'namba' ), __( 'comments %', 'namba' ) ); ?>
								</div><!-- end .rp-comments -->
							<?php endif; // comments_open() ?>
						</div><!-- end .rp-meta -->
						<h4 class="rp-entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<div class="rp-text"><?php the_excerpt(); ?></div>
					</li>
					<?php endforeach; ?>
					<?php $post = $namba_post; ?>
			</ul><!-- end .namba-rp -->
	   <?php
	   echo $after_widget;

	   // Reset the post globals as this query will have stomped on it
	   wp_reset_postdata();

   }

   function update($new_instance, $old_instance) {
       return $new_instance;
   }

   function form($instance) {
   		$title = esc_attr($instance['title']);
   		$postnumber = esc_attr($instance['postnumber']);
		$cat = esc_attr($instance['cat']);
		?>

		 <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>

		 <p>
            <label for="<?php echo $this->get_field_id('postnumber'); ?>"><?php _e('Number of posts to display:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('postnumber'); ?>" value="<?php echo $postnumber; ?>" class="widefat" id="<?php echo $this->get_field_id('postnumber'); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e('Category ID numbers (to choose which categories to include):','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('cat'); ?>" value="<?php echo $cat; ?>" class="widefat" id="<?php echo $this->get_field_id('cat'); ?>" />
        </p>

		<?php
	}
}

/*-----------------------------------------------------------------------------------*/
/* Namba Post Formats (circles) Widget
/*-----------------------------------------------------------------------------------*/

class namba_postformats extends WP_Widget {

	public function __construct() {
		parent::__construct( 'namba_postformats', __( 'Post Formats (Namba)', 'namba' ), array(
			'classname'   => 'widget_namba_postformats',
			'description' => __( 'A list of Post Formats', 'namba' ),
		) );
	}

	public function widget($args, $instance) {
		extract( $args );
		$title = $instance['title'];
		$pfimage = isset( $instance['pfimage'] );
		$pfgallery = isset( $instance['pfgallery'] );
		$pfquote = isset( $instance['pfquote'] );
		$pfstatus = isset( $instance['pfstatus'] );
		$pflink = isset( $instance['pflink'] );
		$pfvideo= isset( $instance['pfvideo'] );
		$pfaudio = isset( $instance['pfaudio'] );

		echo $before_widget; ?>
		<?php if($title != '')
			echo '<h3 class="widget-title"><span>'.$title.'</span></h3>'; ?>

			<ul class="namba-postformats">
			<?php  if ( $pfimage AND $pfimage == '1' ) : ?>
				<li class="pf-image-archive"><a href="<?php echo get_post_format_link('image'); ?>"><?php _e(' Image', 'namba'); ?></a></li>
			<?php endif; ?>
			<?php  if ( $pfgallery AND $pfgallery == '1' ) : ?>
				<li class="pf-gallery-archive"><a href="<?php echo get_post_format_link('gallery'); ?>"><?php _e(' Gallery', 'namba'); ?></a></li>
			<?php endif; ?>
			<?php  if ( $pfquote AND $pfquote == '1' ) : ?>
				<li class="pf-quote-archive"><a href="<?php echo get_post_format_link('quote'); ?>"><?php _e(' Quote', 'namba'); ?></a></li>
			<?php endif; ?>
			<?php  if ( $pfstatus AND $pfstatus == '1' ) : ?>
				<li class="pf-status-archive"><a href="<?php echo get_post_format_link('status'); ?>"><?php _e(' Status', 'namba'); ?></a></li>
			<?php endif; ?>
			<?php  if ( $pflink AND $pflink == '1' ) : ?>
				<li class="pf-link-archive"><a href="<?php echo get_post_format_link('link'); ?>"><?php _e(' Link', 'namba'); ?></a></li>
			<?php endif; ?>
			<?php  if ( $pfvideo AND $pfvideo == '1' ) : ?>
				<li class="pf-video-archive"><a href="<?php echo get_post_format_link('video'); ?>"><?php _e(' Video', 'namba'); ?></a></li>
			<?php endif; ?>
			<?php  if ( $pfaudio AND $pfaudio == '1' ) : ?>
				<li class="pf-audio-archive"><a href="<?php echo get_post_format_link('audio'); ?>"><?php _e(' Audio', 'namba'); ?></a></li>
			<?php endif; ?>
			</ul><!-- end .namba-postformats -->
	   <?php
	   echo $after_widget;

	   // Reset the post globals as this query will have stomped on it
	   wp_reset_postdata();

   }

   function update($new_instance, $old_instance) {
       return $new_instance;
   }

   function form( $instance ) {
   		$title = esc_attr ( $instance['title'] );
   		$pfimage = isset( $instance['pfimage'] );
   		$pfgallery = isset( $instance['pfgallery'] );
   		$pfquote = isset( $instance['pfquote'] );
   		$pfstatus = isset( $instance['pfstatus'] );
   		$pflink = isset( $instance['pflink'] );
   		$pfvideo = isset( $instance['pfvideo'] );
   		$pfaudio = isset( $instance['pfaudio'] );

		?>

		 <p>
            <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php _e( 'Title:','namba' ); ?></label>
           <input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
          </p>

		<p>
			<input id="<?php echo $this->get_field_id('pfimage'); ?>" name="<?php echo $this->get_field_name('pfimage'); ?>" type="checkbox" value="1" <?php 	checked( '1', $pfimage ); ?> />
			<label for="<?php echo $this->get_field_id('pfimage'); ?>"><?php _e(' Image', 'namba'); ?></label>
		</p>

		<p>
			<input id="<?php echo $this->get_field_id('pfgallery'); ?>" name="<?php echo $this->get_field_name('pfgallery'); ?>" type="checkbox" value="1" <?php 	checked( '1', $pfgallery ); ?> />
			<label for="<?php echo $this->get_field_id('pfgallery'); ?>"><?php _e('Gallery', 'namba'); ?></label>
		</p>

		<p>
			<input id="<?php echo $this->get_field_id('pfquote'); ?>" name="<?php echo $this->get_field_name('pfquote'); ?>" type="checkbox" value="1" <?php 	checked( '1', $pfquote ); ?> />
			<label for="<?php echo $this->get_field_id('pfquote'); ?>"><?php _e('Quote', 'namba'); ?></label>
		</p>

		<p>
			<input id="<?php echo $this->get_field_id('pfstatus'); ?>" name="<?php echo $this->get_field_name('pfstatus'); ?>" type="checkbox" value="1" <?php 	checked( '1', $pfstatus ); ?> />
			<label for="<?php echo $this->get_field_id('pfstatus'); ?>"><?php _e('Status', 'namba'); ?></label>
		</p>

		<p>
			<input id="<?php echo $this->get_field_id('pflink'); ?>" name="<?php echo $this->get_field_name('pflink'); ?>" type="checkbox" value="1" <?php 	checked( '1', $pflink ); ?> />
			<label for="<?php echo $this->get_field_id('pflink'); ?>"><?php _e('Link', 'namba'); ?></label>
		</p>

		<p>
			<input id="<?php echo $this->get_field_id('pfvideo'); ?>" name="<?php echo $this->get_field_name('pfvideo'); ?>" type="checkbox" value="1" <?php 	checked( '1', $pfvideo ); ?> />
			<label for="<?php echo $this->get_field_id('pfvideo'); ?>"><?php _e('Video', 'namba'); ?></label>
		</p>

		<p>
			<input id="<?php echo $this->get_field_id('pfaudio'); ?>" name="<?php echo $this->get_field_name('pfaudio'); ?>" type="checkbox" value="1" <?php 	checked( '1', $pfaudio ); ?> />
			<label for="<?php echo $this->get_field_id('pfaudio'); ?>"><?php _e('Audio', 'namba'); ?></label>
		</p>

		<?php
	}
}

/*-----------------------------------------------------------------------------------*/
/* Namba Headlines Widget
/*-----------------------------------------------------------------------------------*/

class namba_headlines extends WP_Widget {
	
	public function __construct() {
		parent::__construct( 'namba_headlines', __( 'Headlines (Namba)', 'namba' ), array(
			'classname'   => 'widget_namba_headlines',
			'description' => __( 'A Sub Headline for the Main Content Widget Areas', 'namba' ),
		) );
	}

	public function widget($args, $instance) {
		extract( $args );
		$title = $instance['title'];
		$before_widget = '<div class="widget widget_namba_headlines">';
		$after_widget = '</div>';

		echo $before_widget; ?>
		<?php if($title != '')
			echo '<h2 class="widget-title"><span>'.$title.'</span></h2>'; ?>
	   <?php
	   echo $after_widget;

	   // Reset the post globals as this query will have stomped on it
	   wp_reset_postdata();

   }

   function update($new_instance, $old_instance) {
       return $new_instance;
   }

   function form($instance) {
   		$title = esc_attr($instance['title']);

		?>

		 <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','namba'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>



		<?php
	}
}

/**
 * Registered on widgets_init, which is where WordPress asks for it.
 * At file scope the widget's constructor translated its own name before
 * init, which WordPress 6.7 reports on every request.
 */
function namba_register_widgets() {
	register_widget( 'namba_sociallinks' );
	register_widget( 'namba_recentposts' );
	register_widget( 'namba_postformats' );
	register_widget( 'namba_headlines' );
}
add_action( 'widgets_init', 'namba_register_widgets' );
