<?php
/**
 * Header Image Display Options
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_menu_display_options
 *
 */
if ( !function_exists('restaurant_recipe_menu_display_options') ) :
	function restaurant_recipe_menu_display_options() {
		$restaurant_recipe_menu_display_options =  array(
			'menu-default'      => esc_html__( 'Default', 'restaurant-recipe' ),
			'menu-classic'      => esc_html__( 'Classic', 'restaurant-recipe' ),
			'header-transparent'      => esc_html__( 'Transparent', 'restaurant-recipe' )
		);
		return apply_filters( 'restaurant_recipe_menu_display_options', $restaurant_recipe_menu_display_options );
	}
endif;

/**
 * Menu and Logo Display Options
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_header_image_display
 *
 */
if ( !function_exists('restaurant_recipe_header_image_display') ) :
	function restaurant_recipe_header_image_display() {
		$restaurant_recipe_header_image_display =  array(
			'hide'              => esc_html__( 'Hide', 'restaurant-recipe' ),
			'bg-image'          => esc_html__( 'Background Image', 'restaurant-recipe' ),
			'normal-image'      => esc_html__( 'Normal Image', 'restaurant-recipe' )
		);
		return apply_filters( 'restaurant_recipe_header_image_display', $restaurant_recipe_header_image_display );
	}
endif;

/**
 * Menu Right Button Link Options
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_menu_right_button_link_options
 *
 */
if ( !function_exists('restaurant_recipe_menu_right_button_link_options') ) :
	function restaurant_recipe_menu_right_button_link_options() {
		$restaurant_recipe_menu_right_button_link_options =  array(
			'disable'       => esc_html__( 'Disable', 'restaurant-recipe' ),
			'booking'       => esc_html__( 'Popup Widgets ( Booking Form )', 'restaurant-recipe' ),
			'link'          => esc_html__( 'One Link', 'restaurant-recipe' )
		);
		return apply_filters( 'restaurant_recipe_menu_right_button_link_options', $restaurant_recipe_menu_right_button_link_options );
	}
endif;

/**
 * Header top display options of elements
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_header_top_display_selection
 *
 */
if ( !function_exists('restaurant_recipe_header_top_display_selection') ) :
	function restaurant_recipe_header_top_display_selection() {
		$restaurant_recipe_header_top_display_selection =  array(
			'hide'          => esc_html__( 'Hide', 'restaurant-recipe' ),
			'left'          => esc_html__( 'on Top Left', 'restaurant-recipe' ),
			'right'         => esc_html__( 'on Top Right', 'restaurant-recipe' )
		);
		return apply_filters( 'restaurant_recipe_header_top_display_selection', $restaurant_recipe_header_top_display_selection );
	}
endif;

/**
 * Feature slider text align
 *
 * @since Mercantile 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_slider_text_align
 *
 */
if ( !function_exists('restaurant_recipe_slider_text_align') ) :
	function restaurant_recipe_slider_text_align() {
		$restaurant_recipe_slider_text_align =  array(
			'alternate'     => esc_html__( 'Alternate', 'restaurant-recipe' ),
			'text-left'     => esc_html__( 'Left', 'restaurant-recipe' ),
			'text-right'    => esc_html__( 'Right', 'restaurant-recipe' ),
			'text-center'   => esc_html__( 'Center', 'restaurant-recipe' )
		);
		return apply_filters( 'restaurant_recipe_slider_text_align', $restaurant_recipe_slider_text_align );
	}
endif;

/**
 * Featured Slider Image Options
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_fs_image_display_options
 *
 */
if ( !function_exists('restaurant_recipe_fs_image_display_options') ) :
	function restaurant_recipe_fs_image_display_options() {
		$restaurant_recipe_fs_image_display_options =  array(
			'full-screen-bg' => esc_html__( 'Full Screen Background', 'restaurant-recipe' ),
			'responsive-img' => esc_html__( 'Responsive Image', 'restaurant-recipe' )
		);
		return apply_filters( 'restaurant_recipe_fs_image_display_options', $restaurant_recipe_fs_image_display_options );
	}
endif;

/**
 * Feature Info number
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_feature_info_number
 *
 */
if ( !function_exists('restaurant_recipe_feature_info_number') ) :
	function restaurant_recipe_feature_info_number() {
		$restaurant_recipe_feature_info_number =  array(
			1               => esc_html__( '1', 'restaurant-recipe' ),
			2               => esc_html__( '2', 'restaurant-recipe' ),
			3               => esc_html__( '3', 'restaurant-recipe' ),
			4               => esc_html__( '4', 'restaurant-recipe' ),
		);
		return apply_filters( 'restaurant_recipe_feature_info_number', $restaurant_recipe_feature_info_number );
	}
