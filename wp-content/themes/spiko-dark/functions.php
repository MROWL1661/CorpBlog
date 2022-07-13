<?php
// Global variables define
define('SPIKO_DARK_PARENT_TEMPLATE_DIR_URI', get_template_directory_uri());
define('SPIKO_DARK_TEMPLATE_DIR_URI', get_stylesheet_directory_uri());
define('SPIKO_DARK_CHILD_TEMPLATE_DIR', trailingslashit(get_stylesheet_directory()));

if (!function_exists('wp_body_open')) {
    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action('wp_body_open');
    }
}

add_action('after_setup_theme', 'spiko_dark_setup');

function spiko_dark_setup() {
    load_child_theme_textdomain('spiko-dark', SPIKO_DARK_CHILD_TEMPLATE_DIR . '/languages');
    /*
    * Let WordPress manage the document title.
    */
    add_theme_support('title-tag');
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');
    //About Theme
        if(!function_exists( 'spiko_plus_activate' )) :
        $theme = wp_get_theme(); // gets the current theme
        if ( 'Spiko Dark' == $theme->name) 
        {
            if ( is_admin() ) 
            {
                require SPIKO_DARK_CHILD_TEMPLATE_DIR . '/admin/admin-init.php';
            }
        }
        endif;
}

add_action('wp_enqueue_scripts', 'spiko_dark_enqueue_styles',11);

function spiko_dark_enqueue_styles() {

    wp_enqueue_style('spiko-dark-parent-style', SPIKO_DARK_PARENT_TEMPLATE_DIR_URI . '/style.css', array('bootstrap'));
    wp_style_add_data('spiko-dark-parent-style', 'rtl', 'replace' );
    wp_style_add_data('spiko-dark-style', 'rtl', 'replace' );
    wp_dequeue_style( 'spiko-default');
    
    if (get_theme_mod('custom_color_enable') == true) {
        spiko_dark_custom_light();
    }
    else {
        wp_enqueue_style('spiko-dark-default-style', SPIKO_DARK_TEMPLATE_DIR_URI . '/assets/css/default.css');
    }
    wp_enqueue_style('spiko-dark-css', SPIKO_DARK_TEMPLATE_DIR_URI . '/assets/css/dark.css');
   
}

function spiko_dark_footer_section_hook() {
    ?>
    <footer class="site-footer">  
        <div class="container">
            <?php if (is_active_sidebar('footer-sidebar-1') || is_active_sidebar('footer-sidebar-2') || is_active_sidebar('footer-sidebar-3') | is_active_sidebar('footer-sidebar-4')): ?> 
                <?php get_template_part('sidebar', 'footer');
            endif;?>  
        </div>
        <!-- Animation lines-->
        <div _ngcontent-kga-c2="" class="lines">
            <div _ngcontent-kga-c2="" class="line"></div>
            <div _ngcontent-kga-c2="" class="line"></div>
            <div _ngcontent-kga-c2="" class="line"></div>
        </div>
        <!--/ Animation lines-->
        <?php if (get_theme_mod('ftr_bar_enable', true) == true): ?>
            <div class="site-info text-center">
            <?php echo wp_kses_post(get_theme_mod('footer_copyright', '<span class="copyright">'.__( 'Proudly powered by <a href="https://wordpress.org">WordPress</a> | Theme: <a href="https://spicethemes.com/spiko-dark-wordpress-theme" rel="nofollow">Spiko Dark</a> by <a href="https://spicethemes.com" rel="nofollow">Spicethemes</a>', 'spiko-dark').'</span>')); ?>     
            </div>
        <?php endif; ?>
        <style type="text/css">
            <?php
            if (get_theme_mod('testimonial_image_overlay', true) != false) {
                $testimonial_overlay_section_color = get_theme_mod('testimonial_overlay_section_color', 'rgba(0,0,0,0.8)');
                ?>
                .section-space.testimonial:before {
                    background-color:<?php echo esc_attr($testimonial_overlay_section_color); ?>;
                }
                <?php } else{ ?>
                .section-space.testimonial:before {
                    background-color: rgba(0,0,0,0);
                }
               <?php } ?>
        </style>
    </footer>
    <?php
    $scrolltotop_setting_enable = get_theme_mod('scrolltotop_setting_enable', true);
    if ($scrolltotop_setting_enable == true) {
        ?>
        <div class="scroll-up custom right"><a href="#totop"><i class="fa fa-arrow-up"></i></a></div>
    <?php }
}

add_action('spiko_dark_footer_section_hook', 'spiko_dark_footer_section_hook');

//Add custom color function
function spiko_dark_custom_light() {
    $spiko_dark_link_color = esc_attr(get_theme_mod('link_color','#35ac39'));
    
    if ( $spiko_dark_link_color != '#ff0000' ) :?>
    <style type="text/css"> 
        .services2 .post::before {
            background-color: <?php echo $spiko_dark_link_color; ?>;
        }
        .services2 .post-thumbnail i.fa { 
            color: <?php echo $spiko_dark_link_color; ?>;
        }
        .dark .blog .entry-header a:hover{
            color: <?php echo $spiko_dark_link_color; ?>;
        }
        body.dark .navigation.pagination .page-numbers.dots:hover {
            color: <?php echo $spiko_dark_link_color; ?>;
        }
        body.dark .site-info span a:hover{
          color: <?php echo $spiko_dark_link_color; ?>;
        }
        body .testi-4 .testmonial-block figcaption a .name:hover{
             color: <?php echo $spiko_dark_link_color; ?>;
        }
    </style>
<?php
endif;
}

function spiko_dark_custom_style(){?>  
    <style type="text/css">
    <?php
    $enable_content_link_clr_setting = get_theme_mod('content_clr_enable', false);
    if ($enable_content_link_clr_setting == true):?>
            
        body.dark .blog .entry-header a{
            color: <?php echo esc_attr(get_theme_mod('h4_color', '#0a0a0a')); ?>;
        }
      
    <?php endif;?>
    </style>
    <?php
}
add_action('wp_head','spiko_dark_custom_style');