<?php
/**
 * Restaurant Recipe functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Acme Themes
 * @subpackage Restaurant Recipe
 */


/**
 * Default Theme layout options
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_theme_layout
 *
 */
if ( !function_exists('restaurant_recipe_get_default_theme_options') ) :
    function restaurant_recipe_get_default_theme_options() {

        $default_theme_options = array(

            /*logo and site title*/
            'restaurant-recipe-display-site-logo'      => '',
            'restaurant-recipe-display-site-title'     => 1,
            'restaurant-recipe-display-site-tagline'   => 1,

            /*header height*/
            'restaurant-recipe-header-height'          => 300,
            'restaurant-recipe-header-image-display'   => 'normal-image',

            /*header top*/
            'restaurant-recipe-enable-header-top'       => '',
            'restaurant-recipe-header-top-menu-display-selection'      => 'right',
            'restaurant-recipe-header-top-info-display-selection'      => 'left',
            'restaurant-recipe-header-top-social-display-selection'    => 'right',

            /*menu options*/
            'restaurant-recipe-menu-display-options'      => 'menu-default',
            'restaurant-recipe-enable-sticky'                  => '',
            'restaurant-recipe-menu-right-button-options'      => 'disable',
            'restaurant-recipe-menu-right-button-title'        => esc_html__('Book Table','restaurant-recipe'),
            'restaurant-recipe-menu-right-button-link'         => '',
            'restaurant-recipe-enable-cart-icon'               => '',

            /*feature section options*/
            'restaurant-recipe-enable-feature'                         => '',
            'restaurant-recipe-slides-data'                            => '',
            'restaurant-recipe-feature-slider-enable-animation'        => 1,
            'restaurant-recipe-feature-slider-display-title'           => 1,
            'restaurant-recipe-feature-slider-display-excerpt'         => 1,
            'restaurant-recipe-fs-image-display-options'               => 'full-screen-bg',
            'restaurant-recipe-feature-slider-text-align'              => 'text-left',
            'restaurant-recipe-slider-scroll-text'              => '',
            'restaurant-recipe-slider-scroll-link'              => '',

            /*basic info*/
            'restaurant-recipe-feature-info-number'    => 4,
            'restaurant-recipe-first-info-icon'        => 'fa-calendar',
            'restaurant-recipe-first-info-title'       => esc_html__('Send Us a Mail', 'restaurant-recipe'),
            'restaurant-recipe-first-info-desc'        => esc_html__('domain@example.com ', 'restaurant-recipe'),
            'restaurant-recipe-second-info-icon'       => 'fa-map-marker',
            'restaurant-recipe-second-info-title'      => esc_html__('Our Location', 'restaurant-recipe'),
            'restaurant-recipe-second-info-desc'       => esc_html__('Elmonte California', 'restaurant-recipe'),
            'restaurant-recipe-third-info-icon'        => 'fa-phone',
            'restaurant-recipe-third-info-title'       => esc_html__('Call Us', 'restaurant-recipe'),
            'restaurant-recipe-third-info-desc'        => esc_html__('01-23456789-10', 'restaurant-recipe'),
            'restaurant-recipe-forth-info-icon'        => 'fa-envelope-o',
            'restaurant-recipe-forth-info-title'       => esc_html__('Office Hours', 'restaurant-recipe'),
            'restaurant-recipe-forth-info-desc'        => esc_html__('8 hours per day', 'restaurant-recipe'),

            /*footer options*/
            'restaurant-recipe-footer-copyright'                       => esc_html__( '&copy; All right reserved', 'restaurant-recipe' ),
            'restaurant-recipe-footer-copyright-beside-option'         => 'footer-menu',
            'restaurant-recipe-enable-footer-power-text'               => 1,
            'restaurant-recipe-footer-site-info'                       => '',
            'restaurant-recipe-footer-bg-img'                          => '',

            /*layout/design options*/
            'restaurant-recipe-pagination-option'      => 'numeric',

            'restaurant-recipe-enable-animation'       => '',

            'restaurant-recipe-single-sidebar-layout'                  => 'right-sidebar',
            'restaurant-recipe-front-page-sidebar-layout'              => 'right-sidebar',
            'restaurant-recipe-archive-sidebar-layout'                 => 'right-sidebar',

            'restaurant-recipe-blog-archive-img-size'                  => 'full',
            'restaurant-recipe-blog-archive-content-from'              => 'excerpt',
            'restaurant-recipe-blog-archive-excerpt-length'            => 42,
            'restaurant-recipe-blog-archive-more-text'                 => esc_html__( 'Read More', 'restaurant-recipe' ),

            'restaurant-recipe-hide-front-page-content' => '',
            'restaurant-recipe-hide-front-page-header'  => '',

            'restaurant-recipe-primary-color'          => '#e6af4b',
            'restaurant-recipe-header-top-bg-color'    => '#1b1b1b',
            'restaurant-recipe-footer-bg-color'        => '#1b1b1b',
            'restaurant-recipe-footer-bottom-bg-color' => '#2d2d2d',
            'restaurant-recipe-link-color'             => '#e83d47',
            'restaurant-recipe-link-hover-color'       => '#d2333c',

            /*woocommerce*/
            'restaurant-recipe-wc-shop-archive-sidebar-layout'     => 'no-sidebar',
            'restaurant-recipe-wc-product-column-number'           => 4,
            'restaurant-recipe-wc-shop-archive-total-product'      => 16,
            'restaurant-recipe-wc-single-product-sidebar-layout'   => 'no-sidebar',

            /*single*/
            'restaurant-recipe-single-header-title'            => esc_html__( 'Blog', 'restaurant-recipe' ),
            'restaurant-recipe-single-img-size'                => 'full',

            /*theme options*/
            'restaurant-recipe-popup-widget-title'     => esc_html__( 'Booking Quote', 'restaurant-recipe' ),
            'restaurant-recipe-breadcrumb-options'        => 'hide',
            'restaurant-recipe-search-placeholder'     => esc_html__( 'Search', 'restaurant-recipe' ),
            'restaurant-recipe-social-data'            => ''
        );
        return apply_filters( 'restaurant_recipe_default_theme_options', $default_theme_options );
    }
endif;

/**
 * Get theme options
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array restaurant_recipe_theme_options
 *
 */
if ( !function_exists('restaurant_recipe_get_theme_options') ) :
    function restaurant_recipe_get_theme_options() {

        $restaurant_recipe_default_theme_options = restaurant_recipe_get_default_theme_options();
        $restaurant_recipe_get_theme_options = get_theme_mod( 'restaurant_recipe_theme_options');
        if( is_array( $restaurant_recipe_get_theme_options )){
            return array_merge( $restaurant_recipe_default_theme_options ,$restaurant_recipe_get_theme_options );
        }
        else{
            return $restaurant_recipe_default_theme_options;
        }
    }
endif;

$restaurant_recipe_saved_theme_options = restaurant_recipe_get_theme_options();
$GLOBALS['restaurant_recipe_customizer_all_values'] = $restaurant_recipe_saved_theme_options;

/**
 * Require init.
 */
require trailingslashit( get_template_directory() ).'acmethemes/init.php';