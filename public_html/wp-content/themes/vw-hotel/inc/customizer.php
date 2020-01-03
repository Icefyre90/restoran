<?php
/**
 * VW Hotel Theme Customizer
 *
 * @package VW Hotel
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_hotel_customize_register( $wp_customize ) {

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_hotel_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-hotel' ),
	    'description' => __( 'Description of what this panel does.', 'vw-hotel' ),
	) );

	$wp_customize->add_section( 'vw_hotel_left_right', array(
    	'title'      => __( 'General Settings', 'vw-hotel' ),
		'priority'   => 30,
		'panel' => 'vw_hotel_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_hotel_theme_options',array(
        'default' => __('Right Sidebar','vw-hotel'),
        'sanitize_callback' => 'vw_hotel_sanitize_choices'	        
	));
	$wp_customize->add_control('vw_hotel_theme_options',array(
        'type' => 'radio',
        'label' => __('Do you want this section','vw-hotel'),
        'section' => 'vw_hotel_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-hotel'),
            'Right Sidebar' => __('Right Sidebar','vw-hotel'),
            'One Column' => __('One Column','vw-hotel'),
            'Three Columns' => __('Three Columns','vw-hotel'),
            'Four Columns' => __('Four Columns','vw-hotel'),
            'Grid Layout' => __('Grid Layout','vw-hotel')
        ),
	) );
    
	//Slider
	$wp_customize->add_section( 'vw_hotel_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-hotel' ),
		'priority'   => null,
		'panel' => 'vw_hotel_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_hotel_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_hotel_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_hotel_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-hotel' ),
			'description' => __('Slider image size (1500 x 665)','vw-hotel'),
			'section'  => 'vw_hotel_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	// About
	$wp_customize->add_section('vw_hotel_aboutus_section',array(
		'title'	=> __('About Section','vw-hotel'),
		'description'	=> __('Add About sections below.','vw-hotel'),
		'panel' => 'vw_hotel_panel_id',
	));

	$wp_customize->add_setting('vw_hotel_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_hotel_section_title',array(
		'label'	=> __('Section Title','vw-hotel'),
		'section'=> 'vw_hotel_aboutus_section',
		'setting'=> 'vw_hotel_section_title',
		'type'=> 'text'
	));

	for ( $count = 1; $count <= 1; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_hotel_about_section' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_hotel_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_hotel_about_section' . $count, array(
			'label'    => __( 'Select Page', 'vw-hotel' ),
			'section'  => 'vw_hotel_aboutus_section',
			'type'     => 'dropdown-pages'
		) );
	}

	$post_list = get_posts();
	$i = 0;
	foreach($post_list as $post){
		$posts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('vw_hotel_offer_image',array(
		'sanitize_callback' => 'vw_hotel_sanitize_choices',
	));
	$wp_customize->add_control('vw_hotel_offer_image',array(
		'type'    => 'select',
		'choices' => $posts,
		'label' => __('Select post','vw-hotel'),		
		'description' => __('Image size (350 x 400)','vw-hotel'),
		'section' => 'vw_hotel_aboutus_section',
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	foreach($categories as $category){
	if($i==0){
	$default = $category->slug;
	$i++;
	}
	$cats[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_hotel_service_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_hotel_sanitize_choices',
	));
	$wp_customize->add_control('vw_hotel_service_category',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Category to display Services','vw-hotel'),
		'description' => __('Image size (60 x 60)','vw-hotel'),
		'section' => 'vw_hotel_aboutus_section',
	));

	//Footer Text
	$wp_customize->add_section('vw_hotel_footer',array(
		'title'	=> __('Footer','vw-hotel'),
		'description'=> __('This section will appear in the footer','vw-hotel'),
		'panel' => 'vw_hotel_panel_id',
	));	
	
	$wp_customize->add_setting('vw_hotel_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_hotel_footer_text',array(
		'label'	=> __('Copyright Text','vw-hotel'),
		'section'=> 'vw_hotel_footer',
		'setting'=> 'vw_hotel_footer_text',
		'type'=> 'text'
	));	
}

add_action( 'customize_register', 'vw_hotel_customize_register' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Hotel_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Hotel_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new VW_Hotel_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Hotel Pro Theme', 'vw-hotel' ),
					'pro_text' => esc_html__( 'Upgrade Pro', 'vw-hotel' ),
					'pro_url'  => esc_url('https://www.vwthemes.com/themes/wordpress-hotel-theme/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-hotel-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-hotel-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Hotel_Customize::get_instance();