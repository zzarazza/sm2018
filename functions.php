<?php
/**
 * Systemorph 2018 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Systemorph_2018
 * @since 1.0
 */

/**
 * Systemorph 2018 only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}
define( 'SMCOLORS', array(
	'primary'        => '#101f30',
	'secondary'      => '#2e3641',
	'sm-blue'        => '#009cde',
	'sm-purple'      => '#623a81',
	'dark-gray'      => '#383C4B',
	'gray'           => '#a6a6a6',
	'lavender-gray'  => '#a9a7b3',
	'light-gray'     => '#e1e1e1',
	'blue'           => '#285fae',
	'alert'          => '#cc1300',
	'success'        => '#5CB85C',
	'white'          => '#ffffff'
));

if ( ! function_exists( 'rwmb_meta' ) ) {
    function rwmb_meta( $key, $args = '', $post_id = null ) {
        return false;
    }
}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function systemorph_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/systemorph
	 * If you're building a theme based on Systemorph 2018, use a find and replace
	 * to change 'systemorph' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'systemorph' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'align-wide' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'systemorph-featured-image', 2000, 1200, true );
	add_image_size( 'systemorph-blog-thumb', 217, 203, true );
	add_image_size( 'systemorph-news-thumb', 70, 70, true );
	add_image_size( 'systemorph-team-member', 310, 310, true );

	add_image_size( 'systemorph-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(
		array(
			'top'    => __( 'Top Menu', 'systemorph' ),
			'bottom'    => __( 'Bottom Menu', 'systemorph' ),
			'privacy' => __( 'Privacy Menu', 'systemorph' ),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	// add_theme_support(
	// 	'post-formats', array(
	// 		'aside',
	// 		'image',
	// 		'video',
	// 		'quote',
	// 		'link',
	// 		'gallery',
	// 		'audio',
	// 	)
	// );

	// Add theme support for Custom Logo.
	add_theme_support(
		'custom-logo', array(
			'width'      => 250,
			'height'     => 250,
			'flex-width' => true,
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
	  */
	add_editor_style( array( 'assets/css/editor-style.css', systemorph_fonts_url() ) );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets'     => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts'       => array(
			'home',
			'about'            => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact'          => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog'             => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'systemorph' ),
				'file'       => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'systemorph' ),
				'file'       => 'assets/images/sandwich.jpg',
			),
			'image-coffee'   => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'systemorph' ),
				'file'       => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options'     => array(
			'show_on_front'  => 'page',
			'page_on_front'  => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods'  => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus'   => array(
			// Assign a menu to the "top" location.
			'top'    => array(
				'name'  => __( 'Top Menu', 'systemorph' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name'  => __( 'Social Links Menu', 'systemorph' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);

	/**
	 * Filters Systemorph 2018 array of starter content.
	 *
	 * @since Systemorph 2018 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'systemorph_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );

	add_theme_support( 'editor-color-palette',
		array(
			array(
				'name'  => __( 'Primary', 'systemorph' ),
				'slug'  => 'primary',
				'color'	=> SMCOLORS['primary']
			),
			array(
				'name'  => __( 'Secondary', 'systemorph' ),
				'slug'  => 'secondary',
				'color' => SMCOLORS['secondary'],
			),
			array(
				'name'  => __( 'SM blue', 'systemorph' ),
				'slug'  => 'sm-blue',
				'color' => SMCOLORS['sm-blue'],
			),
			array(
				'name'  => __( 'SM purple', 'systemorph' ),
				'slug'  => 'sm-purple',
				'color' => SMCOLORS['sm-purple'],
			),
			array(
				'name'  => __( 'Dark gray', 'systemorph' ),
				'slug'  => 'dark-gray',
				'color' => SMCOLORS['dark-gray'],
			),
			array(
				'name'  => __( 'Gray', 'systemorph' ),
				'slug'  => 'gray',
				'color' => SMCOLORS['gray'],
			),
			array(
				'name'  => __( 'Lavender gray', 'systemorph' ),
				'slug'  => 'lavender-gray',
				'color' => SMCOLORS['lavender-gray'],
			),
			array(
				'name'  => __( 'Light gray', 'systemorph' ),
				'slug'  => 'light-gray',
				'color' => SMCOLORS['light-gray'],
			),
			array(
				'name'  => __( 'Blue', 'systemorph' ),
				'slug'  => 'blue',
				'color' => SMCOLORS['blue'],
			),
			array(
				'name'  => __( 'Red', 'systemorph' ),
				'slug'  => 'alert',
				'color' => SMCOLORS['alert'],
			),
			array(
				'name'  => __( 'Green', 'systemorph' ),
				'slug'  => 'success',
				'color' => SMCOLORS['success'],
			),
			array(
				'name'  => __( 'White', 'systemorph' ),
				'slug'  => 'white',
				'color' => SMCOLORS['white'],
			)
		)
	);

	add_theme_support( 'disable-custom-colors' );

	add_theme_support( 'editor-font-sizes', array(
	    array(
	        'name' => __( 'Small', 'systemorph' ),
			'size' => 16,
			'slug' => 'small'
	    ),
	    array(
	        'name' => __( 'Normal', 'systemorph' ),
			'size' => 20,
			'slug' => 'normal'
	    ),
	    array(
	        'name' => __( 'Medium', 'systemorph' ),
			'size' => 25,
			'slug' => 'medium'
	    ),
	    array(
	        'name' => __( 'Large', 'systemorph' ),
			'size' => 28,
			'slug' => 'large'
	    ),
	    array(
	        'name' => __( 'Huge', 'systemorph' ),
			'size' => 36,
			'slug' => 'huge'
	    )
	) );
	add_theme_support('disable-custom-font-sizes');
}
add_action( 'after_setup_theme', 'systemorph_setup' );

function sm_pages_excerpt() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'sm_pages_excerpt' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function systemorph_content_width() {

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$page_layout = get_theme_mod( 'page_layout' );

	// Check if layout is one column.
	if ( 'one-column' === $page_layout ) {
		if ( systemorph_is_frontpage() ) {
			$content_width = 644;
		} elseif ( is_page() ) {
			$content_width = 740;
		}
	}

	// Check if is single post and there is no sidebar.
	if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 740;
	}

	/**
	 * Filter Systemorph 2018 content width of the theme.
	 *
	 * @since Systemorph 2018 1.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'systemorph_content_width', $content_width );
}
add_action( 'template_redirect', 'systemorph_content_width', 0 );

/**
 * Register custom fonts.
 */
function systemorph_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$custom_font = _x( 'on', 'Custom font: on or off', 'systemorph' );

	if ( 'off' !== $custom_font ) {
		$font_families = array();

		$font_families[] = 'Tajawal:300,300i,400,400i,500,700,800';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Systemorph 2018 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function systemorph_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'systemorph-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'systemorph_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function systemorph_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Blog Sidebar', 'systemorph' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'systemorph' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'systemorph' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Add widgets here to appear in your footer.', 'systemorph' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 2', 'systemorph' ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Add widgets here to appear in your footer.', 'systemorph' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'systemorph_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Systemorph 2018 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function systemorph_excerpt_more( $link, $ellipsis = true ) {
	if ( is_admin() ) {
		return $link;
	}

	// $link = sprintf(
	// 	'<a href="%1$s" class="read-more-link">%2$s</a>',
	// 	esc_url( get_permalink( get_the_ID() ) ),
	// 	 translators: %s: Name of current post
	// 	sprintf( __( 'Read more<span class="screen-reader-text"> "%s"</span>', 'systemorph' ), get_the_title( get_the_ID() ) )
	// );

	// if ($ellipsis) {
	$link = '&hellip; ';
	// }

	return $link;
}
add_filter( 'excerpt_more', 'systemorph_excerpt_more' );

function systemorph_manual_excerpt_more ( $excerpt ) {
    global $post;

    if ( has_excerpt( $post->ID ) ) {
        $excerpt .= systemorph_excerpt_more ( '', false );
    }

    return $excerpt;
}
add_filter( 'get_the_excerpt', 'systemorph_manual_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Systemorph 2018 1.0
 */
function systemorph_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'systemorph_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function systemorph_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'systemorph_pingback_header' );

/**
 * Display custom color CSS.
 */
function systemorph_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}

	require_once( get_parent_theme_file_path( '/inc/color-patterns.php' ) );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );

	$customize_preview_data_hue = '';
	if ( is_customize_preview() ) {
		$customize_preview_data_hue = 'data-hue="' . $hue . '"';
	}
?>
	<style type="text/css" id="custom-theme-colors" <?php echo $customize_preview_data_hue; ?>>
		<?php echo systemorph_custom_colors_css(); ?>
	</style>
<?php
}
add_action( 'wp_head', 'systemorph_colors_css_wrap' );

/**
 * Enqueue scripts and styles.
 */
function systemorph_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'systemorph-fonts', systemorph_fonts_url(), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'systemorph-style', get_stylesheet_uri() );

	// Load the dark colorscheme.
	if ( 'dark' === get_theme_mod( 'colorscheme', 'light' ) || is_customize_preview() ) {
		wp_enqueue_style( 'systemorph-colors-dark', get_theme_file_uri( '/assets/css/colors-dark.css' ), array( 'systemorph-style' ), '1.0' );
	}

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'systemorph-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'systemorph-style' ), '1.0' );
		wp_style_add_data( 'systemorph-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'systemorph-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'systemorph-style' ), '1.0' );
	wp_style_add_data( 'systemorph-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'systemorph-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$systemorph_l10n = array(
		'quote' => systemorph_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'systemorph-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );
		$systemorph_l10n['expand']   = __( 'Expand child menu', 'systemorph' );
		$systemorph_l10n['collapse'] = __( 'Collapse child menu', 'systemorph' );
		$systemorph_l10n['icon']     = systemorph_get_svg(
			array(
				'icon'     => 'angle-down',
				'fallback' => true,
			)
		);
	}

	wp_enqueue_script( 'systemorph-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );

	wp_enqueue_script( 'jquery-cookie', get_theme_file_uri( '/assets/js/jquery.cookie.js' ), array( 'jquery' ), '2.1.2', true );

	wp_localize_script( 'systemorph-skip-link-focus-fix', 'systemorphScreenReaderText', $systemorph_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_localize_script( 'systemorph-global', 'ajax_script', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'systemorph_scripts' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Systemorph 2018 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function systemorph_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			$sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'systemorph_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Systemorph 2018 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function systemorph_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'systemorph_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Systemorph 2018 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function systemorph_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'systemorph_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Systemorph 2018 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function systemorph_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'systemorph_front_page_template' );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Systemorph 2018 1.4
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function systemorph_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'systemorph_widget_tag_cloud_args' );

add_action( 'pre_get_posts', 'systemorph_management_team_query' );

function systemorph_management_team_query( $query ) {

    if ( ! is_admin() && $query->is_main_query() ) {

        if ( is_post_type_archive( 'management-team' ) ) {

            $query->set('posts_per_page', -1 );
            $query->set('orderby', 'menu_order' );
            $query->set('order', 'ASC' );

        }
    }
}

add_action( 'wp_ajax_nopriv_systemorph_white_papers_success', 'white_papers_success');
add_action( 'wp_ajax_systemorph_white_papers_success', 'white_papers_success');

function white_papers_success() {
		$post_id = $_REQUEST['post_id'];
		ob_start();
		include get_template_directory() . '/template-parts/page/content-white_papers_success.php';
		$content = ob_get_clean();

		$link = '';
		$redirect_page = the_systemorph_case_study_link($post_id);
		if ($redirect_page) {
			$link = get_permalink($redirect_page->ID);
		}

        echo json_encode(array( 'link' => $link, 'page' => $redirect_page->post_name, 'content' => $content));
        echo $content;

        wp_die();
}

add_action( 'wp_ajax_nopriv_systemorph_case_studies_success', 'case_studies_success');
add_action( 'wp_ajax_systemorph_case_studies_success', 'case_studies_success');
function case_studies_success() {
		$post_id = $_REQUEST['post_id'];
		$page = $_REQUEST['page_id'];
		$redirect_page = the_systemorph_case_study_link($post_id);
		$link = '';
		if ($redirect_page) {
			$link = get_permalink($redirect_page->ID);
		}

        echo json_encode(array( 'link' => $link, 'page' => $redirect_page->post_name));

        wp_die();
}

add_action( "template_redirect", "redirect_to_case_study" );

function redirect_to_case_study() {
    global $post;

	$is_to_redirect = false;

	$page = $post->post_name;
	$query = new WP_Query(array(
	    'post_type' => 'case-studies',
	    'post_status' => 'publish'
	));

	while ($query->have_posts() && !$is_to_redirect) {
	    $query->the_post();
	    $post_id = get_the_ID();
		$redirect_page = the_systemorph_case_study_link($post_id);
		if ($redirect_page) {
			if ($page == $redirect_page->post_name) {
				$is_to_redirect = true;
			}
		}
	}
    if(!isset($_COOKIE[$page]) && $is_to_redirect) {
		wp_redirect(get_permalink($post_id));
    }
}


function systemorph_disable_srcset( $sources ) {
    return false;
}

add_filter( 'wp_calculate_image_srcset', 'systemorph_disable_srcset' );

function sm_admin_styles() {
    wp_register_style( 'add-admin-stylesheet', get_theme_file_uri( '/assets/css/admin.css' ) );
    wp_enqueue_style( 'add-admin-stylesheet' );
}
add_action('admin_enqueue_scripts', 'sm_admin_styles');

function get_sm_page_icon( $id ) {

	if ( !has_blocks( $id ) ) {
			return '';
	}

	$icon = get_post_meta( $id, 'sm_page_icon', true );

	if ( !$icon || $icon == 'none') {
		return '';
	}

	$output = '';

	$iconColor = get_post_meta( $id, 'sm_page_icon_color', true );
	$c = $iconColor ? array_search($iconColor, SMCOLORS) : 'primary';

	$c = ($c == 'tr-white') ? "" : "-$c";

	$iconBColor = get_post_meta( $id, 'sm_page_icon_bcolor', true );
	$b = $iconBColor ? array_search($iconBColor, SMCOLORS) : 'light-gray';

	$output = "<i class=\"icon icon-$icon$c icon-bcolor-$b\"></i>";

	return $output;
}

function get_archive_post_type() {
    return is_archive() ? get_queried_object()->label : false;
}

function sm_trim_excerpt( $text = '' ) {
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
    $excerpt_length = apply_filters('excerpt_length', 55);
    $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
    return wp_trim_words( $text, $excerpt_length, $excerpt_more );
}
add_filter( 'wp_trim_excerpt', 'sm_trim_excerpt' );

function jb_verbose_date_range($start_date = '', $end_date = '') {
    $date_range = '';

	if ( empty($end_date) && ! empty($start_date) ) {
		return date( 'j M Y', $start_date );
	}

    // If only one date, or dates are the same set to FULL verbose date
    if ( date('jMY', $start_date) == date('jMY', $end_date) ) {
        $start_date_pretty = date( 'j M Y', $start_date );
        $end_date_pretty = date( 'j M Y', $end_date );
    } else {
         // Setup basic dates
        $start_date_pretty = date( 'j', $start_date );
        $end_date_pretty = date( 'j M Y', $end_date );

        // If months differ add suffix and year to end_date
        if ( date('M', $start_date) != date('M', $end_date) ) {
        	$start_date_pretty = $start_date_pretty . date( ' M', $start_date);
        }

	    // If years differ add suffix and year to start_date
        if ( date('Y', $start_date) != date('Y', $end_date) ) {
            $start_date_pretty .= date( ' Y', $start_date );
        }
    }

    // build date_range return string
    if( ! empty( $start_date ) ) {
          $date_range .= $start_date_pretty;
    }

    // check if there is an end date and append if not identical
    if( ! empty( $end_date ) ) {
        if( $end_date_pretty != $start_date_pretty ) {
              $date_range .= '&#8211;' . $end_date_pretty;
          }
     }
    return $date_range;
}

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

require get_parent_theme_file_path( '/inc/custom_post_types.php' );
require get_parent_theme_file_path( '/inc/taxonomies.php' );
require get_parent_theme_file_path( '/inc/meta_boxes.php' );

require get_parent_theme_file_path( '/inc/meta-settings.php' );
require get_parent_theme_file_path( '/inc/meta-boxes.php' );
require get_parent_theme_file_path( '/inc/shortcodes.php' );

// function debug_rewrite_rules() {
//     global $wp, $template, $wp_rewrite;

//     echo '<pre>';
//     echo 'Request: ';
//     echo empty($wp->request) ? "None" : esc_html($wp->request) . PHP_EOL;
//     echo 'Matched Rewrite Rule: ';
//     echo empty($wp->matched_rule) ? None : esc_html($wp->matched_rule) . PHP_EOL;
//     echo 'Matched Rewrite Query: ';
//     echo empty($wp->matched_query) ? "None" : esc_html($wp->matched_query) . PHP_EOL;
//     echo 'Loaded Template: ';
//     echo basename($template);
//     echo '</pre>' . PHP_EOL;

//     echo '<pre>';
//     print_r($wp_rewrite->rules);
//     echo '</pre>';
// }

// add_action( 'wp_head', 'debug_rewrite_rules' );