<?php
/**
 * Template for displaying the search forms
 *
 * @package Namba
 * @since Namba 1.0
 */
?>

<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" class="field" name="s" id="s" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'namba' ); ?>" />
	<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'namba' ); ?>" />
</form>