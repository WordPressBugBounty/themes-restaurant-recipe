<?php
/**
 * Restaurant Recipe Theme Customizer.
 *
 * @package Acme Themes
 * @subpackage Restaurant Recipe
 */

/*
* file for upgrade to pro
*/
require restaurant_recipe_file_directory('acmethemes/customizer/customizer-pro/class-customize.php');
/*
* file for customizer core functions
*/
require restaurant_recipe_file_directory('acmethemes/customizer/customizer-core.php');

/*
* file for customizer sanitization functions
*/
require restaurant_recipe_file_directory('acmethemes/customizer/sanitize-functions.php');

/**
 * Adding different options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function restaurant_recipe_customize_register( $wp_customize ) {

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    /*saved options*/
    $options  = restaurant_recipe_get_theme_options();

    /*defaults options*/
    $defaults = restaurant_recipe_get_default_theme_options();

    /*custom controls*/
    require restaurant_recipe_file_directory('acmethemes/customizer/custom-controls.php');
	require restaurant_recipe_file_directory('acmethemes/customizer/customizer-repeater/customizer-control-repeater.php');

    /*
     * file for feature panel of home page
     */
    require restaurant_recipe_file_directory('acmethemes/customizer/feature-section/feature-panel.php');

    /*
    * file for header panel
    */
    require restaurant_recipe_file_directory('acmethemes/customizer/header-options/header-panel.php');

    /*
    * file for customizer footer section
    */
    require restaurant_recipe_file_directory('acmethemes/customizer/footer-options/footer-panel.php');

    /*
    * file for design/layout panel
    */
    require restaurant_recipe_file_directory('acmethemes/customizer/design-options/design-panel.php');

	/*
   * file for single panel
   */
	require restaurant_recipe_file_directory('acmethemes/customizer/single-posts/single-post-panel.php');

    /*
     * file for options panel
     */
    require restaurant_recipe_file_directory('acmethemes/customizer/options/options-panel.php');

	/*woocommerce options*/
	if ( restaurant_recipe_is_woocommerce_active() ) :
		require_once restaurant_recipe_file_directory('acmethemes/customizer/wc-options/wc-panel.php');
	endif;

    /*sorting core and widget for ease of theme use*/
    $wp_customize->get_section( 'static_front_page' )->priority = 10;
    
    $restaurant_recipe_home_section = $wp_customize->get_section( 'sidebar-widgets-restaurant-recipe-home' );
    if ( ! empty( $restaurant_recipe_home_section ) ) {
        $restaurant_recipe_home_section->panel         = '';
        $restaurant_recipe_home_section->title         = esc_html__( 'Home Main Content Area ', 'restaurant-recipe' );
        $restaurant_recipe_home_section->priority      = 80;
    }

    /*customizing default colors section and adding new controls-setting too*/
    $wp_customize->get_section( 'colors' )->panel = 'restaurant-recipe-design-panel';
    $wp_customize->get_section( 'colors' )->title = esc_html__( 'Basic Color', 'restaurant-recipe' );
    $wp_customize->get_section( 'background_image' )->priority = 100;

    /*Background Image*/
    $wp_customize->get_section( 'background_image' )->panel = 'restaurant-recipe-design-panel';
    $wp_customize->get_section( 'background_image' )->priority = 60;

    /*adding header image inside this panel*/
    $wp_customize->get_section( 'header_image' )->panel = 'restaurant-recipe-header-panel';
    $wp_customize->get_section( 'header_image' )->description = esc_html__( 'Applied to header image of inner pages.', 'restaurant-recipe' );

    /*TODO 5.8 WP*/
    /*$restaurant_recipe_popup_widget_area = $wp_customize->get_section( 'sidebar-widgets-popup-widget-area' );
    if ( ! empty( $restaurant_recipe_popup_widget_area ) ) {
        $restaurant_recipe_popup_widget_area->panel = 'restaurant-recipe-header-panel';
        $restaurant_recipe_popup_widget_area->title = esc_html__( 'Popup Widgets', 'restaurant-recipe' );
        $restaurant_recipe_popup_widget_area->priority = 999;

        $restaurant_recipe_popup_widget_title = $wp_customize->get_control( 'restaurant_recipe_theme_options[restaurant-recipe-popup-widget-title]' );
        if ( ! empty( $restaurant_recipe_popup_widget_title ) ) {
            $restaurant_recipe_popup_widget_title->section  = 'sidebar-widgets-popup-widget-area';
            $restaurant_recipe_popup_widget_title->priority = -1;
        }
    }*/
}
add_action( 'customize_register', 'restaurant_recipe_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function restaurant_recipe_customize_preview_js() {
    wp_enqueue_script( 'restaurant-recipe-customizer', get_template_directory_uri() . '/acmethemes/core/js/customizer.js', array( 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'restaurant_recipe_customize_preview_js' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function restaurant_recipe_customize_controls_scripts() {
    wp_enqueue_script( 'restaurant-recipe-customizer-controls', get_template_directory_uri() . '/acmethemes/core/js/customizer-controls.js', array( 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'restaurant_recipe_customize_controls_scripts' );