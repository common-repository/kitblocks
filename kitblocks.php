<?php
/**
 * Plugin Name: KitBlocks.
 * Description: KitBlocks is design block  for WordPress Gutenberg Block.
 * Plugin URI:  http://kitbug.com/
 * Version:     1.0.1
 * License:     GPL2
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 * Author:      KitBug
 * Author URI:  https://profiles.wordpress.org/kitbug/
 * Text Domain: kitblocks
 */

// Exit if accessed directly.
// KITBLOCKS kitblocks kitblocks

if (!defined('ABSPATH')) {
    exit;
}
define('KITBLOCKS_VERSION', '1.0.1');
define( 'KITBLOCKS_PLUGIN_DIR', dirname( __FILE__ ) . '/' );

if ( ! defined( 'KITBLOCKS_PLUGIN_URI' ) ) {
	define( 'KITBLOCKS_PLUGIN_URI', plugin_dir_url( __FILE__ ) );
}

if ( ! function_exists( 'kitblocks_setup' ) ) :
function kitblocks_setup() {
    add_image_size( 'kitblocks-blog-grid', 415, 415, true );
}
endif;
add_action( 'after_setup_theme', 'kitblocks_setup' );

require_once KITBLOCKS_PLUGIN_DIR  . 'function/kitblocks-scripts.php';
require_once KITBLOCKS_PLUGIN_DIR  . 'function/blocks-cat.php';
require_once KITBLOCKS_PLUGIN_DIR  . 'function/carbon-loader.php';
require_once KITBLOCKS_PLUGIN_DIR  . 'includes/banner-block-simple/banner-block-simple.php';
require_once KITBLOCKS_PLUGIN_DIR  . 'includes/simple-shortcode-area-two/simple-shortcode-area-two.php';
require_once KITBLOCKS_PLUGIN_DIR  . 'includes/simple-testimonial-area/simple-testimonial-area.php';
require_once KITBLOCKS_PLUGIN_DIR  . 'includes/simple-slider-area-two/simple-slider-area-two.php';
require_once KITBLOCKS_PLUGIN_DIR  . 'includes/simple-blog-area/simple-blog-area.php';
