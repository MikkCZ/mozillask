<?php get_header(); ?>

<?php get_sidebar(); ?>

<div id="content" class="narrowcolumn">

  <?php if (have_posts()) : ?>

    <?php while (have_posts()) : ?>
      <?php the_post(); ?>
      <div class="navigation">
        <div class="alignleft"><?php previous_post('&laquo; %','','yes') ?></div>
        <div class="alignright"><?php next_post(' % &raquo;','','yes') ?></div>
      </div>
      <div class="post-page">
        <h2 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>
        <div class="entrytext">
          <?php the_content('<p class="serif">Čítať zvyšok tohto článku &raquo;</p>'); ?>
          <?php link_pages('<p><strong>Strán:</strong> ', '</p>', 'number'); ?>
          <p class="postmetadata alt">
            Tento príspevok bol zaradený dňa <?php the_time('j.n.Y') ?> o&nbsp;<?php the_time() ?> do&nbsp;rubriky <?php the_category(', ') ?>.
            <?php if (('open' == $post-> comment_status)) { ?>
              Môžete <a href="#respond">pridať komentár</a> nižšie. Komentáre môžete sledovať pomocou <?php comments_rss_link('RSS'); ?>.
            <?php } else { ?>
              Komentáre nie sú momentálne povolené.
            <?php } ?>
          </p>
        </div>
      </div>
      <?php edit_post_link('Upraviť tento článok', '<p class="center">', '</p>'); ?>
      <?php comments_template(); ?>
    <?php endwhile; ?>

  <?php else: ?>

    <p><?php _e('Žiaľ, ani jeden príspevok nevyhovuje daným kritériám.'); ?></p>

  <?php endif; ?>

</div>

<?php get_footer(); ?>
