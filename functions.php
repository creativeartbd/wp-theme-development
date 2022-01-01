<?php 
add_filter('nav_menu_css_class', 'add_class_li_element', 1, 3);
function add_class_li_element($classes, $item, $args) {
    $classes[] = 'nav-item';
    return $classes;
}

add_filter( 'nav_menu_link_attributes', 'add_class_to_anchor', 10, 3 );
function add_class_to_anchor( $atts, $item, $args ) {
    $class = 'nav-link'; // or something based on $item
    $atts['class'] = $class;
    return $atts;
}

// Registter a navmenu
add_action('init', 'register_my_menu');
function register_my_menu() {
    register_nav_menus(array(
        'header-menu'   =>  __('Header Menu', 'shibbir'),
        'footer-menu'   =>  __('Footer menu', 'shibbir'),
    ));
}

// Create a new Widgets
if( file_exists( dirname( __FILE__) . '/register_widgets.php' ) ) {
    require_once dirname( __FILE__ ) . '/register_widgets.php';
}

// Register a side
add_action( 'widgets_init', 'shibbir_register_widget' );
function shibbir_register_widget() {
    register_sidebar( array(
        'id'    =>  'right-sidebare',
        'name'  =>  __('Right Sidebar', 'shibbir' ),
        'desciption'    =>  __('Right sidebar content', 'shibbir'), 
        'before_widget' =>  '<div id="%1$s" class="widget %2$s">',
        'after_widget'  =>  '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}


// set default headerimage
register_default_headers( array(
    'default'   => array(
        'url'   =>  get_template_directory_uri() . '/assets/images/default.jpeg',
        'thumbnail_url' =>  get_template_directory_uri() . '/assets/images/default.jpeg',
        'description'   =>  'default',
    ),
    'alternative'   =>  array(
        'url'   =>  get_template_directory_uri() . '/assets/images/alternative.jpeg',
        'thumbnail_url' =>  get_template_directory_uri() . '/assets/images/alternative.jpeg',
        'description'   =>  'alternative',
    )
) );

add_action( 'after_setup_theme', 'themename_custom_header_setup' );
function themename_custom_header_setup() {
    $args = array(
        'default-image'      => get_template_directory_uri() . '/assets/images/default-banner.png',
        'default-text-color' => '#000',
        'header-text'        => true,
        'width'              => 1000,
        'height'             => 250,
        'flex-width'         => true,
        'flex-height'        => true,
    );
    add_theme_support( 'custom-header', $args );

    $defaults = array(
        'height'    =>  100, 
        'width' =>  100,
        'flex-width'    =>  true, 
        'flex-height'   =>  true,
        'header_text'   =>  array( 'Site title', 'Site Description' )
    );
    add_theme_support( 'custom-logo', $defaults );
    
    add_theme_support( 'post-formats', array(
        'aside', 'gallery'
    ));
}


add_action( 'after_theme_setup', 'shibbir_theme_setup' );
if( ! function_exists( 'shibbir_theme_setup') ) {
    function shibbir_theme_setup () {

        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'post-formates', array(
            'aside', 'gallery', 'quote', 'image', 'video'
        ) );
        // add_theme_support( 'custom-header', array( 
        //     'default-text-color'    =>  '#000',
        //     'width' =>  1000,
        //     'height'    =>  250, 
        // ) );

        // Register menu
        register_nav_menus(array(
            'primary'   =>  __( 'Prmary Menu', 'Shibbir' ),
            'secondary'   =>  __( 'Secondary Menu', 'Shibbir' )
        ));

        // load textdomain
        load_theme_textdomain( 'shibbir', get_template_directory() . '/languages');
    }
}


add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
function add_theme_scripts () {
    // load all style files
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' );
    // load all javascript files
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/main.js', array('jquery'), 1.0, true );
}

if ( ! isset ( $content_width) ) {
    $content_width = 800;
}

// echo get_theme_file_uri();
// echo '<hr/>';
// echo get_theme_file_path();


    

// add_filter('frontpage_template', 'frontpage_template_filter');
// function frontpage_template_filter( $templates ) {
//     print_r( $templates );
// }
