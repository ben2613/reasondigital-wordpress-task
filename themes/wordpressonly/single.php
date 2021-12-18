<?php
/**
* The template for displaying all single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package WordPress
* @subpackage Twenty_Twenty_One
* @since Twenty Twenty-One 1.0
*/

get_header();

/* Start the Loop */
while ( have_posts() ) :
  the_post();
  ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header alignwide">
      <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
      <?php the_content(); ?>
      <?php the_post_thumbnail(); ?>
    </div><!-- .entry-content -->

  </article><!-- #post-<?php the_ID(); ?> -->
  <?php
endwhile; // End of the loop.

get_footer();
