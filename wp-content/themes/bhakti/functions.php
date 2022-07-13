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
	return 'https://wpkoi.com/bhakti-wpkoi-wordpress-theme/';
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
if ( ! function_exists( 'bhakti_customize_register' ) ) {
	add_action( 'customize_register', 'bhakti_customize_register' );
	function bhakti_customize_register( $wp_customize ) {
				
		// Add Bhakti customizer section
		$wp_customize->add_section(
			'bhakti_layout_effects',
			array(
				'title' => __( 'Bhakti Effects', 'bhakti' ),
				'priority' => 24,
			)
		);
		
		// Logo negativ margin
		$wp_customize->add_setting(
			'bhakti_settings[logo_marg]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'bhakti_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'bhakti_settings[logo_marg]',
			array(
				'type' => 'select',
				'label' => __( 'Logo negativ margin', 'bhakti' ),
				'choices' => array(
					'enable' => __( 'Enable', 'bhakti' ),
					'disable' => __( 'Disable', 'bhakti' )
				),
				'settings' => 'bhakti_settings[logo_marg]',
				'section' => 'bhakti_layout_effects',
				'priority' => 10
			)
		);
		
		// Top bar socials
		$wp_customize->add_setting(
			'bhakti_settings[topbar_socials]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'bhakti_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'bhakti_settings[topbar_socials]',
			array(
				'type' => 'select',
				'label' => __( 'Top bar socials', 'bhakti' ),
				'choices' => array(
					'enable' => __( 'Enable', 'bhakti' ),
					'disable' => __( 'Disable', 'bhakti' )
				),
				'settings' => 'bhakti_settings[topbar_socials]',
				'section' => 'bhakti_layout_effects',
				'priority' => 20
			)
		);
		
		// Unique scrollbar
		$wp_customize->add_setting(
			'bhakti_settings[unique_scrollbar]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'bhakti_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'bhakti_settings[unique_scrollbar]',
			array(
				'type' => 'select',
				'label' => __( 'Unique scrollbar', 'bhakti' ),
				'choices' => array(
					'enable' => __( 'Enable', 'bhakti' ),
					'disable' => __( 'Disable', 'bhakti' )
				),
				'settings' => 'bhakti_settings[unique_scrollbar]',
				'section' => 'bhakti_layout_effects',
				'priority' => 30
			)
		);
		
		// Blog image border
		$wp_customize->add_setting(
			'bhakti_settings[blog_img]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'bhakti_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'bhakti_settings[blog_img]',
			array(
				'type' => 'select',
				'label' => __( 'Blog image border', 'bhakti' ),
				'choices' => array(
					'enable' => __( 'Enable', 'bhakti' ),
					'disable' => __( 'Disable', 'bhakti' )
				),
				'settings' => 'bhakti_settings[blog_img]',
				'section' => 'bhakti_layout_effects',
				'priority' => 40
			)
		);
		
		// Bhakti effect colors
		$wp_customize->add_setting(
			'bhakti_settings[bhakti_color_1]', array(
				'default' => '#000000',
				'type' => 'option',
				'sanitize_callback' => 'bhakti_sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'bhakti_settings[bhakti_color_1]',
				array(
					'label' => __( 'Effect color', 'bhakti' ),
					'section' => 'bhakti_layout_effects',
					'settings' => 'bhakti_settings[bhakti_color_1]',
					'priority' => 45
				)
			)
		);
		
		$wp_customize->add_setting(
			'bhakti_settings[bhakti_color_2]', array(
				'default' => '#ffffff',
				'type' => 'option',
				'sanitize_callback' => 'bhakti_sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'bhakti_settings[bhakti_color_2]',
				array(
					'label' => __( 'Effect color 2', 'bhakti' ),
					'section' => 'bhakti_layout_effects',
					'settings' => 'bhakti_settings[bhakti_color_2]',
					'priority' => 46
				)
			)
		);
		
		$wp_customize->add_setting(
			'bhakti_settings[bhakti_color_3]', array(
				'default' => '#FEE300',
				'type' => 'option',
				'sanitize_callback' => 'bhakti_sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'bhakti_settings[bhakti_color_3]',
				array(
					'label' => __( 'Effect color 3', 'bhakti' ),
					'section' => 'bhakti_layout_effects',
					'settings' => 'bhakti_settings[bhakti_color_3]',
					'priority' => 47
				)
			)
		);
	}
}

