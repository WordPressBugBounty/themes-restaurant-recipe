<?php
/**
 * get header normal image
 */
function restaurant_recipe_get_header_normal_image() {
	$restaurant_recipe_customizer_all_values = restaurant_recipe_get_theme_options();
	$restaurant_recipe_header_image_display  = esc_attr( $restaurant_recipe_customizer_all_values['restaurant-recipe-header-image-display'] );
	if ( 'normal-image' == $restaurant_recipe_header_image_display && get_header_image() ) {
		$image = "<img src='" . esc_url( esc_url( get_header_image() ) ) . "'>";

	} else {
		$image = '';
	}
	return $image;
}

/**
 * Callback functions for comments
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param $comment
 * @param $args
 * @param $depth
 * @return void
 */
if ( ! function_exists( 'restaurant_recipe_commment_list' ) ) :

	function restaurant_recipe_commment_list( $comment, $args, $depth ) {
		if ( 'div' == $args['style'] ) {
			$tag       = 'div';
			$add_below = 'comment';
		} else {
			$tag       = 'li';
			$add_below = 'div-comment';
		}
		?>
		<<?php echo $tag; ?>
		<?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">
		<?php if ( 'div' != $args['style'] ) : ?>
			<div id="div-comment-<?php comment_ID(); ?>" class="comment-body clearfix">
		<?php endif; ?>
		<div class="comment-author vcard">
			<?php
			if ( $args['avatar_size'] != 0 ) {
				echo get_avatar( $comment, '64' );
			}
			printf( __( '<cite class="fn">%s</cite>', 'restaurant-recipe' ), get_comment_author_link() );
			?>
		</div>
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'restaurant-recipe' ); ?></em>
			<br/>
		<?php endif; ?>
		<div class="comment-meta commentmetadata">
			<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
				<i class="fa fa-clock-o"></i>
				<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'restaurant-recipe' ), get_comment_date(), get_comment_time() );
				?>
			</a>
			<?php edit_comment_link( __( '(Edit)', 'restaurant-recipe' ), '', '' ); ?>
		</div>
		<?php comment_text(); ?>
		<div class="reply">
			<?php
			comment_reply_link(
				array_merge(
					$args,
					array(
						'add_below' => $add_below,
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
					)
				)
			);
			?>
		</div>
		<?php if ( 'div' != $args['style'] ) : ?>
			</div>
		<?php endif; ?>
		<?php
	}
endif;

/**
 * BreadCrumb Settings
 */
if ( ! function_exists( 'restaurant_recipe_breadcrumbs' ) ) :
	function restaurant_recipe_breadcrumbs() {
		$restaurant_recipe_customizer_all_values = restaurant_recipe_get_theme_options();
		if ( 'hide' != $restaurant_recipe_customizer_all_values['restaurant-recipe-breadcrumb-options'] ) {
			$breadcrumb = $restaurant_recipe_customizer_all_values['restaurant-recipe-breadcrumb-options'];
			if ( ! is_front_page() ) {
				if ( function_exists( 'yoast_breadcrumb' ) && 'yoast' == $breadcrumb ) {
					echo "<div class='breadcrumbs init-animate'><div id='restaurant-recipe-breadcrumbs'>";
					yoast_breadcrumb();
					echo '</div></div>';

				} elseif ( function_exists( 'bcn_display' ) && 'bcn' == $breadcrumb ) {
					echo "<div class='breadcrumbs init-animate'><div id='restaurant-recipe-breadcrumbs'>";
					bcn_display();
					echo '</div></div>';
				}
			}
		}
	}
endif;

/**
 * Return content of fixed length
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param string $restaurant_recipe_content
 * @param int $length
 * @return string
 */
if ( ! function_exists( 'restaurant_recipe_words_count' ) ) :
	function restaurant_recipe_words_count( $restaurant_recipe_content = null, $length = 16 ) {
		$length          = absint( $length );
		$source_content  = preg_replace( '`\[[^\]]*\]`', '', $restaurant_recipe_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '...' );
		return $trimmed_content;
	}
endif;

/**
 * More Text
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return string
 */
