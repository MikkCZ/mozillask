<?php get_header(); ?>

<?php get_sidebar(); ?>

<div id="content" class="narrowcolumn">

  <?php if ( !is_paged() ) : ?>
    <?php include (TEMPLATEPATH . '/includes/feed-mozilla-cz.php'); ?>
  <?php endif; ?>

  <?php
    $spravicky = 13;
    $paged = (get_query_var('paged')) ? get_query_var('paged') : '1&posts_per_page=5';
    query_posts("cat=-$spravicky&paged=$paged");
  ?>

  <?php if ( have_posts() ) : ?>
    <?php include (TEMPLATEPATH . '/includes/posts-list.php'); ?>
    <?php include (TEMPLATEPATH . '/includes/posts-list-navigation.php'); ?>
  <?php else : ?>
    <div class="error">Žiaľ, hľadáte niečo, čo sa tu nenachádza.</div>
    <?php include (TEMPLATEPATH . '/includes/searchform.php'); ?>
  <?php endif; ?>

</div>

<?php get_footer(); ?>
