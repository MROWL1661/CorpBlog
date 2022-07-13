<?php
add_action( 'customize_register', 'pages_customizer', 20 );
function pages_customizer( $wp_customize ) {
$wp_customize->remove_control( 'blogdescription' );
$wp_customize->remove_control( 'header_textcolor' );
$wp_customize->remove_control( 'display_header_text' );
$wp_customize->add_section(
'pages_options',
array(
'title' => __( 'Layout & Display', 'pages' ),
'priority' => 20
)
);
$wp_customize->add_setting(
'pages_layout_width',
array(
'default' => '960px',
'sanitize_callback' => 'sanitize_text_field',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'layout_width',
array(
'label' => esc_html__( 'Layout Width', 'pages' ),
'description' => esc_html__( 'Enter any width by % or px (for example, 100% for full width).', 'pages' ),
'section' => 'pages_options',
'settings' => 'pages_layout_width'
)
)
);
$wp_customize->add_setting(
'pages_grid_columns',
array(
'default' => '1',
'sanitize_callback' => 'absint',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'grid_columns',
array(
'label' => esc_html__( 'Blog Grid Count', 'pages' ),
'section' => 'pages_options',
'settings' => 'pages_grid_columns',
'type' => 'number'
)
)
);
$wp_customize->add_setting(
'pages_grid_width',
array(
'default' => '300px',
'sanitize_callback' => 'sanitize_text_field',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'grid_width',
array(
'label' => esc_html__( 'Blog Grid Width', 'pages' ),
'description' => esc_html__( 'Enter any width by px only.', 'pages' ),
'section' => 'pages_options',
'settings' => 'pages_grid_width'
)
)
);
$wp_customize->add_setting(
'pages_grid_gap',
array(
'default' => '5%',
'sanitize_callback' => 'sanitize_text_field',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'grid_gap',
array(
'label' => esc_html__( 'Blog Grid Gap', 'pages' ),
'description' => esc_html__( 'Enter any width by % or px.', 'pages' ),
'section' => 'pages_options',
'settings' => 'pages_grid_gap'
)
)
);
$wp_customize->add_setting(
'pages_dark_mode',
array(
'default' => '',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'dark_mode',
array(
'label' => esc_html__( 'Dark Mode', 'pages' ),
'description' => esc_html__( 'By default, Dark Mode is supported for users who set their systems to that preference. However, if you would like to force Dark Mode for all users, you can use this option.', 'pages' ),
'section' => 'pages_options',
'settings' => 'pages_dark_mode',
'type' => 'checkbox'
)
)
);
$wp_customize->add_setting(
'pages_no_dark_mode',
array(
'default' => '',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'no_dark_mode',
array(
'label' => esc_html__( 'No Dark Mode', 'pages' ),
'description' => esc_html__( 'Overrides the above option as well as the theme\'s default styles to completely disable Dark Mode (useful for when you\'d like to enforce the default light theme or a custom theme for all users).', 'pages' ),
'section' => 'pages_options',
'settings' => 'pages_no_dark_mode',
'type' => 'checkbox'
)
)
);
$wp_customize->add_setting(
'pages_sticky_header',
array(
'default' => '',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'sticky_header',
array(
'label' => esc_html__( 'Sticky Header', 'pages' ),
'section' => 'pages_options',
'settings' => 'pages_sticky_header',
'type' => 'checkbox'
)
)
);
$wp_customize->add_setting(
'pages_center_logo',
array(
'default' => '',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'center_logo',
array(
'label' => esc_html__( 'Center Logo', 'pages' ),
'section' => 'pages_options',
'settings' => 'pages_center_logo',
'type' => 'checkbox'
)
)
);
$wp_customize->add_setting(
'pages_left_logo',
array(
'default' => '',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'left_logo',
array(
'label' => esc_html__( 'Left Logo', 'pages' ),
'section' => 'pages_options',
'settings' => 'pages_left_logo',
'type' => 'checkbox'
)
)
);
$wp_customize->add_setting(
'pages_hide_header',
array(
'default' => '',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'hide_header',
array(
'label' => esc_html__( 'Hide Header', 'pages' ),
'section' => 'pages_options',
'settings' => 'pages_hide_header',
'type' => 'checkbox'
)
)
);
$wp_customize->add_setting(
'pages_hide_branding',
array(
'default' => '',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'hide_branding',
array(
'label' => esc_html__( 'Hide Logo/Site Title', 'pages' ),
'section' => 'pages_options',
'settings' => 'pages_hide_branding',
'type' => 'checkbox'
)
)
);
$wp_customize->add_setting(
'pages_hide_menu',
array(
'default' => '',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'hide_menu',
array(
'label' => esc_html__( 'Hide Menu', 'pages' ),
'section' => 'pages_options',
'settings' => 'pages_hide_menu',
'type' => 'checkbox'
)
)
);
$wp_customize->add_setting(
'pages_hide_search',
array(
'default' => '',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'hide_search',
array(
'label' => esc_html__( 'Hide Search Form', 'pages' ),
'section' => 'pages_options',
'settings' => 'pages_hide_search',
'type' => 'checkbox'
)
)
);
$wp_customize->add_setting(
'pages_hide_breadcrumbs',
array(
'default' => '',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'hide_breadcrumbs',
array(
'label' => esc_html__( 'Hide Breadcrumbs', 'pages' ),
'section' => 'pages_options',
'settings' => 'pages_hide_breadcrumbs',
'type' => 'checkbox'
)
)
);
$wp_customize->add_setting(
'pages_hide_footer',
array(
'default' => '',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'hide_footer',
array(
'label' => esc_html__( 'Hide Footer', 'pages' ),
'section' => 'pages_options',
'settings' => 'pages_hide_footer',
'type' => 'checkbox'
)
)
);
$wp_customize->add_section(
'pages_hero',
array(
'title' => __( 'Homepage Hero', 'pages' ),
'priority' => 22
)
);
$wp_customize->add_setting(
'pages_display_hero',
array(
'default' => '',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'display_hero',
array(
'label' => esc_html__( 'Display Hero', 'pages' ),
'section' => 'pages_hero',
'settings' => 'pages_display_hero',
'type' => 'checkbox'
)
)
);
$wp_customize->add_setting(
'pages_hero_h1',
array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'hero_h1',
array(
'label' => esc_html__( 'Header', 'pages' ),
'section' => 'pages_hero',
'settings' => 'pages_hero_h1'
)
)
);
$wp_customize->add_setting(
'pages_hero_h2',
array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'hero_h2',
array(
'label' => esc_html__( 'Sub Header', 'pages' ),
'section' => 'pages_hero',
'settings' => 'pages_hero_h2'
)
)
);
$wp_customize->add_setting(
'pages_hero_p',
array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'hero_p',
array(
'label' => esc_html__( 'Paragraph', 'pages' ),
'section' => 'pages_hero',
'settings' => 'pages_hero_p'
)
)
);
$wp_customize->add_setting(
'pages_hero_cta',
array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'hero_cta',
array(
'label' => esc_html__( 'Button #1 Text', 'pages' ),
'section' => 'pages_hero',
'settings' => 'pages_hero_cta'
)
)
);
$wp_customize->add_setting(
'pages_hero_cta_2',
array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'hero_cta_2',
array(
'label' => esc_html__( 'Button #2 Text', 'pages' ),
'section' => 'pages_hero',
'settings' => 'pages_hero_cta_2'
)
)
);
$wp_customize->add_setting(
'pages_hero_cta_link',
array(
'default' => '',
'sanitize_callback' => 'sanitize_url',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'hero_cta_link',
array(
'label' => esc_html__( 'Button #1 Link', 'pages' ),
'section' => 'pages_hero',
'settings' => 'pages_hero_cta_link'
)
)
);
$wp_customize->add_setting(
'pages_hero_cta_link_2',
array(
'default' => '',
'sanitize_callback' => 'sanitize_url',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'hero_cta_link_2',
array(
'label' => esc_html__( 'Button #2 Link', 'pages' ),
'section' => 'pages_hero',
'settings' => 'pages_hero_cta_link_2'
)
)
);
$wp_customize->add_setting(
'pages_hero_cta_round',
array(
'default' => '',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'hero_cta_round',
array(
'label' => esc_html__( 'Round Buttons', 'pages' ),
'section' => 'pages_hero',
'settings' => 'pages_hero_cta_round',
'type' => 'checkbox'
)
)
);
$wp_customize->add_setting(
'pages_hero_cta_color',
array(
'default' => '',
'sanitize_callback' => 'sanitize_hex_color',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hero_cta_color',
array(
'label' => esc_html__( 'Button #1 Color', 'pages' ),
'section' => 'pages_hero',
'settings' => 'pages_hero_cta_color'
)
)
);
$wp_customize->add_setting(
'pages_hero_cta_color_2',
array(
'default' => '',
'sanitize_callback' => 'sanitize_hex_color',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hero_cta_color_2',
array(
'label' => esc_html__( 'Button #2 Color', 'pages' ),
'section' => 'pages_hero',
'settings' => 'pages_hero_cta_color_2'
)
)
);
$wp_customize->add_setting(
'pages_hero_bg_color',
array(
'default' => '',
'sanitize_callback' => 'sanitize_hex_color',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hero_bg_color',
array(
'label' => esc_html__( 'Background Color', 'pages' ),
'section' => 'pages_hero',
'settings' => 'pages_hero_bg_color'
)
)
);
$wp_customize->add_setting(
'pages_hero_bg_image',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Image_Control(
$wp_customize,
'hero_bg_image',
array(
'label' => esc_html__( 'Background Image', 'pages' ),
'section' => 'pages_hero',
'settings' => 'pages_hero_bg_image'
)
)
);
$wp_customize->add_setting(
'pages_hero_overlay',
array(
'default' => '',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'hero_overlay',
array(
'label' => esc_html__( 'Background Overlay', 'pages' ),
'section' => 'pages_hero',
'settings' => 'pages_hero_overlay',
'type' => 'checkbox'
)
)
);
$wp_customize->add_section(
'pages_slider',
array(
'title' => __( 'Homepage Slider', 'pages' ),
'priority' => 23
)
);
$wp_customize->add_setting(
'pages_display_slider',
array(
'default' => '',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'display_slider',
array(
'label' => esc_html__( 'Display Slider', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_display_slider',
'type' => 'checkbox'
)
)
);
$wp_customize->add_setting(
'pages_slider_nav',
array(
'default' => '1',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_nav',
array(
'label' => esc_html__( 'Navigation', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_nav',
'type' => 'checkbox'
)
)
);
$wp_customize->add_setting(
'pages_slider_autoplay',
array(
'default' => '1',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_autoplay',
array(
'label' => esc_html__( 'Autoplay', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_autoplay',
'type' => 'checkbox'
)
)
);
$wp_customize->add_setting(
'pages_slider_loop',
array(
'default' => '1',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_loop',
array(
'label' => esc_html__( 'Loop', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_loop',
'type' => 'checkbox'
)
)
);
$wp_customize->add_setting(
'pages_slider_delay',
array(
'default' => '3000',
'sanitize_callback' => 'absint',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_delay',
array(
'label' => esc_html__( 'Delay', 'pages' ),
'section' => 'pages_slider',
'type' => 'number',
'settings' => 'pages_slider_delay'
)
)
);
$wp_customize->add_setting(
'pages_slider_speed',
array(
'default' => '1000',
'sanitize_callback' => 'absint',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_speed',
array(
'label' => esc_html__( 'Speed', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_speed',
'type' => 'number'
)
)
);
$wp_customize->add_setting(
'pages_slider_width',
array(
'default' => '100',
'sanitize_callback' => 'absint',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_width',
array(
'label' => esc_html__( 'Width', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_width',
'type' => 'number'
)
)
);
$wp_customize->add_setting(
'pages_slider_height',
array(
'default' => '5',
'sanitize_callback' => 'absint',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_height',
array(
'label' => esc_html__( 'Height', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_height',
'type' => 'number'
)
)
);
$wp_customize->add_setting(
'pages_slider_effect',
array(
'default' => 'slide',
'sanitize_callback' => 'pages_sanitize_effect_select'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_effect',
array(
'label' => esc_html__( 'Effect', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_effect',
'type' => 'select',
'choices' => array(
'slide' => esc_html__( 'Slide', 'pages' ),
'fade' => esc_html__( 'Fade', 'pages' ),
'flip' => esc_html__( 'Flip', 'pages' ),
'cube' => esc_html__( 'Cube', 'pages' ),
'cards' => esc_html__( 'Cards', 'pages' ),
'coverflow' => esc_html__( 'Coverflow', 'pages' )
)
)
)
);
$wp_customize->add_setting(
'pages_separator_1',
array(
'sanitize_callback' => 'wp_kses_post'
)
);
$wp_customize->add_control(
new Pages_Separator_Control(
$wp_customize,
'pages_separator_1',
array(
'section' => 'pages_slider'
)
)
);
$wp_customize->add_setting(
'pages_slider_content_1',
array(
'default' => '',
'sanitize_callback' => 'wp_kses_post',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_content_1',
array(
'label' => esc_html__( 'Slide #1 Content (HTML allowed)', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_content_1'
)
)
);
$wp_customize->add_setting(
'pages_slider_link_1',
array(
'default' => '',
'sanitize_callback' => 'sanitize_url',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_link_1',
array(
'label' => esc_html__( 'Slide #1 Link', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_link_1'
)
)
);
$wp_customize->add_setting(
'pages_slider_bg_color_1',
array(
'default' => '',
'sanitize_callback' => 'sanitize_hex_color',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'slider_bg_color_1',
array(
'label' => esc_html__( 'Slide #1 Background Color', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_bg_color_1'
)
)
);
$wp_customize->add_setting(
'pages_slider_bg_image_1',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Image_Control(
$wp_customize,
'slider_bg_image_1',
array(
'label' => esc_html__( 'Slide #1 Background Image', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_bg_image_1'
)
)
);
$wp_customize->add_setting(
'pages_slider_overlay_1',
array(
'default' => '',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_overlay_1',
array(
'label' => esc_html__( 'Slide #1 Background Overlay', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_overlay_1',
'type' => 'checkbox'
)
)
);
$wp_customize->add_setting(
'pages_separator_2',
array(
'sanitize_callback' => 'wp_kses_post'
)
);
$wp_customize->add_control(
new Pages_Separator_Control(
$wp_customize,
'pages_separator_2',
array(
'section' => 'pages_slider'
)
)
);
$wp_customize->add_setting(
'pages_slider_content_2',
array(
'default' => '',
'sanitize_callback' => 'wp_kses_post',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_content_2',
array(
'label' => esc_html__( 'Slide #2 Content (HTML allowed)', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_content_2'
)
)
);
$wp_customize->add_setting(
'pages_slider_link_2',
array(
'default' => '',
'sanitize_callback' => 'sanitize_url',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_link_2',
array(
'label' => esc_html__( 'Slide #2 Link', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_link_2'
)
)
);
$wp_customize->add_setting(
'pages_slider_bg_color_2',
array(
'default' => '',
'sanitize_callback' => 'sanitize_hex_color',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'slider_bg_color_2',
array(
'label' => esc_html__( 'Slide #2 Background Color', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_bg_color_2'
)
)
);
$wp_customize->add_setting(
'pages_slider_bg_image_2',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Image_Control(
$wp_customize,
'slider_bg_image_2',
array(
'label' => esc_html__( 'Slide #2 Background Image', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_bg_image_2'
)
)
);
$wp_customize->add_setting(
'pages_slider_overlay_2',
array(
'default' => '',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_overlay_2',
array(
'label' => esc_html__( 'Slide #2 Background Overlay', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_overlay_2',
'type' => 'checkbox'
)
)
);
$wp_customize->add_setting(
'pages_separator_3',
array(
'sanitize_callback' => 'wp_kses_post'
)
);
$wp_customize->add_control(
new Pages_Separator_Control(
$wp_customize,
'pages_separator_3',
array(
'section' => 'pages_slider'
)
)
);
$wp_customize->add_setting(
'pages_slider_content_3',
array(
'default' => '',
'sanitize_callback' => 'wp_kses_post',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_content_3',
array(
'label' => esc_html__( 'Slide #3 Content (HTML allowed)', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_content_3'
)
)
);
$wp_customize->add_setting(
'pages_slider_link_3',
array(
'default' => '',
'sanitize_callback' => 'sanitize_url',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_link_3',
array(
'label' => esc_html__( 'Slide #3 Link', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_link_3'
)
)
);
$wp_customize->add_setting(
'pages_slider_bg_color_3',
array(
'default' => '',
'sanitize_callback' => 'sanitize_hex_color',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'slider_bg_color_3',
array(
'label' => esc_html__( 'Slide #3 Background Color', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_bg_color_3'
)
)
);
$wp_customize->add_setting(
'pages_slider_bg_image_3',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Image_Control(
$wp_customize,
'slider_bg_image_3',
array(
'label' => esc_html__( 'Slide #3 Background Image', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_bg_image_3'
)
)
);
$wp_customize->add_setting(
'pages_slider_overlay_3',
array(
'default' => '',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_overlay_3',
array(
'label' => esc_html__( 'Slide #3 Background Overlay', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_overlay_3',
'type' => 'checkbox'
)
)
);
$wp_customize->add_setting(
'pages_separator_4',
array(
'sanitize_callback' => 'wp_kses_post'
)
);
$wp_customize->add_control(
new Pages_Separator_Control(
$wp_customize,
'pages_separator_4',
array(
'section' => 'pages_slider'
)
)
);
$wp_customize->add_setting(
'pages_slider_content_4',
array(
'default' => '',
'sanitize_callback' => 'wp_kses_post',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_content_4',
array(
'label' => esc_html__( 'Slide #4 Content (HTML allowed)', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_content_4'
)
)
);
$wp_customize->add_setting(
'pages_slider_link_4',
array(
'default' => '',
'sanitize_callback' => 'sanitize_url',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_link_4',
array(
'label' => esc_html__( 'Slide #4 Link', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_link_4'
)
)
);
$wp_customize->add_setting(
'pages_slider_bg_color_4',
array(
'default' => '',
'sanitize_callback' => 'sanitize_hex_color',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'slider_bg_color_4',
array(
'label' => esc_html__( 'Slide #4 Background Color', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_bg_color_4'
)
)
);
$wp_customize->add_setting(
'pages_slider_bg_image_4',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Image_Control(
$wp_customize,
'slider_bg_image_4',
array(
'label' => esc_html__( 'Slide #4 Background Image', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_bg_image_4'
)
)
);
$wp_customize->add_setting(
'pages_slider_overlay_4',
array(
'default' => '',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_overlay_4',
array(
'label' => esc_html__( 'Slide #4 Background Overlay', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_overlay_4',
'type' => 'checkbox'
)
)
);
$wp_customize->add_setting(
'pages_separator_5',
array(
'sanitize_callback' => 'wp_kses_post'
)
);
$wp_customize->add_control(
new Pages_Separator_Control(
$wp_customize,
'pages_separator_5',
array(
'section' => 'pages_slider'
)
)
);
$wp_customize->add_setting(
'pages_slider_content_5',
array(
'default' => '',
'sanitize_callback' => 'wp_kses_post',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_content_5',
array(
'label' => esc_html__( 'Slide #5 Content (HTML allowed)', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_content_5'
)
)
);
$wp_customize->add_setting(
'pages_slider_link_5',
array(
'default' => '',
'sanitize_callback' => 'sanitize_url',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_link_5',
array(
'label' => esc_html__( 'Slide #5 Link', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_link_5'
)
)
);
$wp_customize->add_setting(
'pages_slider_bg_color_5',
array(
'default' => '',
'sanitize_callback' => 'sanitize_hex_color',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'slider_bg_color_5',
array(
'label' => esc_html__( 'Slide #5 Background Color', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_bg_color_5'
)
)
);
$wp_customize->add_setting(
'pages_slider_bg_image_5',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Image_Control(
$wp_customize,
'slider_bg_image_5',
array(
'label' => esc_html__( 'Slide #5 Background Image', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_bg_image_5'
)
)
);
$wp_customize->add_setting(
'pages_slider_overlay_5',
array(
'default' => '',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_overlay_5',
array(
'label' => esc_html__( 'Slide #5 Background Overlay', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_overlay_5',
'type' => 'checkbox'
)
)
);
$wp_customize->add_setting(
'pages_separator_6',
array(
'sanitize_callback' => 'wp_kses_post'
)
);
$wp_customize->add_control(
new Pages_Separator_Control(
$wp_customize,
'pages_separator_6',
array(
'section' => 'pages_slider'
)
)
);
$wp_customize->add_setting(
'pages_slider_content_6',
array(
'default' => '',
'sanitize_callback' => 'wp_kses_post',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_content_6',
array(
'label' => esc_html__( 'Slide #6 Content (HTML allowed)', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_content_6'
)
)
);
$wp_customize->add_setting(
'pages_slider_link_6',
array(
'default' => '',
'sanitize_callback' => 'sanitize_url',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_link_6',
array(
'label' => esc_html__( 'Slide #6 Link', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_link_6'
)
)
);
$wp_customize->add_setting(
'pages_slider_bg_color_6',
array(
'default' => '',
'sanitize_callback' => 'sanitize_hex_color',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'slider_bg_color_6',
array(
'label' => esc_html__( 'Slide #6 Background Color', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_bg_color_6'
)
)
);
$wp_customize->add_setting(
'pages_slider_bg_image_6',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Image_Control(
$wp_customize,
'slider_bg_image_6',
array(
'label' => esc_html__( 'Slide #6 Background Image', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_bg_image_6'
)
)
);
$wp_customize->add_setting(
'pages_slider_overlay_6',
array(
'default' => '',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_overlay_6',
array(
'label' => esc_html__( 'Slide #6 Background Overlay', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_overlay_6',
'type' => 'checkbox'
)
)
);
$wp_customize->add_setting(
'pages_separator_7',
array(
'sanitize_callback' => 'wp_kses_post'
)
);
$wp_customize->add_control(
new Pages_Separator_Control(
$wp_customize,
'pages_separator_7',
array(
'section' => 'pages_slider'
)
)
);
$wp_customize->add_setting(
'pages_slider_content_7',
array(
'default' => '',
'sanitize_callback' => 'wp_kses_post',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_content_7',
array(
'label' => esc_html__( 'Slide #7 Content (HTML allowed)', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_content_7'
)
)
);
$wp_customize->add_setting(
'pages_slider_link_7',
array(
'default' => '',
'sanitize_callback' => 'sanitize_url',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_link_7',
array(
'label' => esc_html__( 'Slide #7 Link', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_link_7'
)
)
);
$wp_customize->add_setting(
'pages_slider_bg_color_7',
array(
'default' => '',
'sanitize_callback' => 'sanitize_hex_color',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'slider_bg_color_7',
array(
'label' => esc_html__( 'Slide #7 Background Color', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_bg_color_7'
)
)
);
$wp_customize->add_setting(
'pages_slider_bg_image_7',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Image_Control(
$wp_customize,
'slider_bg_image_7',
array(
'label' => esc_html__( 'Slide #7 Background Image', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_bg_image_7'
)
)
);
$wp_customize->add_setting(
'pages_slider_overlay_7',
array(
'default' => '',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_overlay_7',
array(
'label' => esc_html__( 'Slide #7 Background Overlay', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_overlay_7',
'type' => 'checkbox'
)
)
);
$wp_customize->add_setting(
'pages_separator_8',
array(
'sanitize_callback' => 'wp_kses_post'
)
);
$wp_customize->add_control(
new Pages_Separator_Control(
$wp_customize,
'pages_separator_8',
array(
'section' => 'pages_slider'
)
)
);
$wp_customize->add_setting(
'pages_slider_content_8',
array(
'default' => '',
'sanitize_callback' => 'wp_kses_post',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_content_8',
array(
'label' => esc_html__( 'Slide #8 Content (HTML allowed)', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_content_8'
)
)
);
$wp_customize->add_setting(
'pages_slider_link_8',
array(
'default' => '',
'sanitize_callback' => 'sanitize_url',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_link_8',
array(
'label' => esc_html__( 'Slide #8 Link', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_link_8'
)
)
);
$wp_customize->add_setting(
'pages_slider_bg_color_8',
array(
'default' => '',
'sanitize_callback' => 'sanitize_hex_color',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'slider_bg_color_8',
array(
'label' => esc_html__( 'Slide #8 Background Color', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_bg_color_8'
)
)
);
$wp_customize->add_setting(
'pages_slider_bg_image_8',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Image_Control(
$wp_customize,
'slider_bg_image_8',
array(
'label' => esc_html__( 'Slide #8 Background Image', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_bg_image_8'
)
)
);
$wp_customize->add_setting(
'pages_slider_overlay_8',
array(
'default' => '',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_overlay_8',
array(
'label' => esc_html__( 'Slide #8 Background Overlay', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_overlay_8',
'type' => 'checkbox'
)
)
);
$wp_customize->add_setting(
'pages_separator_9',
array(
'sanitize_callback' => 'wp_kses_post'
)
);
$wp_customize->add_control(
new Pages_Separator_Control(
$wp_customize,
'pages_separator_9',
array(
'section' => 'pages_slider'
)
)
);
$wp_customize->add_setting(
'pages_slider_content_9',
array(
'default' => '',
'sanitize_callback' => 'wp_kses_post',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_content_9',
array(
'label' => esc_html__( 'Slide #9 Content (HTML allowed)', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_content_9'
)
)
);
$wp_customize->add_setting(
'pages_slider_link_9',
array(
'default' => '',
'sanitize_callback' => 'sanitize_url',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_link_9',
array(
'label' => esc_html__( 'Slide #9 Link', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_link_9'
)
)
);
$wp_customize->add_setting(
'pages_slider_bg_color_9',
array(
'default' => '',
'sanitize_callback' => 'sanitize_hex_color',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'slider_bg_color_9',
array(
'label' => esc_html__( 'Slide #9 Background Color', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_bg_color_9'
)
)
);
$wp_customize->add_setting(
'pages_slider_bg_image_9',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Image_Control(
$wp_customize,
'slider_bg_image_9',
array(
'label' => esc_html__( 'Slide #9 Background Image', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_bg_image_9'
)
)
);
$wp_customize->add_setting(
'pages_slider_overlay_9',
array(
'default' => '',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_overlay_9',
array(
'label' => esc_html__( 'Slide #9 Background Overlay', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_overlay_9',
'type' => 'checkbox'
)
)
);
$wp_customize->add_setting(
'pages_separator_10',
array(
'sanitize_callback' => 'wp_kses_post'
)
);
$wp_customize->add_control(
new Pages_Separator_Control(
$wp_customize,
'pages_separator_10',
array(
'section' => 'pages_slider'
)
)
);
$wp_customize->add_setting(
'pages_slider_content_10',
array(
'default' => '',
'sanitize_callback' => 'wp_kses_post',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_content_10',
array(
'label' => esc_html__( 'Slide #10 Content (HTML allowed)', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_content_10'
)
)
);
$wp_customize->add_setting(
'pages_slider_link_10',
array(
'default' => '',
'sanitize_callback' => 'sanitize_url',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_link_10',
array(
'label' => esc_html__( 'Slide #10 Link', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_link_10'
)
)
);
$wp_customize->add_setting(
'pages_slider_bg_color_10',
array(
'default' => '',
'sanitize_callback' => 'sanitize_hex_color',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'slider_bg_color_10',
array(
'label' => esc_html__( 'Slide #10 Background Color', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_bg_color_10'
)
)
);
$wp_customize->add_setting(
'pages_slider_bg_image_10',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Image_Control(
$wp_customize,
'slider_bg_image_10',
array(
'label' => esc_html__( 'Slide #10 Background Image', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_bg_image_10'
)
)
);
$wp_customize->add_setting(
'pages_slider_overlay_10',
array(
'default' => '',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'slider_overlay_10',
array(
'label' => esc_html__( 'Slide #10 Background Overlay', 'pages' ),
'section' => 'pages_slider',
'settings' => 'pages_slider_overlay_10',
'type' => 'checkbox'
)
)
);
$wp_customize->add_section(
'pages_fonts',
array(
'title' => esc_html__( 'Fonts & Icons', 'pages' ),
'priority' => 25
)
);
$wp_customize->add_setting(
'pages_header_font',
array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'header_font',
array(
'label' => esc_html__( 'Headers Font', 'pages' ),
'description' => esc_html__( 'Google Fonts allowed here too.', 'pages' ),
'section' => 'pages_fonts',
'settings' => 'pages_header_font'
)
)
);
$wp_customize->add_setting(
'pages_content_font',
array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'content_font',
array(
'label' => esc_html__( 'Content Font', 'pages' ),
'description' => esc_html__( 'Google Fonts allowed here too.', 'pages' ),
'section' => 'pages_fonts',
'settings' => 'pages_content_font'
)
)
);
$wp_customize->add_setting(
'pages_display_icons',
array(
'default' => '',
'sanitize_callback' => 'pages_sanitize_checkbox'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'display_icons',
array(
'label' => esc_html__( 'Enable Icons', 'pages' ),
'description' => esc_html__( 'Load the icons, so you can add social media, video, podcasting, or any other kind of site icons you need. Add icons to: pages, posts, menus, widgets, and more with', 'pages' ) . ' <code>&lt;i class=&quot;icon icon-apple&quot;&gt;&lt;/i&gt;</code>',
'section' => 'pages_fonts',
'settings' => 'pages_display_icons',
'type' => 'checkbox'
)
)
);
$wp_customize->add_setting(
'pages_accent_color',
array(
'default' => '',
'sanitize_callback' => 'sanitize_hex_color',
'transport' => 'postMessage'
)
);
$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'accent_color',
array(
'label' => esc_html__( 'Accent Color', 'pages' ),
'section' => 'colors',
'settings' => 'pages_accent_color',
'priority' => 0
)
)
);
$wp_customize->add_setting(
'pages_header_color',
array(
'default' => '',
'sanitize_callback' => 'sanitize_hex_color',
'transport' => 'postMessage'
)
);
$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'header_color',
array(
'label' => esc_html__( 'Headers Color', 'pages' ),
'section' => 'colors',
'settings' => 'pages_header_color',
'priority' => 1
)
)
);
$wp_customize->add_setting(
'pages_content_color',
array(
'default' => '',
'sanitize_callback' => 'sanitize_hex_color',
'transport' => 'postMessage'
)
);
$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'content_color',
array(
'label' => esc_html__( 'Content Color', 'pages' ),
'section' => 'colors',
'settings' => 'pages_content_color',
'priority' => 2
)
)
);
$wp_customize->add_setting(
'pages_link_color',
array(
'default' => '',
'sanitize_callback' => 'sanitize_hex_color',
'transport' => 'postMessage'
)
);
$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'link_color',
array(
'label' => esc_html__( 'Link Color', 'pages' ),
'section' => 'colors',
'settings' => 'pages_link_color',
'priority' => 3
)
)
);
$wp_customize->add_setting(
'pages_social_color',
array(
'default' => '',
'sanitize_callback' => 'sanitize_hex_color',
'transport' => 'postMessage'
)
);
$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'social_color',
array(
'label' => esc_html__( 'Social Icons Color', 'pages' ),
'section' => 'colors',
'settings' => 'pages_social_color',
'priority' => 4
)
)
);
$wp_customize->add_section(
'pages_footer',
array(
'title' => esc_html__( 'Footer', 'pages' ),
'priority' => 120
)
);
$wp_customize->add_setting(
'pages_copyright',
array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'copyright',
array(
'label' => esc_html__( '© Copyright', 'pages' ),
'section' => 'pages_footer',
'settings' => 'pages_copyright'
)
)
);
if ( current_user_can( 'unfiltered_html' ) ) {
$wp_customize->add_section(
'pages_code',
array(
'title' => esc_html__( 'Additional HTML', 'pages' ),
'priority' => 200
)
);
$wp_customize->add_setting(
'pages_custom_body_code',
array(
'default' => '',
'sanitize_callback' => null,
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Code_Editor_Control(
$wp_customize,
'custom_body_code',
array(
'label' => esc_html__( 'Top of the Page', 'pages' ),
'description' => esc_html__( 'Add code just after &lt;body&gt;', 'pages' ),
'settings' => 'pages_custom_body_code',
'section' => 'pages_code',
'code_type' => 'html'
)
)
);
$wp_customize->add_setting(
'pages_custom_footer_code',
array(
'default' => '',
'sanitize_callback' => null,
'transport' => 'refresh'
)
);
$wp_customize->add_control(
new WP_Customize_Code_Editor_Control(
$wp_customize,
'custom_footer_code',
array(
'label' => esc_html__( 'Bottom of the Page', 'pages' ),
'description' => esc_html__( 'Add code just before &lt;/body&gt;', 'pages' ),
'settings' => 'pages_custom_footer_code',
'section' => 'pages_code',
'code_type' => 'html'
)
)
);
}
}
add_action( 'customize_register', 'pages_separator_register' );
function pages_separator_register( $wp_customize ) {
class Pages_Separator_Control extends WP_Customize_Control {
public function render_content() {
?>
<br />
<hr />
<br />
<?php
}
}
}
function pages_sanitize_checkbox( $input ) {
if ( $input === true || $input === '1' ) {
return '1';
}
return '';
}
function pages_sanitize_effect_select( $input ) {
$valid = array(
'slide' => esc_html__( 'Slide', 'pages' ),
'fade' => esc_html__( 'Fade', 'pages' ),
'flip' => esc_html__( 'Flip', 'pages' ),
'cube' => esc_html__( 'Cube', 'pages' ),
'cards' => esc_html__( 'Cards', 'pages' ),
'coverflow' => esc_html__( 'Coverflow', 'pages' )
);
if ( array_key_exists( $input, $valid ) ) {
return $input;
} else {
return 'slide';
}
}
add_action( 'wp_body_open', 'pages_body_code' );
function pages_body_code() {
$bodycode = get_theme_mod( 'pages_custom_body_code', '' );
if ( '' === $bodycode ) {
return;
}
echo do_shortcode( $bodycode ) . "\n";
}
add_action( 'wp_footer', 'pages_footer_code' );
function pages_footer_code() {
$footercode = get_theme_mod( 'pages_custom_footer_code', '' );
if ( '' === $footercode ) {
return;
}
echo do_shortcode( $footercode ) . "\n";
}
add_action( 'wp_head', 'pages_customizer_css' );
function pages_customizer_css() {
?>
<style>
#container{max-width:<?php echo esc_html( get_theme_mod( 'pages_layout_width' ) ); ?>}
.home #content{column-count:<?php echo esc_html( get_theme_mod( 'pages_grid_columns' ) ); ?>;column-width:<?php echo esc_html( get_theme_mod( 'pages_grid_width' ) ); ?>;column-gap:<?php echo esc_html( get_theme_mod( 'pages_grid_gap' ) ); ?>}
.home .post{break-inside:avoid-column}
#container a, #footer a, ul#breadcrumbs li a, #container h1, #container h2, #container h3, #container h4, #container h5, #container h6, #container h1 a, #container h2 a, #container h3 a, #container h4 a, #container h5 a, #container h6 a, pre, code, #menu .menu-toggle:hover, #menu .menu-toggle:focus, #footer #social-menu a{color:<?php echo esc_html( get_theme_mod( 'pages_accent_color' ) ); ?>}
hr, .button, button, input[type="submit"]{background-color:<?php echo esc_html( get_theme_mod( 'pages_accent_color' ) ); ?>}
blockquote, input:focus, #search .search-field:focus, .wp-block-search__input:focus, textarea:focus, #footer .widget-container .search-field:focus, .sticky, .entry-meta .author-avatar img, #content .gallery img, .box, .box-2, .box-3, .box-4, .box-5, .box-6, .box-1-3, .box-2-3{border-color:<?php echo esc_html( get_theme_mod( 'pages_accent_color' ) ); ?>}
@media(min-width:769px){#menu .current-menu-item a, #menu .current_page_parent a{border-color:<?php echo esc_html( get_theme_mod( 'pages_accent_color' ) ); ?>}}
#container h1, #container h2, #container h3, #container h4, #container h5, #container h6, #container h1 a, #container h2 a, #container h3 a, #container h4 a, #container h5 a, #container h6 a{font-family:<?php echo esc_html( ucwords( str_replace( '+', ' ', get_theme_mod( 'pages_header_font' ) ) ) ); ?>;color:<?php echo esc_html( get_theme_mod( 'pages_header_color' ) ); ?>}
#content p{font-family:<?php echo esc_html( ucwords( str_replace( '+', ' ', get_theme_mod( 'pages_content_font' ) ) ) ); ?>;color:<?php echo esc_html( get_theme_mod( 'pages_content_color' ) ); ?>}
#container a, #footer a, ul#breadcrumbs li a{color:<?php echo esc_html( get_theme_mod( 'pages_link_color' ) ); ?>}
#footer #social-menu a{color:<?php echo esc_html( get_theme_mod( 'pages_social_color' ) ); ?>}
#slider, #slider .swiper-wrapper, #slider .swiper-slide{width:<?php echo esc_html( get_theme_mod( 'pages_slider_width' ) . '%' ); ?>}
#slider .slider-inner{padding:<?php echo esc_html( get_theme_mod( 'pages_slider_height' ) . '% 5%' ); ?>}
<?php if ( esc_html( !get_theme_mod( 'pages_no_dark_mode' ) ) ) { ?>
<?php if ( esc_html( !get_theme_mod( 'pages_dark_mode' ) ) ) { echo '@media(prefers-color-scheme:dark){'; } ?>
body{color:#ddd;background:#111}hr, input, textarea, #menu ul.sub-menu a, #menu ul.children a, #comments .odd > .comment-body{color:#fff;background:#333}.error404 .entry-content .search-field, .search .entry-content .search-field, .widget-container .search-field, body .wp-block-search__input{color:#fff;background-color:#333}#menu ul.sub-menu a, #menu ul.children a{border-color:#222}blockquote, .sticky, .post:after, .search article:after{border-color:#333}#site-title h1, #site-title a, #menu a, #menu .menu-toggle, #search .search-field:focus{color:#fff}#header, #footer, #menu ul.sub-menu a:hover, #menu ul.children a:hover, #menu ul.sub-menu a:focus, #menu ul.children a:focus{background:#222}#container{background:#000}body ul#breadcrumbs{color:#7d7d7d}ul#breadcrumbs li a{color:#008deb}.search-field, #search .search-field, body .wp-block-search__input{background-image:url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/find-light.png)}
.woocommerce div.product .woocommerce-tabs ul.tabs li.active, #add_payment_method #payment, .woocommerce-cart #payment, .woocommerce-checkout #payment{background:#222 !important}.woocommerce div.product .woocommerce-tabs ul.tabs li, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce div.product .woocommerce-tabs ul.tabs::before, .woocommerce div.product .woocommerce-tabs ul.tabs li::after, .woocommerce div.product .woocommerce-tabs ul.tabs li::before, .woocommerce #reviews #comments ol.commentlist li .comment-text{border-color:#222 !important}.woocommerce div.product .woocommerce-tabs ul.tabs li.active::after, .woocommerce div.product .woocommerce-tabs ul.tabs li.active::before{box-shadow:none !important}
.bbpress #bbpress-forums ul.status-closed, .bbpress #bbpress-forums ul.status-closed a{color:#fff}.bbpress #bbpress-forums div.odd, .bbpress #bbpress-forums ul.odd{background:#000}.bbpress #bbpress-forums li.bbp-header, .bbpress #bbpress-forums div.even, .bbpress #bbpress-forums ul.even, .bbpress #bbpress-forums li.bbp-footer, .bbpress #bbpress-forums li.bbp-header, .bbpress #bbpress-forums div.bbp-forum-header, .bbpress #bbpress-forums div.bbp-reply-header, .bbpress #bbpress-forums div.bbp-topic-header, .bbpress #bbpress-forums #bbp-single-user-details #bbp-user-navigation li.current a, .bbpress #bbpress-forums #bbp-your-profile fieldset input, .bbpress #bbpress-forums #bbp-your-profile fieldset textarea{background:#111}.bbpress .bbp-forum-content ul.sticky, .bbpress .bbp-topics ul.sticky, .bbpress .bbp-topics ul.super-sticky, .bbpress .bbp-topics-front ul.super-sticky{background:#222 !important}.bbpress #bbpress-forums li.bbp-body ul.forum, .bbpress #bbpress-forums li.bbp-body ul.topic, .bbpress #bbpress-forums li.bbp-footer, .bbpress #bbpress-forums li.bbp-header, .bbpress #bbpress-forums ul.bbp-forums, .bbpress #bbpress-forums ul.bbp-lead-topic, .bbpress #bbpress-forums ul.bbp-replies, .bbpress #bbpress-forums ul.bbp-search-results, .bbpress #bbpress-forums ul.bbp-topics, .bbpress #bbpress-forums fieldset.bbp-form, .bbpress .wp-editor-container, .bbpress div.bbp-forum-header, .bbpress div.bbp-reply-header, .bbpress div.bbp-topic-header, .bbpress #bbpress-forums .bbp-reply-content ul.bbp-reply-revision-log, .bbpress #bbpress-forums .bbp-reply-content ul.bbp-topic-revision-log, .bbpress #bbpress-forums .bbp-topic-content ul.bbp-topic-revision-log, .bbpress #bbpress-forums #bbp-your-profile fieldset input, .bbpress #bbpress-forums #bbp-your-profile fieldset textarea{border-color:#222}
@media(min-width:769px){#header, #container{box-shadow:0 0 20px #222}.lights a:before{background-color:#007acc}}
@media(max-width:768px){#header{border-color:#333}#menu.toggled a, #menu.toggled ul.sub-menu a, #menu.toggled ul.children a{color:#fff}#menu.toggled ul.sub-menu a, #menu.toggled ul.children a{color:#aaa}}
<?php if ( esc_html( !get_theme_mod( 'pages_dark_mode' ) ) ) { echo '}'; } ?>
<?php } ?>
<?php if ( esc_html( get_theme_mod( 'pages_sticky_header' ) ) ) { echo '@media(min-width:769px){#header{position:sticky;top:0;z-index:9999}}'; } ?>
<?php if ( esc_html( get_theme_mod( 'pages_center_logo' ) ) ) { echo '#header{height:auto}#branding, #menu{display:block;width:100%;text-align:center;float:none}'; } ?>
<?php if ( esc_html( get_theme_mod( 'pages_left_logo' ) ) ) { echo '#header{height:auto}#branding, #menu{display:block;width:100%;text-align:left;float:none}#menu{text-align:center}'; } ?>
<?php if ( esc_html( get_theme_mod( 'pages_hide_header' ) ) ) { echo '#header{display:none}'; } ?>
<?php if ( esc_html( get_theme_mod( 'pages_hide_branding' ) ) ) { echo '#branding{display:none}'; } ?>
<?php if ( esc_html( get_theme_mod( 'pages_hide_menu' ) ) ) { echo '#menu{display:none}'; } ?>
<?php if ( esc_html( get_theme_mod( 'pages_hide_search' ) ) ) { echo '#search{display:none}'; } ?>
<?php if ( esc_html( get_theme_mod( 'pages_hide_breadcrumbs' ) ) ) { echo 'ul#breadcrumbs{display:none}'; } ?>
<?php if ( esc_html( get_theme_mod( 'pages_hide_footer' ) ) ) { echo '#footer{display:none}'; } ?>
</style>
<?php
}
add_action( 'customize_preview_init', 'pages_customizer_preview' );
function pages_customizer_preview() {
wp_enqueue_script( 'pages-theme-customizer', get_template_directory_uri() . '/customizer/customizer.js',
array( 'jquery', 'customize-preview' ),
'',
true
);
}
add_action( 'admin_init', 'pages_customizer_style' );
function pages_customizer_style() {
wp_enqueue_style( 'pages-customizer-style', get_template_directory_uri() . '/customizer/customizer.css' );
}
add_action( 'customize_preview_init', 'pages_customizer_styles' );
add_action( 'wp_enqueue_scripts', 'pages_customizer_styles' );
function pages_customizer_styles() {
if ( get_theme_mod( 'pages_display_icons' ) ) {
wp_enqueue_style( 'pages-icons', get_template_directory_uri() . '/icons/icons.css' );
}
if ( get_theme_mod( 'pages_display_slider' ) && is_home() ) {
wp_enqueue_style( 'pages-slider-style', get_template_directory_uri() . '/css/slider.css' );
}
if ( !empty( get_theme_mod( 'pages_header_font' ) ) ) {
wp_enqueue_style( 'pages-header-font', 'https://fonts.googleapis.com/css?family=' . esc_html( ucwords( str_replace( ' ', '+', get_theme_mod( 'pages_header_font' ) ) ) ) );
}
if ( !empty( get_theme_mod( 'pages_content_font' ) ) ) {
wp_enqueue_style( 'pages-content-font', 'https://fonts.googleapis.com/css?family=' . esc_html( ucwords( str_replace( ' ', '+', get_theme_mod( 'pages_content_font' ) ) ) ) );
}
}
add_action( 'customize_preview_init', 'pages_customizer_scripts' );
add_action( 'wp_footer', 'pages_customizer_scripts' );
function pages_customizer_scripts() {
if ( get_theme_mod( 'pages_display_slider' ) && is_home() ) {
wp_register_script( 'pages-slider-script', get_template_directory_uri() . '/js/slider.js' );
wp_enqueue_script( 'pages-slider-script' );
wp_add_inline_script( 'pages-slider-script',
'const swiper = new Swiper("#slider", {
autoplay: ' . ( esc_html( get_theme_mod( 'pages_slider_autoplay' ) ) ? 'true' : 'false' ) . ',
loop: ' . ( esc_html( get_theme_mod( 'pages_slider_loop' ) ) ? 'true' : 'false' ) . ',
delay: ' . ( esc_html( get_theme_mod( 'pages_slider_delay' ) ) ? esc_html( get_theme_mod( 'pages_slider_delay' ) ) : '3000' ) . ',
speed: ' . ( esc_html( get_theme_mod( 'pages_slider_speed' ) ) ? esc_html( get_theme_mod( 'pages_slider_speed' ) ) : '1000' ) . ',
effect: "' . ( esc_html( get_theme_mod( 'pages_slider_effect' ) ) ? esc_html( get_theme_mod( 'pages_slider_effect' ) ) : 'slide' ) . '",' . ( esc_html( get_theme_mod( 'pages_slider_nav' ) ) ? '
navigation: {
nextEl: ".swiper-button-next",
prevEl: ".swiper-button-prev"
}' : '' ) . '
});'
);
}
}