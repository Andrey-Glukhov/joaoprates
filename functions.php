<?php
function jp_script_enqueue(){
//css
	wp_enqueue_style( 'jp-stylesheet', get_template_directory_uri() . '/css/joaoprates.css', array(), '1.0.0', 'all' );
  //js
  // unregister jQuery
  wp_deregister_script('jquery-core');
  wp_deregister_script('jquery');

  // register
  wp_register_script( 'jquery-core', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', false, null, true );
  wp_register_script( 'jquery', false, array('jquery-core'), null, true );

  // enqueue
  wp_enqueue_script( 'jquery' );
  // Bootstrap
  wp_enqueue_script( 'bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array('jquery'), null, true );
  
  wp_enqueue_script( 'jp-js', get_template_directory_uri() . '/js/joaoprates.js', array('jquery', 'bootstrap-js'), null, true );

  
}
add_action( 'wp_enqueue_scripts', 'jp_script_enqueue' );

function jp_theme_setup(){
  add_theme_support('menus');
  register_nav_menu('primary_left', 'Primary Header Left');
  register_nav_menu('primary_right', 'Primary Header Right');
  register_nav_menu('footer_links_menu', 'Footer Links Area');
  register_nav_menu('footer_support_menu', 'Footer Support Area');
  register_nav_menu('footer_social_menu', 'Footer Social Area');
}

function mytheme_add_woocommerce_support() {
  add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

add_action('init', 'jp_theme_setup');
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-formats', array('aside', 'chat', 'gallery','link','image','quote','status','video'));
add_theme_support('post-thumbnails');



?>
