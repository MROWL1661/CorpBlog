<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php if ( is_home() || is_front_page() && is_home() || is_archive() || is_search() ) { ?>
<?php if ( ( has_post_thumbnail() ) && ( !is_search() ) ) : ?>
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a>
<?php endif; ?>
<?php } ?>
<header>
<?php edit_post_link(); ?>
<?php if ( is_singular() ) { echo '<h1 class="entry-title" itemprop="headline">'; } else { echo '<h2 class="entry-title">'; } ?>
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
<?php if ( is_singular() ) { echo '</h1>'; } else { echo '</h2>'; } ?>
<?php if ( is_single() ) { ?>
<div class="entry-meta">
<?php $author = get_userdata( $wp_query->post->post_author ); ?>
<div class="author-avatar"><a href="<?php echo esc_url( get_avatar_url( $author->user_email, array( 'size'=>1200 ) ) ); ?>" class="swipebox" data-rel="profile" target="_self" onclick="javascript:void(0)"><?php echo get_avatar( $author->user_email, 150 ); ?></a></div>
<span class="author vcard"><?php the_author_posts_link(); ?></span>
<time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" title="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" itemprop="datePublished" pubdate>
<span class="meta-sep"> &middot; </span>
<?php the_time( get_option( 'date_format' ) ); ?>
<meta itemprop="dateModified" content="<?php esc_attr( get_the_modified_date() ); ?>" />
<span class="meta-sep"> &middot; </span>
<span class="reading-time"><?php echo esc_html( pages_reading_time() ); ?> <?php esc_html_e( 'min read', 'pages' ); ?></span>
</time>
</div>
<?php } ?>
</header>
<?php if ( is_home() || is_front_page() && is_home() || is_archive() || is_search() ) { ?>
<div class="entry-summary">
<div itemprop="description"><?php the_excerpt(); ?></div>
<?php if ( is_search() ) { ?>
<div class="entry-links"><?php wp_link_pages(); ?></div>
<?php } ?>
</div>
<?php } else { ?>
<div class="entry-content" itemprop="mainEntityOfPage">
<?php if ( has_post_thumbnail() ) : ?>
<a href="<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false ); echo esc_url( $src[0] ); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); ?></a>
<?php endif; ?>
<meta itemprop="description" content="<?php echo esc_html( wp_strip_all_tags( get_the_excerpt(), true ) ); ?>" />
<?php the_content(); ?>
<div class="entry-links"><?php wp_link_pages(); ?></div>
</div>
<?php } ?>
<?php if ( is_single() ) { ?>
<footer class="entry-footer">
<span class="cat-links"><?php esc_html_e( 'Categories: ', 'pages' ); ?><?php the_category( ', ' ); ?></span>
<span class="tag-links"><?php the_tags(); ?></span>
<?php if ( comments_open() ) { echo '<span class="meta-sep">|</span> <span class="comments-link"><a href="' . esc_url( get_comments_link() ) . '">' . sprintf( esc_html__( 'Comments', 'pages' ) ) . '</a></span>'; } ?>
</footer>
<?php } ?>
</article>
<?php if ( comments_open() && !post_password_required() ) { comments_template( '', true ); } ?>
<?php endwhile; endif; ?>
<?php if ( is_single() ) {
echo '<footer class="footer">';
$args = array(
'prev_text' => '<span class="meta-nav">&larr;</span> %title',
'next_text' => '%title <span class="meta-nav">&rarr;</span>'
);
the_post_navigation( $args );
echo '</footer>';
} else {
$args = array(
'prev_text' => sprintf( esc_html__( '%s older', 'pages' ), '<span class="meta-nav">&larr;</span>' ),
'next_text' => sprintf( esc_html__( 'newer %s', 'pages' ), '<span class="meta-nav">&rarr;</span>' )
);
the_posts_navigation( $args );
}
?>
<?php get_footer(); ?>