//Sanitize choices.
if ( ! function_exists( 'bhakti_sanitize_choices' ) ) {
	function bhakti_sanitize_choices( $input, $setting ) {
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
if ( ! function_exists( 'bhakti_sanitize_hex_color' ) ) {
	function bhakti_sanitize_hex_color( $color ) {
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

// Bhakti effects colors css
if ( ! function_exists( 'bhakti_effect_colors_css' ) ) {
	function bhakti_effect_colors_css() {
		// Get Customizer settings
		$bhakti_settings = get_option( 'bhakti_settings' );
		
		$bhakti_color_1  	 = '#000000';
		$bhakti_color_2  	 = '#ffffff';
		$bhakti_color_3  	 = '#FEE300';
		if ( isset( $bhakti_settings['bhakti_color_1'] ) ) {
			$bhakti_color_1 = $bhakti_settings['bhakti_color_1'];
		}
		if ( isset( $bhakti_settings['bhakti_color_2'] ) ) {
			$bhakti_color_2 = $bhakti_settings['bhakti_color_2'];
		}
		if ( isset( $bhakti_settings['bhakti_color_3'] ) ) {
			$bhakti_color_3 = $bhakti_settings['bhakti_color_3'];
		}
		
		$lalita_settings = wp_parse_args(
			get_option( 'lalita_settings', array() ),
			lalita_get_color_defaults()
		);
		
		$bhakti_extracolors = '.bhakti-unique-scrollbar::-webkit-scrollbar-track {background: ' . esc_attr( $bhakti_color_1 ) . ';}.bhakti-unique-scrollbar::-webkit-scrollbar-thumb {background: ' . esc_attr( $bhakti_color_2 ) . ';border-color: ' . esc_attr( $bhakti_color_1 ) . ';}.bhakti-unique-scrollbar::-webkit-scrollbar-thumb:hover {background: ' . esc_attr( $bhakti_color_3 ) . ';}.bhakti-blog-img.blog .post-image img {border-color: ' . esc_attr( $bhakti_color_1 ) . ';}.bhakti-topbar-socials .inside-top-bar .lalita-socials-list li {background-color: ' . esc_attr( $bhakti_color_2 ) . ';border-color: ' . esc_attr( $bhakti_color_2 ) . '} .bhakti-topbar-socials .inside-top-bar .lalita-socials-list li a {color: ' . esc_attr( $bhakti_color_1 ) . '}.bhakti-topbar-socials .inside-top-bar .lalita-socials-list li:hover {background-color: ' . esc_attr( $bhakti_color_1 ) . ';} .bhakti-topbar-socials .inside-top-bar .lalita-socials-list li:hover a {color: ' . esc_attr( $bhakti_color_2 ) . '}';
		
		return $bhakti_extracolors;
	}
}

// The dynamic styles of the parent theme added inline to the parent stylesheet.
// For the customizer functions it is better to enqueue after the child theme stylesheet.
if ( ! function_exists( 'bhakti_remove_parent_dynamic_css' ) ) {
	add_action( 'init', 'bhakti_remove_parent_dynamic_css' );
	function bhakti_remove_parent_dynamic_css() {
		remove_action( 'wp_enqueue_scripts', 'lalita_enqueue_dynamic_css', 50 );
	}
}

// Enqueue this CSS after the child stylesheet, not after the parent stylesheet.
if ( ! function_exists( 'bhakti_enqueue_parent_dynamic_css' ) ) {
	add_action( 'wp_enqueue_scripts', 'bhakti_enqueue_parent_dynamic_css', 50 );
	function bhakti_enqueue_parent_dynamic_css() {
		$css = lalita_base_css() . lalita_font_css() . lalita_advanced_css() . lalita_spacing_css() . lalita_no_cache_dynamic_css() .bhakti_effect_colors_css();

		// escaped secure before in parent theme
		wp_add_inline_style( 'lalita-child', $css );
	}
}

//Adds custom classes to the array of body classes.
if ( ! function_exists( 'bhakti_body_classes' ) ) {
	add_filter( 'body_class', 'bhakti_body_classes' );
	function bhakti_body_classes( $classes ) {
		// Get Customizer settings
		$bhakti_settings = get_option( 'bhakti_settings' );
		
		$logo_marg 	  = 'enable';
		$blog_img  	  = 'enable';
		$topbar_socials  = 'enable';
		$unique_scrollbar     = 'enable';
		
		if ( isset( $bhakti_settings['logo_marg'] ) ) {
			$logo_marg = $bhakti_settings['logo_marg'];
		}
		
		if ( isset( $bhakti_settings['blog_img'] ) ) {
			$blog_img = $bhakti_settings['blog_img'];
		}
		
		if ( isset( $bhakti_settings['topbar_socials'] ) ) {
			$topbar_socials = $bhakti_settings['topbar_socials'];
		}
		
		if ( isset( $bhakti_settings['unique_scrollbar'] ) ) {
			$unique_scrollbar = $bhakti_settings['unique_scrollbar'];
		}
		
		// Logo negativ margin
		if ( $logo_marg != 'disable' ) {
			$classes[] = 'bhakti-logo-marg';
		}
		
		// Blog image border
		if ( $blog_img != 'disable' ) {
			$classes[] = 'bhakti-blog-img';
		}
		
		// Top bar socials
		if ( $topbar_socials != 'disable' ) {
			$classes[] = 'bhakti-topbar-socials';
		}
		
		// Unique scrollbar
		if ( $unique_scrollbar != 'disable' ) {
			$classes[] = 'bhakti-unique-scrollbar';
		}
		
		return $classes;
	}
}

