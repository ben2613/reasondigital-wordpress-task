<?php
/**
 * The main template file
 *
 * Referring Twenty_Twenty_One
 * @package WordPress
 */

get_header();?>

<div class="article-container">
<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();
    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium_large');
?>

  <article>
    <a href="<?php the_permalink(); ?>">
      <img class="thumbnail" src="<?php echo htmlentities($thumbnail ? $thumbnail[0] : ''); ?>" />
    </a>
    <a href="<?php the_permalink(); ?>">
      <h3 class="article-title"><?php the_title(); ?></h3>
    </a>
    <?php the_category(', '); ?>
  </article>

  <?php }
}
?>
</div> <!--article-container-->
<?php
get_footer();
