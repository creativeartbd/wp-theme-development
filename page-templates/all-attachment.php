<?php 
/*
* Template Name: All attachment
*/

$args = array(
    // 'post_parent'   => get_the_ID(),
    'post_type' =>  'attachment',
    'post_mime_type'    =>  'image',
);

$posts = get_posts( $args );

if( $posts ) {
    foreach ( $posts as $post ) {
        $meta_data = wp_get_attachment_metadata( $post->ID, true );
        echo '<pre>'; 
            echo print_r( $meta_data ); 
        echo '</pre>';
        
    }
}