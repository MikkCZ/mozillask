<?php

function register_mozillask_menus() {
  register_nav_menu( 'primary', __( 'Primary Menu', 'mozillask' ) );
}
add_action( 'after_setup_theme', 'register_mozillask_menus' );

function register_mozillask_widget_areas() {
  register_sidebar( array(
    'name'          => 'Left sidebar',
    'id'            => 'left_sidebar',
    'before_widget' => '<div class="left-sidebar-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => 'Right sidebar',
    'id'            => 'right_sidebar',
    'before_widget' => '<div class="infopanel">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="nadpis">',
    'after_title'   => '</div>',
  ) );
}
add_action( 'widgets_init', 'register_mozillask_widget_areas' );

function filter_mozillask_search_templete() {
  return locate_template('archive.php');
}
add_filter( 'search_template', 'filter_mozillask_search_templete' );
