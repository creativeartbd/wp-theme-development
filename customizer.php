<?php 
Kirki::add_config( 'theme_config_id', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

Kirki::add_panel( 'panel_id', array(
    'priority'    => 10,
    'title'       => esc_html__( 'My Panel', 'kirki' ),
    'description' => esc_html__( 'My panel description', 'kirki' ),
) );

Kirki::add_section( 'section_id', array(
    'title'          => esc_html__( 'My Section', 'kirki' ),
    'description'    => esc_html__( 'My section description.', 'kirki' ),
    'panel'          => 'panel_id',
    'priority'       => 160,
) );

Kirki::add_field( 'theme_config_id', [
	'type'        => 'background',
	'settings'    => 'background_setting',
	'label'       => esc_html__( 'Background Control', 'kirki' ),
	'description' => esc_html__( 'Background conrols are pretty complex - but extremely useful if properly used.', 'kirki' ),
	'section'     => 'section_id',
	'default'     => [
		'background-color'      => 'rgba(20,20,20,.8)',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	],
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => 'body',
		],
	],
] );

Kirki::add_field( 'theme_config_id', [
	'type'        => 'color-palette',
	'settings'    => 'color_palette_setting_0',
	'label'       => esc_html__( 'Color-Palette', 'kirki' ),
	'description' => esc_html__( 'This is a color-palette control', 'kirki' ),
	'section'     => 'section_id',
	'default'     => '#888888',
	'choices'     => [
		'colors' => [ '#000000', '#222222', '#444444', '#666666', '#888888', '#aaaaaa', '#cccccc', '#eeeeee', '#ffffff' ],
		'style'  => 'round',
	],
] );

Kirki::add_field( 'theme_config_id', [
	'type'        => 'color-palette',
	'settings'    => 'color_palette_setting_4',
	'label'       => esc_html__( 'Color-Palette', 'kirki' ),
	'description' => esc_html__( 'Material Design Colors - all', 'kirki' ),
	'section'     => 'section_id',
	'default'     => '#F44336',
	'choices'     => [
		'colors' => Kirki_Helper::get_material_design_colors( 'all' ),
		'size'   => 20,
	],
] );

Kirki::add_field( 'theme_config_id', [
	'type'        => 'toggle',
	'settings'    => 'toggle_setting',
	'label'       => esc_html__( 'This is the label', 'kirki' ),
	'section'     => 'section_id',
	'default'     => '1',
	'priority'    => 10,
] );

Kirki::add_field( 'theme_config_id', [
	'type'        => 'slider',
	'settings'    => 'slider_setting',
	'label'       => esc_html__( 'This is the label', 'kirki' ),
	'section'     => 'section_id',
	'default'     => 42,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
] );

/**
 * Default behaviour (saves data as a URL).
 */
Kirki::add_field( 'theme_config_id', [
	'type'        => 'image',
	'settings'    => 'image_setting_url',
	'label'       => esc_html__( 'Image Control (URL)', 'kirki' ),
	'description' => esc_html__( 'Description Here.', 'kirki' ),
	'section'     => 'section_id',
	'default'     => '',
] );

/**
 * Save data as integer (ID)
 */
Kirki::add_field( 'theme_config_id', [
	'type'        => 'image',
	'settings'    => 'image_setting_id',
	'label'       => esc_html__( 'Image Control (ID)', 'kirki' ),
	'description' => esc_html__( 'Description Here.', 'kirki' ),
	'section'     => 'section_id',
	'default'     => '',
	'choices'     => [
		'save_as' => 'id',
	],
] );

/**
 * Save data as array.
 */
Kirki::add_field( 'theme_config_id', [
	'type'        => 'image',
	'settings'    => 'image_setting_array',
	'label'       => esc_html__( 'Image Control (array)', 'kirki' ),
	'description' => esc_html__( 'Description Here.', 'kirki' ),
	'section'     => 'section_id',
	'default'     => '',
	'choices'     => [
		'save_as' => 'array',
	],
] );