if ( ! function_exists( 'restaurant_recipe_blog_archive_more_text' ) ) :
	function restaurant_recipe_blog_archive_more_text() {
		$restaurant_recipe_customizer_all_values  = restaurant_recipe_get_theme_options();
		$restaurant_recipe_blog_archive_read_more = $restaurant_recipe_customizer_all_values['restaurant-recipe-blog-archive-more-text'];
		$restaurant_recipe_blog_archive_read_more = esc_html( $restaurant_recipe_blog_archive_read_more );
		return $restaurant_recipe_blog_archive_read_more;
	}
endif;

/**
 * Get all Font Awesome Icons
 * https://gist.github.com/codersantosh/b4f423fec60fe598b315594fac0a5812
 */
if ( ! function_exists( 'restaurant_recipe_icons_array' ) ) {
	function restaurant_recipe_icons_array() {
		$fa_icon_list       = ' fa-glass, fa-music, fa-search, fa-envelope-o, fa-heart, fa-star, fa-star-o, fa-user, fa-film, fa-th-large, fa-th, fa-th-list, fa-check, fa-times, fa-search-plus, fa-search-minus, fa-power-off, fa-signal, fa-cog, fa-trash-o, fa-home, fa-file-o, fa-clock-o, fa-road, fa-download, fa-arrow-circle-o-down, fa-arrow-circle-o-up, fa-inbox, fa-play-circle-o, fa-repeat, fa-refresh, fa-list-alt, fa-lock, fa-flag, fa-headphones, fa-volume-off, fa-volume-down, fa-volume-up, fa-qrcode, fa-barcode, fa-tag, fa-tags, fa-book, fa-bookmark, fa-print, fa-camera, fa-font, fa-bold, fa-italic, fa-text-height, fa-text-width, fa-align-left, fa-align-center, fa-align-right, fa-align-justify, fa-list, fa-outdent, fa-indent, fa-video-camera, fa-picture-o, fa-pencil, fa-map-marker, fa-adjust, fa-tint, fa-pencil-square-o, fa-share-square-o, fa-check-square-o, fa-arrows, fa-step-backward, fa-fast-backward, fa-backward, fa-play, fa-pause, fa-stop, fa-forward, fa-fast-forward, fa-step-forward, fa-eject, fa-chevron-left, fa-chevron-right, fa-plus-circle, fa-minus-circle, fa-times-circle, fa-check-circle, fa-question-circle, fa-info-circle, fa-crosshairs, fa-times-circle-o, fa-check-circle-o, fa-ban, fa-arrow-left, fa-arrow-right, fa-arrow-up, fa-arrow-down, fa-share, fa-expand, fa-compress, fa-plus, fa-minus, fa-asterisk, fa-exclamation-circle, fa-gift, fa-leaf, fa-fire, fa-eye, fa-eye-slash, fa-exclamation-triangle, fa-plane, fa-calendar, fa-random, fa-comment, fa-magnet, fa-chevron-up, fa-chevron-down, fa-retweet, fa-shopping-cart, fa-folder, fa-folder-open, fa-arrows-v, fa-arrows-h, fa-bar-chart, fa-twitter-square, fa-facebook-square, fa-camera-retro, fa-key, fa-cogs, fa-comments, fa-thumbs-o-up, fa-thumbs-o-down, fa-star-half, fa-heart-o, fa-sign-out, fa-linkedin-square, fa-thumb-tack, fa-external-link, fa-sign-in, fa-trophy, fa-github-square, fa-upload, fa-lemon-o, fa-phone, fa-square-o, fa-bookmark-o, fa-phone-square, fa-twitter, fa-facebook, fa-github, fa-unlock, fa-credit-card, fa-rss, fa-hdd-o, fa-bullhorn, fa-bell, fa-certificate, fa-hand-o-right, fa-hand-o-left, fa-hand-o-up, fa-hand-o-down, fa-arrow-circle-left, fa-arrow-circle-right, fa-arrow-circle-up, fa-arrow-circle-down, fa-globe, fa-wrench, fa-tasks, fa-filter, fa-briefcase, fa-arrows-alt, fa-users, fa-link, fa-cloud, fa-flask, fa-scissors, fa-files-o, fa-paperclip, fa-floppy-o, fa-square, fa-bars, fa-list-ul, fa-list-ol, fa-strikethrough, fa-underline, fa-table, fa-magic, fa-truck, fa-pinterest, fa-pinterest-square, fa-google-plus-square, fa-google-plus, fa-money, fa-caret-down, fa-caret-up, fa-caret-left, fa-caret-right, fa-columns, fa-sort, fa-sort-desc, fa-sort-asc, fa-envelope, fa-linkedin, fa-undo, fa-gavel, fa-tachometer, fa-comment-o, fa-comments-o, fa-bolt, fa-sitemap, fa-umbrella, fa-clipboard, fa-lightbulb-o, fa-exchange, fa-cloud-download, fa-cloud-upload, fa-user-md, fa-stethoscope, fa-suitcase, fa-bell-o, fa-coffee, fa-cutlery, fa-file-text-o, fa-building-o, fa-hospital-o, fa-ambulance, fa-medkit, fa-fighter-jet, fa-beer, fa-h-square, fa-plus-square, fa-angle-double-left, fa-angle-double-right, fa-angle-double-up, fa-angle-double-down, fa-angle-left, fa-angle-right, fa-angle-up, fa-angle-down, fa-desktop, fa-laptop, fa-tablet, fa-mobile, fa-circle-o, fa-quote-left, fa-quote-right, fa-spinner, fa-circle, fa-reply, fa-github-alt, fa-folder-o, fa-folder-open-o, fa-smile-o, fa-frown-o, fa-meh-o, fa-gamepad, fa-keyboard-o, fa-flag-o, fa-flag-checkered, fa-terminal, fa-code, fa-reply-all, fa-star-half-o, fa-location-arrow, fa-crop, fa-code-fork, fa-chain-broken, fa-question, fa-info, fa-exclamation, fa-superscript, fa-subscript, fa-eraser, fa-puzzle-piece, fa-microphone, fa-microphone-slash, fa-shield, fa-calendar-o, fa-fire-extinguisher, fa-rocket, fa-maxcdn, fa-chevron-circle-left, fa-chevron-circle-right, fa-chevron-circle-up, fa-chevron-circle-down, fa-html5, fa-css3, fa-anchor, fa-unlock-alt, fa-bullseye, fa-ellipsis-h, fa-ellipsis-v, fa-rss-square, fa-play-circle, fa-ticket, fa-minus-square, fa-minus-square-o, fa-level-up, fa-level-down, fa-check-square, fa-pencil-square, fa-external-link-square, fa-share-square, fa-compass, fa-caret-square-o-down, fa-caret-square-o-up, fa-caret-square-o-right, fa-eur, fa-gbp, fa-usd, fa-inr, fa-jpy, fa-rub, fa-krw, fa-btc, fa-file, fa-file-text, fa-sort-alpha-asc, fa-sort-alpha-desc, fa-sort-amount-asc, fa-sort-amount-desc, fa-sort-numeric-asc, fa-sort-numeric-desc, fa-thumbs-up, fa-thumbs-down, fa-youtube-square, fa-youtube, fa-xing, fa-xing-square, fa-youtube-play, fa-dropbox, fa-stack-overflow, fa-instagram, fa-flickr, fa-adn, fa-bitbucket, fa-bitbucket-square, fa-tumblr, fa-tumblr-square, fa-long-arrow-down, fa-long-arrow-up, fa-long-arrow-left, fa-long-arrow-right, fa-apple, fa-windows, fa-android, fa-linux, fa-dribbble, fa-skype, fa-foursquare, fa-trello, fa-female, fa-male, fa-gratipay, fa-sun-o, fa-moon-o, fa-archive, fa-bug, fa-vk, fa-weibo, fa-renren, fa-pagelines, fa-stack-exchange, fa-arrow-circle-o-right, fa-arrow-circle-o-left, fa-caret-square-o-left, fa-dot-circle-o, fa-wheelchair, fa-vimeo-square, fa-try, fa-plus-square-o, fa-space-shuttle, fa-slack, fa-envelope-square, fa-wordpress, fa-openid, fa-university, fa-graduation-cap, fa-yahoo, fa-google, fa-reddit, fa-reddit-square, fa-stumbleupon-circle, fa-stumbleupon, fa-delicious, fa-digg, fa-pied-piper-pp, fa-pied-piper-alt, fa-drupal, fa-joomla, fa-language, fa-fax, fa-building, fa-child, fa-paw, fa-spoon, fa-cube, fa-cubes, fa-behance, fa-behance-square, fa-steam, fa-steam-square, fa-recycle, fa-car, fa-taxi, fa-tree, fa-spotify, fa-deviantart, fa-soundcloud, fa-database, fa-file-pdf-o, fa-file-word-o, fa-file-excel-o, fa-file-powerpoint-o, fa-file-image-o, fa-file-archive-o, fa-file-audio-o, fa-file-video-o, fa-file-code-o, fa-vine, fa-codepen, fa-jsfiddle, fa-life-ring, fa-circle-o-notch, fa-rebel, fa-empire, fa-git-square, fa-git, fa-hacker-news, fa-tencent-weibo, fa-qq, fa-weixin, fa-paper-plane, fa-paper-plane-o, fa-history, fa-circle-thin, fa-header, fa-paragraph, fa-sliders, fa-share-alt, fa-share-alt-square, fa-bomb, fa-futbol-o, fa-tty, fa-binoculars, fa-plug, fa-slideshare, fa-twitch, fa-yelp, fa-newspaper-o, fa-wifi, fa-calculator, fa-paypal, fa-google-wallet, fa-cc-visa, fa-cc-mastercard, fa-cc-discover, fa-cc-amex, fa-cc-paypal, fa-cc-stripe, fa-bell-slash, fa-bell-slash-o, fa-trash, fa-copyright, fa-at, fa-eyedropper, fa-paint-brush, fa-birthday-cake, fa-area-chart, fa-pie-chart, fa-line-chart, fa-lastfm, fa-lastfm-square, fa-toggle-off, fa-toggle-on, fa-bicycle, fa-bus, fa-ioxhost, fa-angellist, fa-cc, fa-ils, fa-meanpath, fa-buysellads, fa-connectdevelop, fa-dashcube, fa-forumbee, fa-leanpub, fa-sellsy, fa-shirtsinbulk, fa-simplybuilt, fa-skyatlas, fa-cart-plus, fa-cart-arrow-down, fa-diamond, fa-ship, fa-user-secret, fa-motorcycle, fa-street-view, fa-heartbeat, fa-venus, fa-mars, fa-mercury, fa-transgender, fa-transgender-alt, fa-venus-double, fa-mars-double, fa-venus-mars, fa-mars-stroke, fa-mars-stroke-v, fa-mars-stroke-h, fa-neuter, fa-genderless, fa-facebook-official, fa-pinterest-p, fa-whatsapp, fa-server, fa-user-plus, fa-user-times, fa-bed, fa-viacoin, fa-train, fa-subway, fa-medium, fa-y-combinator, fa-optin-monster, fa-opencart, fa-expeditedssl, fa-battery-full, fa-battery-three-quarters, fa-battery-half, fa-battery-quarter, fa-battery-empty, fa-mouse-pointer, fa-i-cursor, fa-object-group, fa-object-ungroup, fa-sticky-note, fa-sticky-note-o, fa-cc-jcb, fa-cc-diners-club, fa-clone, fa-balance-scale, fa-hourglass-o, fa-hourglass-start, fa-hourglass-half, fa-hourglass-end, fa-hourglass, fa-hand-rock-o, fa-hand-paper-o, fa-hand-scissors-o, fa-hand-lizard-o, fa-hand-spock-o, fa-hand-pointer-o, fa-hand-peace-o, fa-trademark, fa-registered, fa-creative-commons, fa-gg, fa-gg-circle, fa-tripadvisor, fa-odnoklassniki, fa-odnoklassniki-square, fa-get-pocket, fa-wikipedia-w, fa-safari, fa-chrome, fa-firefox, fa-opera, fa-internet-explorer, fa-television, fa-contao, fa-500px, fa-amazon, fa-calendar-plus-o, fa-calendar-minus-o, fa-calendar-times-o, fa-calendar-check-o, fa-industry, fa-map-pin, fa-map-signs, fa-map-o, fa-map, fa-commenting, fa-commenting-o, fa-houzz, fa-vimeo, fa-black-tie, fa-fonticons, fa-reddit-alien, fa-edge, fa-credit-card-alt, fa-codiepie, fa-modx, fa-fort-awesome, fa-usb, fa-product-hunt, fa-mixcloud, fa-scribd, fa-pause-circle, fa-pause-circle-o, fa-stop-circle, fa-stop-circle-o, fa-shopping-bag, fa-shopping-basket, fa-hashtag, fa-bluetooth, fa-bluetooth-b, fa-percent, fa-gitlab, fa-wpbeginner, fa-wpforms, fa-envira, fa-universal-access, fa-wheelchair-alt, fa-question-circle-o, fa-blind, fa-audio-description, fa-volume-control-phone, fa-braille, fa-assistive-listening-systems, fa-american-sign-language-interpreting, fa-deaf, fa-glide, fa-glide-g, fa-sign-language, fa-low-vision, fa-viadeo, fa-viadeo-square, fa-snapchat, fa-snapchat-ghost, fa-snapchat-square, fa-pied-piper, fa-first-order, fa-yoast, fa-themeisle, fa-google-plus-official, fa-font-awesome, fa-handshake-o, fa-envelope-open, fa-envelope-open-o, fa-linode, fa-address-book, fa-address-book-o, fa-address-card, fa-address-card-o, fa-user-circle, fa-user-circle-o, fa-user-o, fa-id-badge, fa-id-card, fa-id-card-o, fa-quora, fa-free-code-camp, fa-telegram, fa-thermometer-full, fa-thermometer-three-quarters, fa-thermometer-half, fa-thermometer-quarter, fa-thermometer-empty, fa-shower, fa-bath, fa-podcast, fa-window-maximize, fa-window-minimize, fa-window-restore, fa-window-close, fa-window-close-o, fa-bandcamp, fa-grav, fa-etsy, fa-imdb, fa-ravelry, fa-eercast, fa-microchip, fa-snowflake-o, fa-superpowers, fa-wpexplorer, fa-meetup ';
		$fa_icon_list_array = explode( ', ', $fa_icon_list );
		return $fa_icon_list_array;
	}
}

