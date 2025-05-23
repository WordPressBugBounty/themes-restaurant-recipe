<?php
/**
 * Display Social Links
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return void
 */
if ( ! function_exists( 'restaurant_recipe_social_links' ) ) :

	function restaurant_recipe_social_links() {

		$restaurant_recipe_customizer_all_values = restaurant_recipe_get_theme_options();
		$restaurant_recipe_social_data           = json_decode( $restaurant_recipe_customizer_all_values['restaurant-recipe-social-data'] );
		if ( is_array( $restaurant_recipe_social_data ) ) {
			echo '<ul class="socials at-display-inline-block">';
			foreach ( $restaurant_recipe_social_data as $social_data ) {
				$icon     = $social_data->icon;
				$link     = $social_data->link;
				$checkbox = $social_data->checkbox;
				echo '<li>';
				echo '<a href="' . esc_url( $link ) . '" target="' . ( $checkbox == 1 ? '_blank' : '' ) . '">';
				echo '<i class="fa ' . esc_attr( $icon ) . '"></i>';
				echo '</a>';
				echo '</li>';
			}
			echo '</ul>';
		}
	}
endif;
add_action( 'restaurant_recipe_action_social_links', 'restaurant_recipe_social_links', 10 );


if ( ! function_exists( 'restaurant_recipe_action_top_menu' ) ) :

	function restaurant_recipe_action_top_menu() {
		echo "<div class='at-first-level-nav at-display-inline-block text-right'>";
		wp_nav_menu(
			array(
				'theme_location' => 'top-menu',
				'container'      => false,
				'depth'          => 1,
			)
		);
		echo '</div>';
	}
endif;
add_action( 'restaurant_recipe_action_top_menu', 'restaurant_recipe_action_top_menu', 10 );
