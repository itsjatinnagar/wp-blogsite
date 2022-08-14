<?php

function blogsite_theme_support() {
  // Dynamic Title Tags Support
  add_theme_support('title-tag');
  add_theme_support('custom-logo');
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'blogsite_theme_support');

function blogsite_menus() {
  $locations = array(
    'primary' => 'Desktop Primary Left Sidebar',
    'footer' => 'Footer Menu Items'
  );

  register_nav_menus($locations);
}
add_action('init', 'blogsite_menus');

function blogsite_register_styles() {
  $version = wp_get_theme()->get('Version');
  
  wp_enqueue_style('blogsite-bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css', array(), '5.3.1', 'all');
  wp_enqueue_style('blogsite-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0', 'all');
  wp_enqueue_style('blogsite-style', get_template_directory_uri() . '/assets/css/style.css', array('blogsite-bootstrap'), $version, 'all');
}
add_action('wp_enqueue_scripts', 'blogsite_register_styles');

function blogsite_register_scripts() {
  wp_enqueue_script('blogsite-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js', array(), '3.7.0', true);
  wp_enqueue_script('blogsite-popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js', array(), '2.11.8', true);
  wp_enqueue_script('blogsite-bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js', array(), '5.3.1', true);
  wp_enqueue_script('blogsite-main', get_template_directory_uri() . '/assets/js/main.js', array(), '3.7.0', true);
}
add_action('wp_enqueue_scripts', 'blogsite_register_scripts');

function blogsite_widget_areas() {
  register_sidebar(
    array(
      'before_title' => '',
      'after_title' => '',
      'before_widget' => '',
      'after_widget' => '',
      'name' => 'Sidebar Area',
      'id' => 'sidebar-1',
      'description' => 'Sidebar Widget Area',
    )
  );

  register_sidebar(
    array(
      'before_title' => '',
      'after_title' => '',
      'before_widget' => '',
      'after_widget' => '',
      'name' => 'Footer Area',
      'id' => 'footer-1',
      'description' => 'Footer Widget Area',
    )
  );
}
add_action('widgets_init', 'blogsite_widget_areas');

?>