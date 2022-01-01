<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <title>Document</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class();?>>

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <?php 
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo = wp_get_attachment_image_src( $custom_logo_id, 'full' );

        // echo '<pre>'; 
        //     echo print_r( $logo ); 
        // echo '</pre>';


        if( has_custom_logo() ) {
            //echo get_custom_logo();
            echo "<a href='".home_url('/')."'><img src='".$logo[0]."' width='".$logo[1]."' ></a>";
        }

        // echo '<pre>'; 
        //     echo print_r( get_theme_mod( 'custom-logo' ) ); 
        // echo '</pre>';
        // echo '<hr/>';


        if(has_custom_header()) {
            $header_image = get_header_image();
            $header_image_width = get_custom_header()->width;
            $header_image_height = get_custom_header()->height;
            echo "<img src='$header_image' width='$header_image_width' height='$header_image_height' class='img-fluid'>";
        }

        // echo '<pre>'; 
        //     echo print_r( get_custom_header() ); 
        // echo '</pre>';
        echo '<hr/>';

        wp_nav_menu(array(
            'theme-location'    =>  'header-menu',
            'menu_class'    =>  'navbar-nav mr-auto',
            'container' =>   'nav',
            'container_class'   =>  'navbar navbar-expand-lg navbar-light bg-light',
        ))
        ?>
        </div>
    </div>
</div>