endif;

/**
 * Footer copyright beside options
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_footer_copyright_beside_option
 *
 */
if ( !function_exists('restaurant_recipe_footer_copyright_beside_option') ) :
	function restaurant_recipe_footer_copyright_beside_option() {
		$restaurant_recipe_footer_copyright_beside_option =  array(
			'hide'          => esc_html__( 'Hide', 'restaurant-recipe' ),
			'social'        => esc_html__( 'Social Links', 'restaurant-recipe' ),
			'footer-menu'   => esc_html__( 'Footer Menu', 'restaurant-recipe' )
		);
		return apply_filters( 'restaurant_recipe_footer_copyright_beside_option', $restaurant_recipe_footer_copyright_beside_option );
	}
endif;

/**
 * Sidebar layout options
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_sidebar_layout
 *
 */
if ( !function_exists('restaurant_recipe_sidebar_layout') ) :
    function restaurant_recipe_sidebar_layout() {
        $restaurant_recipe_sidebar_layout =  array(
	        'right-sidebar' => esc_html__( 'Right Sidebar', 'restaurant-recipe' ),
	        'left-sidebar'  => esc_html__( 'Left Sidebar' , 'restaurant-recipe' ),
	        'both-sidebar'  => esc_html__( 'Both Sidebar' , 'restaurant-recipe' ),
	        'middle-col'    => esc_html__( 'Middle Column' , 'restaurant-recipe' ),
	        'no-sidebar'    => esc_html__( 'No Sidebar', 'restaurant-recipe' )
        );
        return apply_filters( 'restaurant_recipe_sidebar_layout', $restaurant_recipe_sidebar_layout );
    }
endif;

/**
 * Blog content from
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_blog_archive_content_from
 *
 */
if ( !function_exists('restaurant_recipe_blog_archive_content_from') ) :
	function restaurant_recipe_blog_archive_content_from() {
		$restaurant_recipe_blog_archive_content_from =  array(
			'excerpt'    => esc_html__( 'Excerpt', 'restaurant-recipe' ),
			'content'    => esc_html__( 'Content', 'restaurant-recipe' )
		);
		return apply_filters( 'restaurant_recipe_blog_archive_content_from', $restaurant_recipe_blog_archive_content_from );
	}
endif;

/**
 * Image Size
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_get_image_sizes_options
 *
 */
if ( !function_exists('restaurant_recipe_get_image_sizes_options') ) :
	function restaurant_recipe_get_image_sizes_options( $add_disable = false ) {
		global $_wp_additional_image_sizes;
		$choices = array();
		if ( true == $add_disable ) {
			$choices['disable'] = esc_html__( 'No Image', 'restaurant-recipe' );
		}
		foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
			$choices[ $_size ] = $_size . ' ('. get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
		}
		$choices['full'] = esc_html__( 'full (original)', 'restaurant-recipe' );
		if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {

			foreach ($_wp_additional_image_sizes as $key => $size ) {
				$choices[ $key ] = $key . ' ('. $size['width'] . 'x' . $size['height'] . ')';
			}
		}
		return apply_filters( 'restaurant_recipe_get_image_sizes_options', $choices );
	}
endif;

/**
 * Pagination Options
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array restaurant_recipe_pagination_options
 *
 */
if ( !function_exists('restaurant_recipe_pagination_options') ) :
	function restaurant_recipe_pagination_options() {
		$restaurant_recipe_pagination_options =  array(
			'default'  => esc_html__( 'Default', 'restaurant-recipe' ),
			'numeric'  => esc_html__( 'Numeric', 'restaurant-recipe' )
		);
		return apply_filters( 'restaurant_recipe_pagination_options', $restaurant_recipe_pagination_options );
	}
endif;

/**
 * Breadcrumb Options
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array restaurant_recipe_breadcrumb_options
 *
 */
if ( !function_exists('restaurant_recipe_breadcrumb_options') ) :
	function restaurant_recipe_breadcrumb_options() {
		$restaurant_recipe_breadcrumb_options =  array(
			'hide'  => esc_html__( 'Hide', 'restaurant-recipe' ),
		);
		if ( function_exists('yoast_breadcrumb') ) {
			$restaurant_recipe_breadcrumb_options['yoast'] = esc_html__( 'Yoast', 'restaurant-recipe' );
		}
		if ( function_exists('bcn_display') ) {
			$restaurant_recipe_breadcrumb_options['bcn'] = esc_html__( 'Breadcrumb NavXT', 'restaurant-recipe' );
		}
		return apply_filters( 'restaurant_recipe_pagination_options', $restaurant_recipe_breadcrumb_options );
	}
endif;