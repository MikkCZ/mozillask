<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("cat=-13&paged=$paged"); ?>

	<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>
				
			<div class="post-top">
			<div class="post-bottom">
				<div class="post">
					<small><?php the_time('j.n.Y \o G:i') ?>, autor: <?php the_author() ?></small>
					<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanentný odkaz na <?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<div class="entry">
						<?php the_content('Čítať zvyšok tohto článku &raquo;'); ?>
					</div>
					<p class="postmetadata">Rubrika <?php the_category(', ') ?> <strong>|</strong> <?php edit_post_link('Edit','','<strong>|</strong>'); ?>  <?php comments_popup_link('Žiadne komentáre &#187;', '1 komentár &#187;', 'Komentáre (%) &#187;'); ?></p>
				</div>
			</div>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php posts_nav_link('','','&laquo; Staršie články') ?></div>
			<div class="alignright"><?php posts_nav_link('','Novšie články &raquo;','') ?></div>
		</div>
		
	<?php else : ?>

		<h2 class="center">Nenájdené</h2>
		<p class="center"><?php _e("Žiaľ, hľadáte niečo, čo sa tu nenachádza."); ?></p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
