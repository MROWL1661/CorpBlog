<?php
add_action( 'after_setup_theme', 'pages_setup' );
function pages_setup() {
load_theme_textdomain( 'pages', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo' );
add_theme_support( 'custom-header' );
add_theme_support( 'custom-background' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'responsive-embeds' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'html5', array( 'search-form', 'navigation-widgets' ) );
add_theme_support( 'woocommerce' );
global $content_width;
if ( !isset( $content_width ) ) { $content_width = 1920; }
register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'pages' ), 'footer-menu' => esc_html__( 'Footer Menu', 'pages' ), 'social-menu' => esc_html__( 'Social Menu', 'pages' ) ) );
}
require_once( get_template_directory() . '/about.php' );
add_action( 'wp_enqueue_scripts', 'pages_enqueue' );
function pages_enqueue() {
wp_enqueue_style( 'pages-style', get_stylesheet_uri() );
wp_enqueue_script( 'jquery' );
wp_register_script( 'pages-videos', get_template_directory_uri() . '/js/videos.js' );
wp_enqueue_script( 'pages-videos' );
wp_add_inline_script( 'pages-videos', 'jQuery(document).ready(function($){$("body").vids();});' );
}
add_action( 'wp_footer', 'pages_footer' );
function pages_footer() {
?>
<script>
jQuery(document).ready(function($) {
$(".before").on("focus", function() {
$(".last").focus();
});
$(".after").on("focus", function() {
$(".first").focus();
});
$("#search .search-field").addClass("last");
$(".menu-toggle").on("keypress click", function(e) {
if (e.which == 13 || e.type === "click") {
e.preventDefault();
$("#menu").toggleClass("toggled");
$(".looper").toggle();
}
});
$(document).keyup(function(e) {
if (e.keyCode == 27) {
if ($("#menu").hasClass("toggled")) {
$("#menu").toggleClass("toggled");
}
}
});
$("img.no-logo").each(function() {
var alt = $(this).attr("alt");
$(this).replaceWith(alt);
});
});
</script>
<?php
}
add_action( 'admin_notices', 'pages_notice' );
function pages_notice() {
$user_id = get_current_user_id();
$admin_url = ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http' ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$param = ( count( $_GET ) ) ? '&' : '?';
if ( !get_user_meta( $user_id, 'pages_notice_dismissed_2' ) && current_user_can( 'manage_options' ) )
echo '<div class="notice notice-info"><p><a href="' . esc_url( $admin_url ), esc_html( $param ) . 'dismiss" class="alignright" style="text-decoration:none"><big>' . esc_html__( 'Ⓧ', 'pages' ) . '</big></a>' . wp_kses_post( __( '<big><strong>💜 Thank you for using Pages!</strong></big>', 'pages' ) ) . '<br /><br /><a href="https://wordpress.org/support/theme/pages/reviews/#new-post" class="button-primary" target="_blank">' . esc_html__( 'Review', 'pages' ) . '</a> <a href="https://github.com/bhadaway/support" class="button-primary" target="_blank">' . esc_html__( 'Feature Requests & Support', 'pages' ) . '</a> <a href="https://pageswp.org/donate" class="button-primary" target="_blank">' . esc_html__( 'Donate', 'pages' ) . '</a></p></div>';
}
add_action( 'admin_init', 'pages_notice_dismissed' );
function pages_notice_dismissed() {
$user_id = get_current_user_id();
if ( isset( $_GET['dismiss'] ) )
add_user_meta( $user_id, 'pages_notice_dismissed_2', 'true', true );
}
add_filter( 'document_title_separator', 'pages_document_title_separator' );
function pages_document_title_separator( $sep ) {
$sep = esc_html( '|' );
return $sep;
}
add_filter( 'the_title', 'pages_title' );
function pages_title( $title ) {
if ( $title == '' ) {
return esc_html( '...' );
} else {
return wp_kses_post( $title );
}
}
function pages_schema_type() {
$schema = 'https://schema.org/';
if ( is_single() ) {
$type = "Article";
} elseif ( is_author() ) {
$type = 'ProfilePage';
} elseif ( is_search() ) {
$type = 'SearchResultsPage';
} else {
$type = 'WebPage';
}
echo 'itemscope itemtype="' . esc_url( $schema ) . esc_attr( $type ) . '"';
}
add_filter( 'nav_menu_link_attributes', 'pages_schema_url', 10 );
function pages_schema_url( $atts ) {
$atts['itemprop'] = 'url';
return $atts;
}
if ( !function_exists( 'pages_wp_body_open' ) ) {
function pages_wp_body_open() {
do_action( 'wp_body_open' );
}
}
add_action( 'wp_body_open', 'pages_skip_link', 5 );
function pages_skip_link() {
echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__( 'Skip to the content', 'pages' ) . '</a>';
}
add_filter( 'the_content_more_link', 'pages_read_more_link' );
function pages_read_more_link() {
if ( !is_admin() ) {
return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">' . sprintf( __( '...%s', 'pages' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
}
}
add_filter( 'excerpt_more', 'pages_excerpt_read_more_link' );
function pages_excerpt_read_more_link( $more ) {
if ( !is_admin() ) {
global $post;
return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">' . sprintf( __( '...%s', 'pages' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
}
}
add_filter( 'big_image_size_threshold', '__return_false' );
add_filter( 'intermediate_image_sizes_advanced', 'pages_image_insert_override' );
function pages_image_insert_override( $sizes ) {
unset( $sizes['medium_large'] );
unset( $sizes['1536x1536'] );
unset( $sizes['2048x2048'] );
return $sizes;
}
function pages_reading_time() {
global $post;
$content = get_post_field( 'post_content', $post->ID );
$word_count = str_word_count( strip_tags( $content ) );
$readingtime = ceil( $word_count / 200 );
$totalreadingtime = $readingtime;
return $totalreadingtime;
}
function pages_breadcrumbs() {
ob_start();
global $post;
if ( !is_home() ) {
echo '<ul id="breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( home_url() ) . '/" itemprop="item"><span itemprop="name">' . esc_html__( 'Home', 'pages' ) . '</span></a><meta itemprop="position" content="1" /></li> <span aria-hidden="true">&rarr;</span> ';
if ( is_single() ) {
$categories = get_the_category();
$separator = ', ';
$output = '';
if ( !empty( $categories ) ) {
foreach( $categories as $category ) {
$output .= '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_category_link( $category->term_id ) ) . '" itemprop="item"><span itemprop="name">' . esc_attr( $category->name ) . '</span></a><meta itemprop="position" content="2" /></li>' . $separator;
}
echo trim( $output, $separator );
}
}
if ( is_single() ) {
echo ' <span aria-hidden="true">&rarr;</span> ';
}
echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="" itemprop="item"><span itemprop="name">';
remove_all_filters( 'wp_title' );
wp_title( '' );
echo '</span></a><meta itemprop="position" content="3" /></li>';
echo '</ul>';
}
$output = ob_get_clean();
return $output;
}
add_action( 'widgets_init', 'pages_widgets_init' );
function pages_widgets_init() {
register_sidebar( array(
'name' => esc_html__( 'Header Widget Area', 'pages' ),
'id' => 'header-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => '</li>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => esc_html__( 'Footer Widget Area', 'pages' ),
'id' => 'footer-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => '</li>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => esc_html__( 'Sidebar Widget Area', 'pages' ),
'id' => 'sidebar-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => '</li>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => esc_html__( 'Widgets Page Template Widget Area', 'pages' ),
'id' => 'widgets-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => '</li>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
add_action( 'wp_head', 'pages_pingback_header' );
function pages_pingback_header() {
if ( is_singular() && pings_open() ) {
printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
}
}
add_action( 'comment_form_before', 'pages_enqueue_comment_reply_script' );
function pages_enqueue_comment_reply_script() {
if ( get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
function pages_custom_pings( $comment ) {
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo esc_url( comment_author_link() ); ?></li>
<?php
}
add_filter( 'get_comments_number', 'pages_comment_count', 0 );
function pages_comment_count( $count ) {
if ( !is_admin() ) {
global $id;
$get_comments = get_comments( 'status=approve&post_id=' . $id );
$comments_by_type = separate_comments( $get_comments );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}
require_once( get_template_directory() . '/customizer/customizer.php' );