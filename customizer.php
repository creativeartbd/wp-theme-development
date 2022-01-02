<?php 
add_action( 'customize_register', 'shibbir_customizer_register');
function shibbir_customizer_register ( $wp_customizer ) {

    $wp_customizer->add_section( 'shibbir_services', array(
        'title' =>  __('Service', 'shibbir'),
        'priority'  =>  100,
    ));

    $wp_customizer->add_setting( 'shibbir_service_heading', array(
        'default'   =>  __('Mission Statement', 'shibbir'),
        'transport' =>  'refresh'
    ));

    $wp_customizer->add_control( 'shibbir_service_heading_ctrl', array(
        'label' =>  __('Services Heading', 'shibbir'),
        'section'   =>  'shibbir_services', 
        'settings'  =>  'shibbir_service_heading',
        'type'  =>  'text'
    ));
}