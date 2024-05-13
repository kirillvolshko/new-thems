<?php
/**
 * prometheus-new functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage prometheus-new
 * @since prometheus-new 1.0
 */

/**
 * Table of Contents:
 * Theme Support
 * Required Files
 * Register Styles
 * Register Scripts
 * Register Menus
 * Custom Logo
 * WP Body Open
 * Register Sidebars
 * Enqueue Block Editor Assets
 * Enqueue Classic Editor Styles
 * Block Editor Settings
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
add_theme_support( 'elementor' );
require_once( get_template_directory() . '/widgets/class-main-content-container-widget.php' );
require_once( get_template_directory() . '/widgets/class-counter-content-container-widget.php' );
require_once( get_template_directory() . '/widgets/class-tabs-container-widget.php' );
require_once( get_template_directory() . '/widgets/class-course-list-swiper-widget.php' );
require_once( get_template_directory() . '/widgets/class-prometheus-plus-first-container-widget.php' );
require_once( get_template_directory() . '/widgets/class-prometheus-plus-second-container-widget.php' );
require_once( get_template_directory() . '/widgets/class-prometheus-plus-third-container-widget.php' );
require_once( get_template_directory() . '/widgets/class-bootcamp-programs-container-widget.php' );
require_once( get_template_directory() . '/widgets/class-feedbacks-container-widget.php' );
require_once( get_template_directory() . '/widgets/class-search-by-category-swiper-widget.php' );
require_once( get_template_directory() . '/widgets/class-create-course-content-container-widget.php' );
require_once( get_template_directory() . '/widgets/class-interesting-topics-container-widget.php' );
require_once( get_template_directory() . '/widgets/class-connect-us-container-widget.php' );

function my_tailwind_theme_styles() {
  wp_enqueue_style('tailwind-style', get_template_directory_uri(). './style.css', array(), '1.0');
}
add_action('wp_enqueue_scripts', 'my_tailwind_theme_styles');