/**
 * Display Type
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_widget_display_type
 */
if ( ! function_exists( 'restaurant_recipe_widget_display_type' ) ) :
	function restaurant_recipe_widget_display_type() {
		$restaurant_recipe_widget_display_type = array(
			'column'   => esc_html__( 'Normal Column', 'restaurant-recipe' ),
			'carousel' => esc_html__( 'Carousel Column', 'restaurant-recipe' ),
		);
		return apply_filters( 'restaurant_recipe_widget_display_type', $restaurant_recipe_widget_display_type );
	}
endif;

/**
 * Design Type
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_widget_design_type
 */
if ( ! function_exists( 'restaurant_recipe_widget_design_type' ) ) :
	function restaurant_recipe_widget_design_type() {
		$restaurant_recipe_widget_design_type = array(
			'normal'  => esc_html__( 'Normal', 'restaurant-recipe' ),
			'feature' => esc_html__( 'Feature', 'restaurant-recipe' ),
		);
		return apply_filters( 'restaurant_recipe_widget_design_type', $restaurant_recipe_widget_design_type );
	}
endif;

/**
 * Post advanced options
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_post_advanced_options
 */
if ( ! function_exists( 'restaurant_recipe_post_advanced_options' ) ) :
	function restaurant_recipe_post_advanced_options() {
		$restaurant_recipe_post_advanced_options = array(
			'recent' => esc_html__( 'All posts', 'restaurant-recipe' ),
			'cat'    => esc_html__( 'Categories', 'restaurant-recipe' ),
			'tag'    => esc_html__( 'Tags', 'restaurant-recipe' ),
		);
		return apply_filters( 'restaurant_recipe_post_advanced_options', $restaurant_recipe_post_advanced_options );
	}
