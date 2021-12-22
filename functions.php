<?php 

add_action( 'after_theme_setup', 'shibbir_theme_setup' );
if( ! function_exists( 'shibbir_theme_setup') ) {
    function shibbir_theme_setup () {

        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'post-formates', array(
            'aside', 'gallery', 'quote', 'image', 'video'
        ) );

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
