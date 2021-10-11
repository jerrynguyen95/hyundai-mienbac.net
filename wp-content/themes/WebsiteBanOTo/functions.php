<?php
/**
 * _s functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */

if ( ! function_exists( '_s_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function _s_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _s, use a find and replace
		 * to change '_s' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( '_s', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', '_s' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( '_s_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', '_s_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _s_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( '_s_content_width', 640 );
}
add_action( 'after_setup_theme', '_s_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _s_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', '_s' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', '_s' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer1', '_s' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', '_s' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer2', '_s' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add widgets here.', '_s' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<p class="footer-middle-hotline-title">',
		'after_title'   => '</p>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header1', '_s' ),
		'id'            => 'sidebar-4',
		'description'   => esc_html__( 'Add widgets here.', '_s' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Hotline-footer', '_s' ),
		'id'            => 'hotline-4',
		'description'   => esc_html__( 'Add widgets here.', '_s' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', '_s_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function _s_scripts() {
	wp_enqueue_style( '_s-style', get_stylesheet_uri() );

	wp_enqueue_script( '_s-bootstrapJs', get_template_directory_uri() . '/layouts/js/bootstrap.min.js', array(), '20151215', true );

	wp_enqueue_script( '_s-js', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	
	wp_enqueue_script( '_s-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', '_s_scripts' );

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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);
 
function change_existing_currency_symbol( $currency_symbol, $currency ) {
 switch( $currency ) {
 case 'VND': $currency_symbol = 'VNĐ'; break;
 }
 return $currency_symbol;
}

/**
@Tao customize
**/
class STheme_Customize {
        public static function register ( $wp_customize ) {
                $wp_customize->add_section( 'stheme_options_section', array(
                        'title' => __( 'Cấu hình giao diện',  '_s'  ),
                        'priority' => 35,
                        'capability' => 'edit_theme_options',  // cap quyen chinh sua giao dien cho tai khoan duoc cap quyen
                        'description' => __('Cài đặt tùy chọn cho giao diện.',  '_s' ),
                        )
                );

                $wp_customize->add_setting( 'stheme_options[service1_link]', array( //luu lai dang mang0
                        'default' => '',
                        'type' => 'option',
                        'capability' => 'edit_theme_options', 
                        'transport' => 'postMessage', 
                        )
                );
                $wp_customize->add_control( 'stheme_service1_link', array( //id
                        'label' => __( 'Link địa chỉ dịch vụ 1',  '_s'  ), // tu xuat hien tieu de
                        'section' => 'stheme_options_section', //thuoc ve section naof
                        'settings' => 'stheme_options[service1_link]', // dai dien cho stting url
                        'priority' => 10,
                        )
                );

                $wp_customize->add_setting( 'stheme_options[service1_image]', array( //luu lai dang mang0
                        'default' => '',
                        'type' => 'option',
                        'capability' => 'edit_theme_options', 
                        'transport' => 'postMessage', 
                        )
                );
                $wp_customize->add_control( 'stheme_service1_image', array( //id
                        'label' => __( 'Link ảnh dịch vụ 1',  '_s'  ), // tu xuat hien tieu de
                        'section' => 'stheme_options_section', //thuoc ve section naof
                        'settings' => 'stheme_options[service1_image]', // dai dien cho stting url
                        'priority' => 10,
                        )
                );



                $wp_customize->add_setting( 'stheme_options[service2_link]', array( //luu lai dang mang0
                        'default' => '',
                        'type' => 'option',
                        'capability' => 'edit_theme_options', 
                        'transport' => 'postMessage', 
                        )
                );
                $wp_customize->add_control( 'stheme_service2_link', array( //id
                        'label' => __( 'Link địa chỉ dịch vụ 2',  '_s'  ), // tu xuat hien tieu de
                        'section' => 'stheme_options_section', //thuoc ve section naof
                        'settings' => 'stheme_options[service2_link]', // dai dien cho stting url
                        'priority' => 10,
                        )
                );

                $wp_customize->add_setting( 'stheme_options[service2_image]', array( //luu lai dang mang0
                        'default' => '',
                        'type' => 'option',
                        'capability' => 'edit_theme_options', 
                        'transport' => 'postMessage', 
                        )
                );
                $wp_customize->add_control( 'stheme_service2_image', array( //id
                        'label' => __( 'Link ảnh dịch vụ 2',  '_s'  ), // tu xuat hien tieu de
                        'section' => 'stheme_options_section', //thuoc ve section naof
                        'settings' => 'stheme_options[service2_image]', // dai dien cho stting url
                        'priority' => 10,
                        )
                );

                $wp_customize->add_setting( 'stheme_options[service3_link]', array( //luu lai dang mang0
                        'default' => '',
                        'type' => 'option',
                        'capability' => 'edit_theme_options', 
                        'transport' => 'postMessage', 
                        )
                );
                $wp_customize->add_control( 'stheme_service3_link', array( //id
                        'label' => __( 'Link địa chỉ dịch vụ 3',  '_s'  ), // tu xuat hien tieu de
                        'section' => 'stheme_options_section', //thuoc ve section naof
                        'settings' => 'stheme_options[service3_link]', // dai dien cho stting url
                        'priority' => 10,
                        )
                );

                $wp_customize->add_setting( 'stheme_options[service3_image]', array( //luu lai dang mang0
                        'default' => '',
                        'type' => 'option',
                        'capability' => 'edit_theme_options', 
                        'transport' => 'postMessage', 
                        )
                );
                $wp_customize->add_control( 'stheme_service3_image', array( //id
                        'label' => __( 'Link ảnh dịch vụ 3',  '_s'  ), // tu xuat hien tieu de
                        'section' => 'stheme_options_section', //thuoc ve section naof
                        'settings' => 'stheme_options[service3_image]', // dai dien cho stting url
                        'priority' => 10,
                        )
                );

                $wp_customize->add_setting( 'stheme_options[service4_link]', array( //luu lai dang mang0
                        'default' => '',
                        'type' => 'option',
                        'capability' => 'edit_theme_options', 
                        'transport' => 'postMessage', 
                        )
                );
                $wp_customize->add_control( 'stheme_service4_link', array( //id
                        'label' => __( 'Link địa chỉ dịch vụ 4',  '_s'  ), // tu xuat hien tieu de
                        'section' => 'stheme_options_section', //thuoc ve section naof
                        'settings' => 'stheme_options[service4_link]', // dai dien cho stting url
                        'priority' => 10,
                        )
                );

                $wp_customize->add_setting( 'stheme_options[service4_image]', array( //luu lai dang mang0
                        'default' => '',
                        'type' => 'option',
                        'capability' => 'edit_theme_options', 
                        'transport' => 'postMessage', 
                        )
                );
                $wp_customize->add_control( 'stheme_service4_image', array( //id
                        'label' => __( 'Link ảnh dịch vụ 4',  '_s'  ), // tu xuat hien tieu de
                        'section' => 'stheme_options_section', //thuoc ve section naof
                        'settings' => 'stheme_options[service4_image]', // dai dien cho stting url
                        'priority' => 10,
                        )
                );

                $wp_customize->add_setting( 'stheme_options[show_all]', array( //luu lai dang mang0
                        'default' => '',
                        'type' => 'option',
                        'capability' => 'edit_theme_options', 
                        'transport' => 'postMessage', 
                        )
                );
                $wp_customize->add_control( 'stheme_show_all', array( //id
                        'label' => __( 'Link button Xem tất cả',  '_s'  ), // tu xuat hien tieu de
                        'section' => 'stheme_options_section', //thuoc ve section naof
                        'settings' => 'stheme_options[show_all]', // dai dien cho stting url
                        'priority' => 10,
                        )
                );



                $wp_customize->add_setting( 'stheme_options[social_facebook]', array( //luu lai dang mang0
                        'default' => '',
                        'type' => 'option',
                        'capability' => 'edit_theme_options', 
                        'transport' => 'postMessage', 
                        )
                );
                $wp_customize->add_control( 'stheme_social_facebook', array( //id
                        'label' => __( 'Địa chỉ link fanpage facebook:',  '_s'  ), // tu xuat hien tieu de
                        'section' => 'stheme_options_section', //thuoc ve section naof
                        'settings' => 'stheme_options[social_facebook]', // dai dien cho stting url
                        'priority' => 10,
                        )
                );




                $wp_customize->add_setting( 'stheme_options[social_youtube]', array( //luu lai dang mang0
                        'default' => '',
                        'type' => 'option',
                        'capability' => 'edit_theme_options', 
                        'transport' => 'postMessage', 
                        )
                );
                $wp_customize->add_control( 'stheme_social_youtube', array( //id
                        'label' => __( 'Địa chỉ link youtube:',  '_s'  ), // tu xuat hien tieu de
                        'section' => 'stheme_options_section', //thuoc ve section naof
                        'settings' => 'stheme_options[social_youtube]', // dai dien cho stting url
                        'priority' => 10,
                        )
                );


                $wp_customize->add_setting( 'stheme_options[social_gmail]', array( //luu lai dang mang0
                        'default' => '',
                        'type' => 'option',
                        'capability' => 'edit_theme_options', 
                        'transport' => 'postMessage', 
                        )
                );
                $wp_customize->add_control( 'stheme_ssocial_gmail', array( //id
                        'label' => __( 'Địa chỉ link gmail:',  '_s'  ), // tu xuat hien tieu de
                        'section' => 'stheme_options_section', //thuoc ve section naof
                        'settings' => 'stheme_options[social_gmail]', // dai dien cho stting url
                        'priority' => 10,
                        )
                );
			
			$wp_customize->add_setting( 'stheme_options[zalo]', array( //luu lai dang mang0
                        'default' => '',
                        'type' => 'option',
                        'capability' => 'edit_theme_options', 
                        'transport' => 'postMessage', 
                        )
                );
                $wp_customize->add_control( 'stheme_zalo', array( //id
                        'label' => __( 'ID ZALO:',  '_s'  ), // tu xuat hien tieu de
                        'section' => 'stheme_options_section', //thuoc ve section naof
                        'settings' => 'stheme_options[zalo]', // dai dien cho stting url
                        'priority' => 10,
                        )
                );

                $wp_customize->get_setting( 'stheme_options[service1_image]' )->transport = 'postMessage';
                $wp_customize->get_setting( 'stheme_options[service1_link]' )->transport = 'postMessage';
                $wp_customize->get_setting( 'stheme_options[service2_image]' )->transport = 'postMessage';
                $wp_customize->get_setting( 'stheme_options[service2_link]' )->transport = 'postMessage';
                $wp_customize->get_setting( 'stheme_options[service3_image]' )->transport = 'postMessage';
                $wp_customize->get_setting( 'stheme_options[service3_link]' )->transport = 'postMessage';
                $wp_customize->get_setting( 'stheme_options[service4_image]' )->transport = 'postMessage';
                $wp_customize->get_setting( 'stheme_options[service4_link]' )->transport = 'postMessage';
                $wp_customize->get_setting( 'stheme_options[zalo]' )->transport = 'postMessage';

                $wp_customize->get_setting( 'stheme_options[show_all]' )->transport = 'postMessage';

                $wp_customize->get_setting( 'stheme_options[social_facebook]' )->transport = 'postMessage';
                $wp_customize->get_setting( 'stheme_options[social_gmail]' )->transport = 'postMessage';
                $wp_customize->get_setting( 'stheme_options[social_youtube]' )->transport = 'postMessage';
        }
}
add_action( 'customize_register' , array( 'STheme_Customize' , 'register' ) );


function custom_excerpt_length( $length ) {
        return 20;
    }
    add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function bootstrap_classes_tinymce($settings)
{
    $styles = array(
        array(
            'title' => 'None',
            'value' => ''
        ),
        array(
            'title' => 'Default',
            'value' => 'default-table',
        ),
        array(
            'title' => 'Custom',
            'value' => 'custom-table',
        ),
    );
 
    $settings['table_class_list'] = json_encode($styles);
 
    return $settings;
}
 
add_filter('tiny_mce_before_init', 'bootstrap_classes_tinymce');


// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
function loop_columns() {
return 5; // 3 products per row
}
}