endif;

/**
 * Default Post Order By
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_post_orderby
 */
if ( ! function_exists( 'restaurant_recipe_post_orderby' ) ) :
	function restaurant_recipe_post_orderby() {
		$restaurant_recipe_post_orderby = array(
			'none'          => esc_html__( 'None', 'restaurant-recipe' ),
			'ID'            => esc_html__( 'ID', 'restaurant-recipe' ),
			'author'        => esc_html__( 'Author', 'restaurant-recipe' ),
			'title'         => esc_html__( 'Title', 'restaurant-recipe' ),
			'date'          => esc_html__( 'Date', 'restaurant-recipe' ),
			'modified'      => esc_html__( 'Modified Date', 'restaurant-recipe' ),
			'rand'          => esc_html__( 'Random', 'restaurant-recipe' ),
			'comment_count' => esc_html__( 'Comment Count', 'restaurant-recipe' ),
			'menu_order'    => esc_html__( 'Menu Order', 'restaurant-recipe' ),
		);
		return apply_filters( 'restaurant_recipe_post_orderby', $restaurant_recipe_post_orderby );
	}
endif;

/**
 * Order ASC DESC
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_post_order
 */
if ( ! function_exists( 'restaurant_recipe_post_order' ) ) :
	function restaurant_recipe_post_order() {
		$restaurant_recipe_post_order = array(
			'ASC'  => esc_html__( 'ASC', 'restaurant-recipe' ),
			'DESC' => esc_html__( 'DESC', 'restaurant-recipe' ),
		);
		return apply_filters( 'restaurant_recipe_post_order', $restaurant_recipe_post_order );
	}
