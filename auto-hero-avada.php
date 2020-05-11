<?php

/**
 * This file is read by WordPress to generate the plugin information 
 * in the plugin admin area.
 *
 * @link              https://caughtmyeye.cc
 * @since             1.0.0
 * @package           Auto_Hero_Avada
 *
 * @wordpress-plugin
 * Plugin Name:       Auto Hero Avada
 * Plugin URI:        https://github.com/marklchaves/auto-hero-avada
 * Description:       For the Avada theme, sets the title bar background image directly from the page or post feature image.
 * Version:           1.0.0
 * Author:            caught my eye
 * Author URI:        https://caughtmyeye.cc
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       auto-hero-avada
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'AUTO_HERO_AVADA_VERSION', '1.0.0' );

function auto_hero($content_type, $alignment) {
	global $post;
	$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
	
	// Only apply custom CSS if there's a feature image. ~cme 7 May 2020
	if ( $backgroundImg ) : 
		echo '<div 
		class="fusion-page-title-bar fusion-page-title-bar-' . esc_attr( $content_type ) . ' fusion-page-title-bar-' . esc_attr( $alignment ) . ' fusion-page-title-bar--overlay fusion-page-title-bar--background" 
		style="background-image: url(' . $backgroundImg[0] . '); ">';

	// If no feature image, then use default theme settings.
	else : 
		echo '<div 
		class="fusion-page-title-bar fusion-page-title-bar-' . esc_attr( $content_type ) . ' fusion-page-title-bar-' . esc_attr( $alignment ) . '">';
	endif;
}
add_action( 'avada_feature2hero', 'auto_hero', 10, 2 );