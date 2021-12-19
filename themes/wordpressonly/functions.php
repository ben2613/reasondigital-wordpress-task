<?php

function wordpressonly_theme_setup() {
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
  register_nav_menus( [
    'primary_menu' => __( 'Primary Menu', ),
  ]);
}
add_action( 'after_setup_theme', 'wordpressonly_theme_setup' );

function wordpressonly_add_scripts() {
  wp_enqueue_style( 'normalize-css', "https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" );
  wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'wordpressonly_add_scripts' );