endif;

/**
 * Excerpt with length
 *
 * @since 1.0.0
 *
 * @param int     $length Excerpt length in words.
 * @param WP_Post $post_obj WP_Post instance (Optional).
 * @return string Excerpt.
 */
if ( ! function_exists( 'restaurant_recipe_excerpt_words_count' ) ) :

	function restaurant_recipe_excerpt_words_count( $length = 40, $content_from = 'excerpt', $post_obj = null ) {

		global $post;
		if ( is_null( $post_obj ) ) {
			$post_obj = $post;
		}
		$length = absint( $length );
		if ( $length < 1 ) {
			$length = 40;
		}
		$source_content = $post_obj->post_content;
		if ( 'excerpt' == $content_from ) {
			if ( ! empty( $post_obj->post_excerpt ) ) {
				$source_content = $post_obj->post_excerpt;
			}
		}
		$source_content  = preg_replace( '`\[[^\]]*\]`', '', $source_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '...' );
		return $trimmed_content;
	}
endif;

/**
 * Advanced content
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return void
 */
if ( ! function_exists( 'restaurant_recipe_advanced_content' ) ) :

	function restaurant_recipe_advanced_content( $content_length = 40, $content_from = 'excerpt' ) {

		if ( $content_length < 0 ) {
			if ( 'content' == $content_from ) {
				the_content();
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'restaurant-recipe' ),
						'after'  => '</div>',
					)
				);
			} else {
				the_excerpt();
			}
		} elseif ( $content_length == 0 ) {
			echo '';
		} else {
			$content = restaurant_recipe_excerpt_words_count( $content_length, $content_from );
			echo esc_html( $content );
		}
	}
endif;


/**
 * Design Type
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_widget_design_type
 */
if ( ! function_exists( 'restaurant_recipe_is_feature_enable' ) ) :
	function restaurant_recipe_is_feature_enable() {
		$restaurant_recipe_customizer_all_values = restaurant_recipe_get_theme_options();
		$restaurant_recipe_enable_feature        = $restaurant_recipe_customizer_all_values['restaurant-recipe-enable-feature'];
		if ( is_front_page() && 1 == $restaurant_recipe_enable_feature && ! is_home() ) :
			return true;
		endif;
		return false;
	}
endif;
