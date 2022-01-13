<?php

add_action( 'woocommerce_sidebar', 'shibbir_woocommerce_sidebar' );
function shibbir_woocommerce_sidebar() {
    echo 'hello sidebare of woo';
}

add_action( 'woocommerce_before_shop_loop', 'shibbir_woocommerce_before_shop_loop' );
function shibbir_woocommerce_before_shop_loop() {

    // get sub categories
    $term_id = get_queried_object()->term_id;
    $parent_id = get_queried_object()->parent;

    if( $term_id == $parent_id ) {
        echo "<ul>";
            woocommerce_output_product_categories();
        echo "</ul>";
    }
    
    if( $parent_id > 0 ) {
        $term_id = $parent_id;
    }
    if( $term_id ) {
        echo "<ul>";
            woocommerce_output_product_categories(array(
                'parent_id' => $term_id
            ));
        echo "</ul>";
    }
}

// Exclude product
//dd_filter( 'woocommerce_product_query', 'shibbir_woocommece_product_query' );
function shibbir_woocommece_product_query ( $wq) {

    // exclude some category
    $tax_query = $wq->get('tax_query');
    $tax_query[] = array(
        'taxonomy'  =>  'product_cat',
        'field' =>  'slug',
        'terms' =>  array('clothing'),
        'operator'  =>  'NOT IN'
    );
    
    $wq->set('tax_query', $tax_query);
    // exclude product
    // $q->set('post__not_in', array(1787));
    
    return $wq;
}

add_filter( 'woocommerce_short_description', 'shibbir_woocommerce_short_description' );
function shibbir_woocommerce_short_description( $description ) {
    return strtoupper( $description );
}

add_filter( 'woocommerce_product_tabs', 'shibbir_woocommerce_product_tabs' );
function shibbir_woocommerce_product_tabs( $tabs ) {

    echo '<pre>'; 
        print_r( $tabs ); 
    echo '</pre>';

    $tabs['newtab'] = array(
        'title' =>  'New Tab',
        'priority'  =>  20,
        'callback'  =>  'newTabCallback'
    );
    
    return $tabs;
}

function newTabCallback( ) {
    echo 'New Tab Callback';
}