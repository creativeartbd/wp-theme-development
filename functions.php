<?php 

add_filter('frontpage_template', 'frontpage_template_filter');
function frontpage_template_filter( $templates ) {
    print_r( $templates );
}