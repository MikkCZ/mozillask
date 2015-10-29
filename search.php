<?php get_header(); ?>

<?php get_sidebar(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<h3 class="archive">Výsledok vyhľadávania<br/><small>hľadaný výraz: <strong>'<?php echo wp_specialchars($s); ?>'</strong></small></h3>
		

		<?php while (have_posts()) : the_post(); ?>
				
			<div class="post">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanentný odkaz na <?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('l, j. F Y') ?></small>
				
				<div class="entry">
					<?php the_excerpt() ?>
				</div>
		
				<p class="postmetadata">Rubrika <?php the_category(', ') ?> <strong>|</strong> <?php edit_post_link('Upraviť ','','<strong>|</strong>'); ?>  <?php comments_popup_link('Žiadne komentáre &#187;', '1 komentár &#187;', '% komentárov &#187;'); ?></p> 
				
				<!--
				<?php trackback_rdf(); ?>
				-->
			</div>
	
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php posts_nav_link('','','&laquo; Staršie položky') ?></div>
			<div class="alignright"><?php posts_nav_link('','Novšie položky &raquo;','') ?></div>
		</div>
	
	<?php else : ?>

		<h2 class="center">Not Found</h2>

	<?php endif; ?>

		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		
	</div>


<?php get_footer(); ?>
