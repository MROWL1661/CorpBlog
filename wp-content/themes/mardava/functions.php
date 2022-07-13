<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// Overwrite parent theme background defaults and registers support for WordPress features.
add_action( 'after_setup_theme', 'lalita_background_setup' );
function lalita_background_setup() {
	add_theme_support( "custom-background",
		array(
			'default-color' 		 => 'ffffff',
			'default-image'          => '',
			'default-repeat'         => 'repeat',
			'default-position-x'     => 'left',
			'default-position-y'     => 'top',
			'default-size'           => 'auto',
			'default-attachment'     => '',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => ''
		)
	);
}

// Overwrite theme URL
function lalita_theme_uri_link() {
	return 'https://wpkoi.com/mardava-wpkoi-wordpress-theme/';
}

// Overwrite parent theme's blog header function
add_action( 'lalita_after_header', 'lalita_blog_header_image', 11 );
function lalita_blog_header_image() {

	if ( ( is_front_page() && is_home() ) || ( is_home() ) ) { 
		$blog_header_image 			=  lalita_get_setting( 'blog_header_image' ); 
		$blog_header_title 			=  lalita_get_setting( 'blog_header_title' ); 
		$blog_header_text 			=  lalita_get_setting( 'blog_header_text' ); 
		$blog_header_button_text 	=  lalita_get_setting( 'blog_header_button_text' ); 
		$blog_header_button_url 	=  lalita_get_setting( 'blog_header_button_url' ); 
		if ( $blog_header_image != '' ) { ?>
		<div class="page-header-image grid-parent page-header-blog" style="background-image: url('<?php echo esc_url($blog_header_image); ?>') !important;">
        	<div class="page-header-noiseoverlay"></div>
        	<div class="page-header-blog-inner">
                <div class="page-header-blog-content-h grid-container">
                    <div class="page-header-blog-content">
                    <?php if ( $blog_header_title != '' ) { ?>
                        <div class="page-header-blog-text">
                            <?php if ( $blog_header_title != '' ) { ?>
                            <h2><?php echo wp_kses_post( $blog_header_title ); ?></h2>
                            <div class="clearfix"></div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <div class="page-header-blog-content page-header-blog-content-b">
                	<?php if ( $blog_header_text != '' ) { ?>
                	<div class="page-header-blog-text">
						<?php if ( $blog_header_title != '' ) { ?>
                        <p><?php echo wp_kses_post( $blog_header_text ); ?></p>
                        <div class="clearfix"></div>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <div class="page-header-blog-button">
                        <?php if ( $blog_header_button_text != '' ) { ?>
                        <a class="read-more button" href="<?php echo esc_url( $blog_header_button_url ); ?>"><?php echo esc_html( $blog_header_button_text ); ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
		</div>
		<?php
		}
	}
}

// Extra cutomizer functions
if ( ! function_exists( 'mardava_customize_register' ) ) {
	add_action( 'customize_register', 'mardava_customize_register' );
	function mardava_customize_register( $wp_customize ) {
				
		// Add Mardava customizer section
		$wp_customize->add_section(
			'mardava_layout_effects',
			array(
				'title' => __( 'Mardava Effects', 'mardava' ),
				'priority' => 24,
			)
		);
		
		// Header borders
		$wp_customize->add_setting(
			'mardava_settings[header_border]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'mardava_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'mardava_settings[header_border]',
			array(
				'type' => 'select',
				'label' => __( 'Header borders', 'mardava' ),
				'choices' => array(
					'enable' => __( 'Enable', 'mardava' ),
					'disable' => __( 'Disable', 'mardava' )
				),
				'section' => 'mardava_layout_effects',
				'settings' => 'mardava_settings[header_border]',
				'priority' => 12
			)
		);
		
		// Sidebar border
		$wp_customize->add_setting(
			'mardava_settings[sidebar_border]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'mardava_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'mardava_settings[sidebar_border]',
			array(
				'type' => 'select',
				'label' => __( 'Sidebar border', 'mardava' ),
				'choices' => array(
					'enable' => __( 'Enable', 'mardava' ),
					'disable' => __( 'Disable', 'mardava' )
				),
				'settings' => 'mardava_settings[sidebar_border]',
				'section' => 'mardava_layout_effects',
				'priority' => 14
			)
		);
		
		// Blog image border
		$wp_customize->add_setting(
			'mardava_settings[blog_img]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'mardava_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'mardava_settings[blog_img]',
			array(
				'type' => 'select',
				'label' => __( 'Blog image border', 'mardava' ),
				'choices' => array(
					'enable' => __( 'Enable', 'mardava' ),
					'disable' => __( 'Disable', 'mardava' )
				),
				'settings' => 'mardava_settings[blog_img]',
				'section' => 'mardava_layout_effects',
				'priority' => 16
			)
		);
		
		// Search widget style
		$wp_customize->add_setting(
			'mardava_settings[search_widget]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'mardava_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'mardava_settings[search_widget]',
			array(
				'type' => 'select',
				'label' => __( 'Search widget style', 'mardava' ),
				'choices' => array(
					'enable' => __( 'Enable', 'mardava' ),
					'disable' => __( 'Disable', 'mardava' )
				),
				'settings' => 'mardava_settings[search_widget]',
				'section' => 'mardava_layout_effects',
				'priority' => 18
			)
		);
				
		// Text logo hover effect
		$wp_customize->add_setting(
			'mardava_settings[logo_effect]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'mardava_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'mardava_settings[logo_effect]',
			array(
				'type' => 'select',
				'label' => __( 'Text logo hover effect', 'mardava' ),
				'choices' => array(
					'enable' => __( 'Enable', 'mardava' ),
					'disable' => __( 'Disable', 'mardava' )
				),
				'settings' => 'mardava_settings[logo_effect]',
				'section' => 'mardava_layout_effects',
				'priority' => 20
			)
		);
		
		// Mardava effect colors
		$wp_customize->add_setting(
			'mardava_settings[mardava_color_1]', array(
				'default' => '#000000',
				'type' => 'option',
				'sanitize_callback' => 'mardava_sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'mardava_settings[mardava_color_1]',
				array(
					'label' => __( 'Effect color', 'mardava' ),
					'section' => 'mardava_layout_effects',
					'settings' => 'mardava_settings[mardava_color_1]',
					'priority' => 45
				)
			)
		);
	}
}

//Sanitize choices.
if ( ! function_exists( 'mardava_sanitize_choices' ) ) {
	function mardava_sanitize_choices( $input, $setting ) {
		// Ensure input is a slug
		$input = sanitize_key( $input );

		// Get list of choices from the control
		// associated with the setting
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it;
		// otherwise, return the default
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
}

// Sanitize colors. Allow blank value.
if ( ! function_exists( 'mardava_sanitize_hex_color' ) ) {
	function mardava_sanitize_hex_color( $color ) {
	    if ( '' === $color ) {
	        return '';
		}

	    // 3 or 6 hex digits, or the empty string.
	    if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
	        return $color;
		}

	    return '';
	}
}

// Mardava effects colors css
if ( ! function_exists( 'mardava_effect_colors_css' ) ) {
	function mardava_effect_colors_css() {
		// Get Customizer settings
		$mardava_settings = get_option( 'mardava_settings' );
		
		$mardava_color_1  	 = '#000000';
		if ( isset( $mardava_settings['mardava_color_1'] ) ) {
			$mardava_color_1 = $mardava_settings['mardava_color_1'];
		}
		
		$lalita_settings = wp_parse_args(
			get_option( 'lalita_settings', array() ),
			lalita_get_color_defaults()
		);
		
		$mardava_extracolors = '.mardava-header-border .top-bar, .mardava-header-border .site-header {border-color: ' . esc_attr( $mardava_color_1 ) . ';}.mardava-header-border .lalita-socials-list {border-color: ' . esc_attr( $mardava_color_1 ) . ';}.mardava-sidebar-border #right-sidebar, .mardava-sidebar-border #left-sidebar {border-color: ' . esc_attr( $mardava_color_1 ) . '}.mardava-sidebar-border #footer-widgets, .mardava-blog-img.blog .post-image img {border-color: ' . esc_attr( $mardava_color_1 ) . '}';
		
		return $mardava_extracolors;
	}
}

// The dynamic styles of the parent theme added inline to the parent stylesheet.
// For the customizer functions it is better to enqueue after the child theme stylesheet.
if ( ! function_exists( 'mardava_remove_parent_dynamic_css' ) ) {
	add_action( 'init', 'mardava_remove_parent_dynamic_css' );
	function mardava_remove_parent_dynamic_css() {
		remove_action( 'wp_enqueue_scripts', 'lalita_enqueue_dynamic_css', 50 );
	}
}

// Enqueue this CSS after the child stylesheet, not after the parent stylesheet.
if ( ! function_exists( 'mardava_enqueue_parent_dynamic_css' ) ) {
	add_action( 'wp_enqueue_scripts', 'mardava_enqueue_parent_dynamic_css', 50 );
	function mardava_enqueue_parent_dynamic_css() {
		$css = lalita_base_css() . lalita_font_css() . lalita_advanced_css() . lalita_spacing_css() . lalita_no_cache_dynamic_css() .mardava_effect_colors_css();

		// escaped secure before in parent theme
		wp_add_inline_style( 'lalita-child', $css );
	}
}

//Adds custom classes to the array of body classes.
if ( ! function_exists( 'mardava_body_classes' ) ) {
	add_filter( 'body_class', 'mardava_body_classes' );
	function mardava_body_classes( $classes ) {
		// Get Customizer settings
		$mardava_settings = get_option( 'mardava_settings' );
		
		$search_widget  	= 'enable';
		$blog_img   		= 'enable';
		$header_border 		= 'enable';
		$sidebar_border		= 'enable';
		$logo_effect		= 'enable';
		
		if ( isset( $mardava_settings['search_widget'] ) ) {
			$search_widget = $mardava_settings['search_widget'];
		}
		
		if ( isset( $mardava_settings['blog_img'] ) ) {
			$blog_img = $mardava_settings['blog_img'];
		}
		
		if ( isset( $mardava_settings['header_border'] ) ) {
			$header_border = $mardava_settings['header_border'];
		}
		
		if ( isset( $mardava_settings['sidebar_border'] ) ) {
			$sidebar_border = $mardava_settings['sidebar_border'];
		}
		
		if ( isset( $mardava_settings['logo_effect'] ) ) {
			$logo_effect = $mardava_settings['logo_effect'];
		}
		
		// Search widget style
		if ( $search_widget != 'disable' ) {
			$classes[] = 'mardava-search-widget';
		}
		
		// Blog image border
		if ( $blog_img != 'disable' ) {
			$classes[] = 'mardava-blog-img';
		}
		
		// Header border
		if ( $header_border != 'disable' ) {
			$classes[] = 'mardava-header-border';
		}
		
		// Sidebar border
		if ( $sidebar_border != 'disable' ) {
			$classes[] = 'mardava-sidebar-border';
		}
		
		// Logo effect
		if ( $logo_effect != 'disable' ) {
			$classes[] = 'mardava-logo-effect';
		}
		
		return $classes;
	}
}
