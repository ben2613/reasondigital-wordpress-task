<?php

function wordpressonly_theme_setup() {
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'custom-logo' );
  register_nav_menus( [
    'primary_menu' => __( 'Primary Menu', ),
  ]);
}
add_action( 'after_setup_theme', 'wordpressonly_theme_setup' );

function wordpressonly_add_scripts() {
  wp_enqueue_style( 'normalize-css', "https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" );
  wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
  wp_enqueue_script( 'background-trigger', get_template_directory_uri() . '/triggerBackground.js');
}
add_action( 'wp_enqueue_scripts', 'wordpressonly_add_scripts' );

// get site icon into index json
add_filter( 'rest_index', 'add_icon_to_JSON' );
function add_icon_to_JSON($index) {
  $sizes = [32, 150, 180, 192, 270, 300, 'full'];
  $index->data['site_icon_url'] = [];
  for ($i=0; $i < sizeof($sizes); $i++) {
    $index->data['site_icon_url'][$sizes[$i]] = get_site_icon_url($sizes[$i]);
  }
  return $index;
}
