<div id="sidebar">
  <?php
    if ( is_active_sidebar( 'left_sidebar' ) ) {
      dynamic_sidebar( 'left_sidebar' );
    }
  ?>
</div>

<div id="infobar">
  <?php
    if ( is_active_sidebar( 'right_sidebar' ) ) {
      dynamic_sidebar( 'right_sidebar' );
    }
  ?>
</div>
