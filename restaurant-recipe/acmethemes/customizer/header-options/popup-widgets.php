<?php
/*Title*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-popup-widget-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['restaurant-recipe-popup-widget-title'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-popup-widget-title]', array(
	'label'		        => esc_html__( 'Popup Main Title', 'restaurant-recipe' ),
	'section'           => 'restaurant-recipe-menu-options',
	'settings'          => 'restaurant_recipe_theme_options[restaurant-recipe-popup-widget-title]',
	'type'	  	        => 'text',
    'active_callback'   => 'restaurant_recipe_menu_right_button_if_booking'
) );