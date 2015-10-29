<?php get_header(); ?>

<?php get_sidebar(); ?>

	<div id="content" class="narrowcolumn">

		<?php if (have_posts()) : ?>

		 <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>				
		<h3 class="archive">Archív rubriky <?php echo single_cat_title(); ?><br/><small>
		Práve si prezeráte archív rubriky <?php echo single_cat_title(); ?> na serveri <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a>.</small></h3>
		
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h3 class="archive">Archív z&nbsp;<?php the_time('j.n.Y'); ?><small>
		Práve si prezeráte archív článkov servera <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a>
			za <?php the_time('j.n.Y'); ?>.</small></h3>
		
	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h3 class="archive">Archív správ - <?php the_time('F Y'); ?><br/><small>
		Práve si prezeráte archív článkov servera <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a>
			za <?php the_time('n/Y'); ?>.</small></h3>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h3 class="archive">Archív správ - rok <?php the_time('Y'); ?><br/><small>
		Práve si prezeráte archív článkov servera <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a>
			za rok <?php the_time('Y'); ?>.</small></h3>
		
	  <?php /* If this is a search */ } elseif (is_search()) { ?>
		<h3 class="archive">Výsledky vyhľadávania</h3>
		
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h3 class="archive">Archív autora</h3>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h3 class="archive">Archív blogu</h3>

		<?php } ?>


		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Staršie články',0) ?></div>
			<div class="alignright"><?php previous_posts_link('Novšie články &raquo;',0) ?></div>
		</div>

		<?php while (have_posts()) : the_post(); ?>
		<div class="post-top">
		<div class="post-bottom">
			<div class="post">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanentný odkaz na <?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('l, j.n.Y') ?></small>
				
				<div class="entry">
					<?php the_excerpt() ?>
				</div>
		
				<p class="postmetadata">Rubrika <?php the_category(', ') ?> <strong>|</strong> <?php edit_post_link('Edit','','<strong>|</strong>'); ?>  <?php comments_popup_link('Žiadne komentáre &#187;', 'Komentáre (1) &#187;', 'Komentáre (%) &#187;'); ?></p>
				
				<!--
				<?php trackback_rdf(); ?>
				-->
			</div>
		</div>
		</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Staršie články',0) ?></div>
			<div class="alignright"><?php previous_posts_link('Novšie články &raquo;',0) ?></div>
		</div>
	
	<?php else : ?>

		<h2 class="center">Nenájdené</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
		
	</div>


<?php get_footer(); ?>
