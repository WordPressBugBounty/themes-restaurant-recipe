<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Acme Themes
 * @subpackage Restaurant Recipe
 */
get_header();
$restaurant_recipe_customizer_all_values = restaurant_recipe_get_theme_options();
?>
<div class="wrapper inner-main-title">
	<?php
	echo restaurant_recipe_get_header_normal_image();
	?>
	<div class="container">
		<header class="entry-header init-animate">
			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );

			restaurant_recipe_breadcrumbs();
			?>
		</header><!-- .entry-header -->
	</div>
</div>
<div id="content" class="site-content container clearfix">
	<?php
	$sidebar_layout = restaurant_recipe_sidebar_selection();
	if ( 'both-sidebar' == $sidebar_layout ) {
		echo '<div id="primary-wrap" class="clearfix">';
	}
	?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );

				endwhile;
				/**
				 * restaurant_recipe_action_posts_navigation hook
				 *
				 * @since Restaurant Recipe 1.0.0
				 *
				 * @hooked restaurant_recipe_posts_navigation - 10
				 */
				do_action( 'restaurant_recipe_action_posts_navigation' );
			else :
				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php
	get_sidebar( 'left' );
	get_sidebar();
	if ( 'both-sidebar' == $sidebar_layout ) {
		echo '</div>';
	}
	?>
</div><!-- #content -->
<?php
get_footer();
