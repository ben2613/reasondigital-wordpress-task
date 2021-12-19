<?php
/**
 * The header.
 *
 * Referring Twenty_Twenty_One
 *
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

  <div id="content" class="site-content">
      <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
        <header class="page-header alignwide">
          <div id="icon-n-menu">
            <label for="menu-toggle" id="menu-icon">
              <div></div><div></div><div></div>
            </label>
            <?php if (has_site_icon()): ?>
            <a href="<?php site_url(); ?>"><img src="<?php echo get_site_icon_url(40) ?>" alt="Site Icon"></a>
            <?php endif; // has_site_icon ?>
          </div>
          <input type="checkbox" id="menu-toggle">
          <div class="menu-expand">
            <div class="site-info">
              <h1 class="site-title"><?php bloginfo('name');?></h1>
              <h2 class="site-tagline"><?php bloginfo('description'); ?></h2>
            </div>
            <div class="cat-menu">
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
          </div>
        </header>
