<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
<header class="header">
<h1 class="entry-title" itemprop="name"><?php printf( esc_html__( 'Search Results for: %s', 'pages' ), get_search_query() ); ?></h1>
</header>
<?php while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header>
<h2 class="entry-title">
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
</h2>
</header>
<div class="entry-summary">
<span itemprop="description"><?php the_excerpt(); ?></span>
<div class="entry-links"><?php wp_link_pages(); ?></div>
</div>
</article>
<?php endwhile; ?>
<?php
$args = array(
'prev_text' => sprintf( esc_html__( '%s older', 'pages' ), '<span class="meta-nav">&larr;</span>' ),
'next_text' => sprintf( esc_html__( 'newer %s', 'pages' ), '<span class="meta-nav">&rarr;</span>' )
);
the_posts_navigation( $args );
?>
<?php else : ?>
<article id="post-0" class="post no-results not-found">
<header class="header">
<h1 class="entry-title" itemprop="name"><?php esc_html_e( 'Nothing Found', 'pages' ); ?></h1>
</header>
<div class="entry-content" itemprop="mainContentOfPage">
<p><?php esc_html_e( 'Sorry, nothing matched your search. Please try again.', 'pages' ); ?></p>
<?php get_search_form(); ?>
</div>
</article>
<?php endif; ?>
<?php get_footer(); ?>