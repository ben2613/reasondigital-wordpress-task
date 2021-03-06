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
      <header class="page-header alignwide">
        <div id="icon-n-menu">
          <label for="menu-toggle" id="menu-icon">
            <div></div><div></div><div></div>
          </label>
          <?php
            if (has_custom_logo()) {
              the_custom_logo();
            }
          ?>
        </div>
        <input type="checkbox" id="menu-toggle" <?php echo is_category() ? 'checked' : ''; ?>>
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

      <main id="main" class="site-main" role="main">
