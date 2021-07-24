<?php get_header(); ?>

<?php get_sidebar(); ?>

<div id="content" class="narrowcolumn">

  <?php while (have_posts()) : ?>
    <?php the_post(); ?>
    <div class="post-page">
      <h2 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>
      <div class="entrytext">
        <?php the_content('<p class="serif">Čítať zvyšok tohto článku &raquo;</p>'); ?>
        <?php wp_link_pages("before=<p><strong>Prečítajte si ďalšie podstránky: </strong>&after=</p>&next_or_number=number&pagelink= % "); ?>
      </div>
    </div>
  <?php endwhile; ?>

  <?php edit_post_link('Upraviť tento článok', '<p class="center">', '</p>'); ?>

</div>

<?php get_footer(); ?>
