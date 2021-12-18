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
<?php elseif(is_home() || is_category()): ?>
  <header class="page-header alignwide">
    <div class="siteInfo">
      <h1 class="site-title"><?php bloginfo('name');?></h1>
      <h2 class="site-tagline"><?php bloginfo('description'); ?></h2>
    </div>
    <div class="cat_menu">
    <?php
      $menu_attrs = [
        'menu' => 'primary_menu',
        'echo' => false,
        'depth' => 0,
        'container' => false,
        'items_wrap' => '%3$s',
      ];
      echo strip_tags(wp_nav_menu($menu_attrs), '<a>');
    ?>
    </div>
  </header><!-- .page-header -->
<?php endif;?>

  <div class="article-container">
<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();
    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium_large');
?>

  <article>
    <img class="thumbnail" src="<?php echo htmlentities($thumbnail ? $thumbnail[0] : ''); ?>" />
    <h3><?php the_title(); ?></h3>
    <?php the_category(', '); ?>
  </article>

  <?php }
}
?>
  </div> <!--article-container-->
<?php
get_footer();
