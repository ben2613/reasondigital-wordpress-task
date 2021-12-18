<?php
/**
 * The main template file
 *
 * Referring Twenty_Twenty_One
 * @package WordPress
 */

get_header();?>

<?php if (is_home() && !is_front_page() && !empty(single_post_title('', false))): ?>
  <header class="page-header alignwide">
  <h1 class="page-title"><?php single_post_title();?></h1>
  </header><!-- .page-header -->
<?php endif;?>

<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();
?>

  <h2><?php the_title();?></h2>

  <?php the_content();?>

  <?php }
}

get_footer();
