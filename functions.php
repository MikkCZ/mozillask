<?php
function register_mozillask_menus() {
  register_nav_menu( 'primary', __( 'Primary Menu', 'mozillask' ) );
}
add_action( 'after_setup_theme', 'register_mozillask_menus' );
?>

