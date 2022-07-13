<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php pages_schema_type(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="wrapper" class="hfeed">
<?php if ( get_header_image() ) { echo '<div id="header-image"><a href="' . esc_url( home_url( '/' ) ) . '"><img src="' . esc_url( get_header_image() ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" /></a></div>'; } ?>
<header id="header" role="banner">
<div id="branding">
<div id="site-title" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
<?php
if ( is_front_page() || is_home() || is_front_page() && is_home() ) {
echo '<h1>';
}
if ( has_custom_logo() ) {
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
$nologo = '';
} elseif ( has_site_icon() ) {
$logo = get_site_icon_url();
$nologo = '';
} else {
$logo = '';
$nologo = 'no-logo';
}
echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name' ) ) . '" rel="home" itemprop="url"><span class="screen-reader-text" itemprop="name">' . esc_html( get_bloginfo( 'name' ) ) . '</span><span id="logo-container" itemprop="logo" itemscope itemtype="https://schema.org/ImageObject"><img src="';
if ( has_custom_logo() ) {
echo esc_url( $logo[0] );
} else {
echo esc_url( $logo );
}
echo '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" id="logo" class="' . esc_attr( $nologo ) . '" itemprop="url" /></span></a>';
if ( is_front_page() || is_home() || is_front_page() && is_home() ) {
echo '</h1>';
}
?>
</div>
<meta itemprop="description" content="<?php if ( is_single() ) { echo esc_html( wp_strip_all_tags( get_the_excerpt(), true ) ); } else { bloginfo( 'description' ); } ?>" />
</div>
<nav id="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
<span class="looper before" tabindex="0"></span>
<button type="button" class="menu-toggle first"><span class="menu-icon">&#9776;</span><span class="menu-text screen-reader-text"><?php esc_html_e( ' Menu', 'pages' ); ?></span></button>
<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'link_before' => '<span itemprop="name">', 'link_after' => '</span>' ) ); ?>
<div id="search"><?php get_search_form(); ?></div>
<span class="looper after" tabindex="0"></span>
</nav>
</header>
<?php if ( get_theme_mod( 'pages_display_hero' ) && is_home() ) { ?>
<div id="hero" <?php if ( get_theme_mod( 'pages_hero_overlay' ) ) { echo 'class="overlay"'; } ?> style="background-color:<?php echo esc_attr( get_theme_mod( 'pages_hero_bg_color' ) ); ?>;background-image:url(<?php echo esc_url( get_theme_mod( 'pages_hero_bg_image' ) ); ?>)">
<?php if ( get_theme_mod( 'pages_hero_h1' ) ) { ?><h1 style="color:<?php echo esc_attr( get_theme_mod( 'pages_hero_bg_color' ) ); ?>"><span><?php echo esc_html( get_theme_mod( 'pages_hero_h1' ) ); ?></span></h1><?php } ?>
<?php if ( get_theme_mod( 'pages_hero_h2' ) ) { ?><h2 style="color:<?php echo esc_attr( get_theme_mod( 'pages_hero_bg_color' ) ); ?>"><span><?php echo esc_html( get_theme_mod( 'pages_hero_h2' ) ); ?></span></h2><?php } ?>
<?php if ( get_theme_mod( 'pages_hero_p' ) ) { ?><p style="color:<?php echo esc_attr( get_theme_mod( 'pages_hero_bg_color' ) ); ?>"><span><?php echo esc_html( get_theme_mod( 'pages_hero_p' ) ); ?></span></p><?php } ?>
<?php if ( get_theme_mod( 'pages_hero_cta' ) ) { ?><a href="<?php echo esc_url( get_theme_mod( 'pages_hero_cta_link' ) ); ?>" class="cta button<?php if ( get_theme_mod( 'pages_hero_cta_round' ) ) { echo ' round'; } ?>" style="color:<?php echo esc_url( get_theme_mod( 'pages_hero_cta_color' ) ); ?>;background-color:<?php echo esc_url( get_theme_mod( 'pages_hero_cta_color' ) ); ?>"><span><?php echo esc_html( get_theme_mod( 'pages_hero_cta' ) ); ?></span></a><?php } ?>
<?php if ( get_theme_mod( 'pages_hero_cta_2' ) ) { ?><span class="spacer"></span><a href="<?php echo esc_url( get_theme_mod( 'pages_hero_cta_link_2' ) ); ?>" class="cta button<?php if ( get_theme_mod( 'pages_hero_cta_round' ) ) { echo ' round'; } ?>" style="color:<?php echo esc_url( get_theme_mod( 'pages_hero_cta_color_2' ) ); ?>;background-color:<?php echo esc_url( get_theme_mod( 'pages_hero_cta_color_2' ) ); ?>"><span><?php echo esc_html( get_theme_mod( 'pages_hero_cta_2' ) ); ?></span></a><?php } ?>
</div>
<?php } ?>
<?php if ( get_theme_mod( 'pages_display_slider' ) && is_home() ) { ?>
<div id="slider" class="swiper">
<div class="swiper-wrapper">
<?php if ( get_theme_mod( 'pages_slider_content_1' ) || get_theme_mod( 'pages_slider_bg_image_1' ) ) { ?><div class="swiper-slide<?php if ( get_theme_mod( 'pages_slider_overlay_1' ) ) { echo ' overlay'; } ?>" style="background-color:<?php echo esc_attr( get_theme_mod( 'pages_slider_bg_color_1' ) ); ?>;background-image:url(<?php echo esc_url( get_theme_mod( 'pages_slider_bg_image_1' ) ); ?>)"><?php if ( get_theme_mod( 'pages_slider_link_1' ) ) { echo '<a href="' . esc_url( get_theme_mod( 'pages_slider_link_1' ) ) . '">'; } ?><div class="slider-inner"><?php echo wp_kses_post( get_theme_mod( 'pages_slider_content_1' ) ); ?></div><?php if ( get_theme_mod( 'pages_slider_link_1' ) ) { echo '</a>'; } ?></div><?php } ?>
<?php if ( get_theme_mod( 'pages_slider_content_2' ) || get_theme_mod( 'pages_slider_bg_image_2' ) ) { ?><div class="swiper-slide<?php if ( get_theme_mod( 'pages_slider_overlay_2' ) ) { echo ' overlay'; } ?>" style="background-color:<?php echo esc_attr( get_theme_mod( 'pages_slider_bg_color_2' ) ); ?>;background-image:url(<?php echo esc_url( get_theme_mod( 'pages_slider_bg_image_2' ) ); ?>)"><?php if ( get_theme_mod( 'pages_slider_link_2' ) ) { echo '<a href="' . esc_url( get_theme_mod( 'pages_slider_link_2' ) ) . '">'; } ?><div class="slider-inner"><?php echo wp_kses_post( get_theme_mod( 'pages_slider_content_2' ) ); ?></div><?php if ( get_theme_mod( 'pages_slider_link_2' ) ) { echo '</a>'; } ?></div><?php } ?>
<?php if ( get_theme_mod( 'pages_slider_content_3' ) || get_theme_mod( 'pages_slider_bg_image_3' ) ) { ?><div class="swiper-slide<?php if ( get_theme_mod( 'pages_slider_overlay_3' ) ) { echo ' overlay'; } ?>" style="background-color:<?php echo esc_attr( get_theme_mod( 'pages_slider_bg_color_3' ) ); ?>;background-image:url(<?php echo esc_url( get_theme_mod( 'pages_slider_bg_image_3' ) ); ?>)"><?php if ( get_theme_mod( 'pages_slider_link_3' ) ) { echo '<a href="' . esc_url( get_theme_mod( 'pages_slider_link_3' ) ) . '">'; } ?><div class="slider-inner"><?php echo wp_kses_post( get_theme_mod( 'pages_slider_content_3' ) ); ?></div><?php if ( get_theme_mod( 'pages_slider_link_3' ) ) { echo '</a>'; } ?></div><?php } ?>
<?php if ( get_theme_mod( 'pages_slider_content_4' ) || get_theme_mod( 'pages_slider_bg_image_4' ) ) { ?><div class="swiper-slide<?php if ( get_theme_mod( 'pages_slider_overlay_4' ) ) { echo ' overlay'; } ?>" style="background-color:<?php echo esc_attr( get_theme_mod( 'pages_slider_bg_color_4' ) ); ?>;background-image:url(<?php echo esc_url( get_theme_mod( 'pages_slider_bg_image_4' ) ); ?>)"><?php if ( get_theme_mod( 'pages_slider_link_4' ) ) { echo '<a href="' . esc_url( get_theme_mod( 'pages_slider_link_4' ) ) . '">'; } ?><div class="slider-inner"><?php echo wp_kses_post( get_theme_mod( 'pages_slider_content_4' ) ); ?></div><?php if ( get_theme_mod( 'pages_slider_link_4' ) ) { echo '</a>'; } ?></div><?php } ?>
<?php if ( get_theme_mod( 'pages_slider_content_5' ) || get_theme_mod( 'pages_slider_bg_image_5' ) ) { ?><div class="swiper-slide<?php if ( get_theme_mod( 'pages_slider_overlay_5' ) ) { echo ' overlay'; } ?>" style="background-color:<?php echo esc_attr( get_theme_mod( 'pages_slider_bg_color_5' ) ); ?>;background-image:url(<?php echo esc_url( get_theme_mod( 'pages_slider_bg_image_5' ) ); ?>)"><?php if ( get_theme_mod( 'pages_slider_link_5' ) ) { echo '<a href="' . esc_url( get_theme_mod( 'pages_slider_link_5' ) ) . '">'; } ?><div class="slider-inner"><?php echo wp_kses_post( get_theme_mod( 'pages_slider_content_5' ) ); ?></div><?php if ( get_theme_mod( 'pages_slider_link_5' ) ) { echo '</a>'; } ?></div><?php } ?>
<?php if ( get_theme_mod( 'pages_slider_content_6' ) || get_theme_mod( 'pages_slider_bg_image_6' ) ) { ?><div class="swiper-slide<?php if ( get_theme_mod( 'pages_slider_overlay_6' ) ) { echo ' overlay'; } ?>" style="background-color:<?php echo esc_attr( get_theme_mod( 'pages_slider_bg_color_6' ) ); ?>;background-image:url(<?php echo esc_url( get_theme_mod( 'pages_slider_bg_image_6' ) ); ?>)"><?php if ( get_theme_mod( 'pages_slider_link_6' ) ) { echo '<a href="' . esc_url( get_theme_mod( 'pages_slider_link_6' ) ) . '">'; } ?><div class="slider-inner"><?php echo wp_kses_post( get_theme_mod( 'pages_slider_content_6' ) ); ?></div><?php if ( get_theme_mod( 'pages_slider_link_6' ) ) { echo '</a>'; } ?></div><?php } ?>
<?php if ( get_theme_mod( 'pages_slider_content_7' ) || get_theme_mod( 'pages_slider_bg_image_7' ) ) { ?><div class="swiper-slide<?php if ( get_theme_mod( 'pages_slider_overlay_7' ) ) { echo ' overlay'; } ?>" style="background-color:<?php echo esc_attr( get_theme_mod( 'pages_slider_bg_color_7' ) ); ?>;background-image:url(<?php echo esc_url( get_theme_mod( 'pages_slider_bg_image_7' ) ); ?>)"><?php if ( get_theme_mod( 'pages_slider_link_7' ) ) { echo '<a href="' . esc_url( get_theme_mod( 'pages_slider_link_7' ) ) . '">'; } ?><div class="slider-inner"><?php echo wp_kses_post( get_theme_mod( 'pages_slider_content_7' ) ); ?></div><?php if ( get_theme_mod( 'pages_slider_link_7' ) ) { echo '</a>'; } ?></div><?php } ?>
<?php if ( get_theme_mod( 'pages_slider_content_8' ) || get_theme_mod( 'pages_slider_bg_image_8' ) ) { ?><div class="swiper-slide<?php if ( get_theme_mod( 'pages_slider_overlay_8' ) ) { echo ' overlay'; } ?>" style="background-color:<?php echo esc_attr( get_theme_mod( 'pages_slider_bg_color_8' ) ); ?>;background-image:url(<?php echo esc_url( get_theme_mod( 'pages_slider_bg_image_8' ) ); ?>)"><?php if ( get_theme_mod( 'pages_slider_link_8' ) ) { echo '<a href="' . esc_url( get_theme_mod( 'pages_slider_link_8' ) ) . '">'; } ?><div class="slider-inner"><?php echo wp_kses_post( get_theme_mod( 'pages_slider_content_8' ) ); ?></div><?php if ( get_theme_mod( 'pages_slider_link_8' ) ) { echo '</a>'; } ?></div><?php } ?>
<?php if ( get_theme_mod( 'pages_slider_content_9' ) || get_theme_mod( 'pages_slider_bg_image_9' ) ) { ?><div class="swiper-slide<?php if ( get_theme_mod( 'pages_slider_overlay_9' ) ) { echo ' overlay'; } ?>" style="background-color:<?php echo esc_attr( get_theme_mod( 'pages_slider_bg_color_9' ) ); ?>;background-image:url(<?php echo esc_url( get_theme_mod( 'pages_slider_bg_image_9' ) ); ?>)"><?php if ( get_theme_mod( 'pages_slider_link_9' ) ) { echo '<a href="' . esc_url( get_theme_mod( 'pages_slider_link_9' ) ) . '">'; } ?><div class="slider-inner"><?php echo wp_kses_post( get_theme_mod( 'pages_slider_content_9' ) ); ?></div><?php if ( get_theme_mod( 'pages_slider_link_9' ) ) { echo '</a>'; } ?></div><?php } ?>
<?php if ( get_theme_mod( 'pages_slider_content_10' ) || get_theme_mod( 'pages_slider_bg_image_10' ) ) { ?><div class="swiper-slide<?php if ( get_theme_mod( 'pages_slider_overlay_10' ) ) { echo ' overlay'; } ?>" style="background-color:<?php echo esc_attr( get_theme_mod( 'pages_slider_bg_color_10' ) ); ?>;background-image:url(<?php echo esc_url( get_theme_mod( 'pages_slider_bg_image_10' ) ); ?>)"><?php if ( get_theme_mod( 'pages_slider_link_10' ) ) { echo '<a href="' . esc_url( get_theme_mod( 'pages_slider_link_10' ) ) . '">'; } ?><div class="slider-inner"><?php echo wp_kses_post( get_theme_mod( 'pages_slider_content_10' ) ); ?></div><?php if ( get_theme_mod( 'pages_slider_link_10' ) ) { echo '</a>'; } ?></div><?php } ?>
</div>
<?php if ( get_theme_mod( 'pages_slider_nav' ) ) { ?>
<div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>
<?php } ?>
</div>
<?php } ?>
<?php if ( is_active_sidebar( 'header-widget-area' ) ) : ?>
<aside id="sidebar-header" role="complementary">
<div class="widget-area">
<ul class="xoxo">
<?php dynamic_sidebar( 'header-widget-area' ); ?>
</ul>
</div>
</aside>
<?php endif; ?>
<?php echo pages_breadcrumbs(); ?>
<div id="container" class="<?php if ( is_active_sidebar( 'header-widget-area' ) ) { echo 'no-top-margin'; } ?>">
<main id="content" class="<?php if ( !is_active_sidebar( 'sidebar-widget-area' ) ) { echo 'full-width'; } ?>" role="main">