add_action( 'customize_register', 'shibbir_customizer_register');
function shibbir_customizer_register ( $wp_customizer ) {

    $wp_customizer->add_section( 'shibbir_services', array(
        'title' =>  __('Service Section', 'shibbir'),
        'description'   =>  __('Service Description', 'shibbir'),
        'priority'  =>  100,
    ));

    $wp_customizer->add_setting( 'shibbir_service_heading', array(
        'default'   =>  __('Mission Statement Settings', 'shibbir'),
        'transport' =>  'postMessage'
    ));

    $wp_customizer->add_control( 'shibbir_service_heading_ctrl', array(
        'label' =>  __('Services Heading Control', 'shibbir'),
        'section'   =>  'shibbir_services', 
        'settings'  =>  'shibbir_service_heading',
        'type'  =>  'text'
    ));

    /* ======================== */
    /* Checkbox
    /* ======================== */

    $wp_customizer->add_setting( 'shibbir_display_heading', array(
        'default'   =>  1,
        'transport' =>  'refresh'
    ));

    $wp_customizer->add_control( 'shibbir_display_heading_ctrl', array(
        'label' =>  __('Display Heading Control', 'shibbir'),
        'section'   =>  'shibbir_services', 
        'settings'  =>  'shibbir_display_heading',
        'type'  =>  'checkbox'
    ));

    /* ======================== */
    /* Radio
    /* ======================== */

    $wp_customizer->add_section( 'shibbir_others', array(
        'title' =>  __('Other Conrols', 'shibbir'),
        'description'   =>  __('Other controls Description', 'shibbir'),
        'priority'  =>  105,
    ));

    $wp_customizer->add_setting( 'shibbir_others_settings', array(
        'transport' =>  'refresh',
        'default'   =>  'choice2'
    ));

    $wp_customizer->add_control( 'shibbir_others_settings_ctrl', array(
        'label' =>  __('Radio Control', 'shibbir'),
        'section'   =>  'shibbir_others', 
        'settings'  =>  'shibbir_others_settings',
        'type'  =>  'radio',
        'choices'   =>  array(
            'choice1'  =>   'Choice One',
            'choice2'  =>   'Choice Two',
            'choice3'  =>   'Choice Three',
        )
    ));

    /* ======================== */
    /* Drop down pages
    /* ======================== */

    $wp_customizer->add_setting( 'shibbir_others_dropdown_settings', array(
        'transport' =>  'refresh',
    ));

    $wp_customizer->add_control( 'shibbir_others_dropdown_settings_ctrl', array(
        'label' =>  __('Dropdown Page', 'shibbir'),
        'section'   =>  'shibbir_others', 
        'settings'  =>  'shibbir_others_dropdown_settings',
        'type'  =>  'dropdown-pages',
        'allow_addition'    => true,
    ));

    /* ======================== */
    /* Checkbox
    /* ======================== */

    $wp_customizer->add_section( 'shibbir_html', array(
        'title' =>  __('HTML5 Section', 'shibbir'),
        'description'   =>  __('HTML5 section Description', 'shibbir'),
        'priority'  =>  105,
    ));

    $wp_customizer->add_setting( 'shibbir_html_settings', array(
        'transport' =>  'refresh',
        'default'   => 2
    ));

    $wp_customizer->add_control( 'shibbir_html_number_ctrl', array(
        'label' =>  __('Enter your number', 'shibbir'),
        'section'   =>  'shibbir_html', 
        'settings'  =>  'shibbir_html_settings',
        'type'  =>  'number',
        'steps'    => 2,
    ));

    /* ======================== */
    /* Color
    /* ======================== */

    $wp_customizer->add_setting( 'shibbir_html_color_settings', array(
        'transport' =>  'postMessage',
    ));

    $wp_customizer->add_control( new WP_Customize_Color_Control( 
        $wp_customizer, 'shibbir_html_color_settings_ctrl', array(
                'label' =>  __('Color', 'shibbir'),
                'section'   =>  'shibbir_html', 
                'settings'  =>  'shibbir_html_color_settings',
                'type'  =>  'color',
            )
        )
    );

    /* ======================== */
    /* Checkbox
    /* ======================== */

    $wp_customizer->add_section( 'shibbir_about_section', array(
        'title' =>  __('About Section', 'shibbir'),
        'description'   =>  __('About Section Description', 'shibbir'),
        'priority'  =>  105,
        'active_callback'   =>  function() {
            return is_page_template('page-templates/about-template.php');
        }
    ));

    $wp_customizer->add_setting( 'shibbir_about_settings', array(
        'transport' =>  'postMessage',
    ));

    $wp_customizer->add_control( 'shibbir_about_ctrl', array(
        'label' =>  __('About Page Heading', 'shibbir'),
        'section'   =>  'shibbir_about_section', 
        'settings'  =>  'shibbir_about_settings',
        'type'  =>  'text',
    ));

    $wp_customizer->add_setting( 'shibbir_about_description_settings', array(
        'transport' =>  'postMessage',
    ));

    $wp_customizer->add_control( 'shibbir_about_description_settings', array(
        'label' =>  __('About Page Description', 'shibbir'),
        'section'   =>  'shibbir_about_section', 
        'type'  =>  'textarea',
    ));

    // Selective Refresh 
    $wp_customizer->selective_refresh->add_partial('about_section', array(
        'selector'  =>  '#about-heading',
        'settings'  =>  'shibbir_about_settings',
        'render_callback'   => function() {
            return get_theme_mod('shibbir_about_settings');
        }
    ));

    $wp_customizer->selective_refresh->add_partial('about_section_description', array(
        'selector'  =>  '#about-description',
        'settings'  =>  'shibbir_about_description_settings',
        'render_callback'   => function() {
            return get_theme_mod('shibbir_about_description_settings');
        }
    ));

}