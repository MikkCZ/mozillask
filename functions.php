<?php
function register_mozillask_menus() {
  register_nav_menu( 'primary', __( 'Primary Menu', 'mozillask' ) );
  register_nav_menu( 'sidebar', __( 'Sidebar Menu', 'mozillask' ) );
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
}
add_action( 'widgets_init', 'register_mozillask_widget_areas' );
?>

