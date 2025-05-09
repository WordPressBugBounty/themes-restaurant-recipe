<?php
/**
 * Front page hook for all WordPress Conditions
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return void
 */
if ( ! function_exists( 'restaurant_recipe_featured_slider' ) ) :

	function restaurant_recipe_featured_slider() {
		if ( restaurant_recipe_is_feature_enable() ) :
			do_action( 'restaurant_recipe_action_feature_slider' );
		endif;
	}
endif;
add_action( 'restaurant_recipe_action_front_page', 'restaurant_recipe_featured_slider', 10 );

if ( ! function_exists( 'restaurant_recipe_front_page' ) ) :

	function restaurant_recipe_front_page() {
		$restaurant_recipe_customizer_all_values = restaurant_recipe_get_theme_options();

		$restaurant_recipe_hide_front_page_content = $restaurant_recipe_customizer_all_values['restaurant-recipe-hide-front-page-content'];

		/*show widget in front page, now user are not force to use front page*/
		if ( is_active_sidebar( 'restaurant-recipe-home' ) && ! is_home() ) {
			dynamic_sidebar( 'restaurant-recipe-home' );
		}
		if ( 'posts' == get_option( 'show_on_front' ) ) {
			include get_home_template();
		} elseif ( 1 != $restaurant_recipe_hide_front_page_content ) {
				include get_page_template();
		}
	}
endif;
add_action( 'restaurant_recipe_action_front_page', 'restaurant_recipe_front_page', 20 );
