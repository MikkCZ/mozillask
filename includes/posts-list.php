<?php while ( have_posts() ) : ?>
	<?php the_post(); ?>
	<div class="post">
		<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanentný odkaz na <?php the_title(); ?>"><?php the_title(); ?></a></h3>
		<small><?php the_time('j.n.Y'); ?>, autor: <?php the_author(); ?></small>
		<div class="entry"><?php the_content('Čítať zvyšok tohto článku &raquo;'); ?></div>
		<p class="postmetadata">Rubrika <?php the_category(', '); ?> <strong>|</strong> <?php edit_post_link('Upraviť','','<strong>|</strong>'); ?>  <?php comments_popup_link('Žiadne komentáre &#187;', 'Komentáre (1) &#187;', 'Komentáre (%) &#187;', 'comments-link', 'Komentáre vypnuté'); ?></p>
	</div>
<?php endwhile; ?>
