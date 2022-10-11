<?php
/**
 * pnf functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pnf
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.5' );
}

if ( ! function_exists( 'pnf_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function pnf_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on pnf, use a find and replace
		 * to change 'pnf' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'pnf', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'pnf' ),
				'menu-2' => esc_html__( 'Footer', 'pnf' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'pnf_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'pnf_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pnf_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pnf_content_width', 640 );
}
add_action( 'after_setup_theme', 'pnf_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pnf_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'pnf' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'pnf' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'pnf_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pnf_scripts() {
	wp_enqueue_style( 'pnf-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'slick-style', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), _S_VERSION );
	wp_style_add_data( 'pnf-style', 'rtl', 'replace' );
	
	wp_enqueue_script("jquery");

	wp_enqueue_script( 'scrollreveal', 'https://unpkg.com/scrollreveal', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'pnf-scroll-animation', get_template_directory_uri() . '/js/scroll-animation.js', array('scrollreveal'), _S_VERSION, true );

	wp_enqueue_script( 'popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array('jquery', 'popper'), _S_VERSION, true );
	wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'parallax', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js', array('gsap'), _S_VERSION, true );
	wp_enqueue_script( 'parallax-gsap', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.min.js', array('parallax'), _S_VERSION, true );
	wp_enqueue_script( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'pnf-parallax', get_template_directory_uri() . '/js/parallax.js', array('parallax-gsap'), _S_VERSION, true );


	wp_enqueue_script( 'pnf-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), _S_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'pnf_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

require get_template_directory() .'/inc/class-wp-bootstrap-navwalker.php';

/* Block registered */
add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'testimonial',
            'title'             => __('Testimonial'),
            'description'       => __('A custom testimonial block.'),
            'render_template'   => 'template-parts/blocks/testimonial.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'testimonial', 'quote' ),
        ));
        acf_register_block_type(array(
            'name'              => 'hero',
            'title'             => __('Hero'),
            'description'       => __('Hero section for each page.'),
            'render_template'   => 'template-parts/blocks/hero.php',
            'category'          => 'theme',
            'keywords'          => array( 'hero', 'quote' ),
        ));
        acf_register_block_type(array(
            'name'              => 'image-copy-split',
            'title'             => __('Image / Copy Block'),
            'description'       => __('Block with image one side, content other side'),
            'render_template'   => 'template-parts/blocks/image-copy-split.php',
            'category'          => 'theme',
            'keywords'          => array( 'image', 'copy', 'split' ),
        ));
        acf_register_block_type(array(
            'name'              => 'get-in-touch',
            'title'             => __('Get in Touch Block'),
            'description'       => __('Block for get in touch'),
            'render_template'   => 'template-parts/blocks/get-in-touch.php',
            'category'          => 'theme',
            'keywords'          => array( 'contact', 'get in touch' ),
        ));
        acf_register_block_type(array(
            'name'              => 'intro-para',
            'title'             => __('Intro Para Block'),
            'description'       => __('Block for intro para'),
            'render_template'   => 'template-parts/blocks/intro-para.php',
            'category'          => 'theme',
            'keywords'          => array( 'paragraph', 'intro' ),
        ));
        acf_register_block_type(array(
            'name'              => 'scroller',
            'title'             => __('Home content scroller'),
            'description'       => __(''),
            'render_template'   => 'template-parts/blocks/scroller.php',
            'category'          => 'theme',
            'keywords'          => array( 'scroll', 'scroller', 'home' ),
        ));
        acf_register_block_type(array(
            'name'              => 'slider',
            'title'             => __('Feature slider'),
            'description'       => __(''),
            'render_template'   => 'template-parts/blocks/slider.php',
            'category'          => 'theme',
            'keywords'          => array( 'slide', 'slider' ),
        ));
    }
}

add_action('enqueue_block_editor_assets','add_block_editor_assets',10,0);
function add_block_editor_assets(){
  wp_enqueue_style('block_editor_css', get_template_directory_uri() . '/style.css');
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Site Global Content',
		'menu_title'	=> 'Site Global Content',
		'menu_slug' 	=> 'site-global-content',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}