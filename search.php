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
		
				<p class="postmetadata">Rubrika <?php the_category(', ') ?> <strong>|</strong> <?php edit_post_link('Upraviť ','','<strong>|</strong>'); ?>  <?php comments_popup_link('Žiadne komentáre &#187;', 'Komentáre (1) &#187;', 'Komentáre (%) &#187;'); ?></p> 
				
				<!--
				<?php trackback_rdf(); ?>
				-->
			</div>
	
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Staršie články',0) ?></div>
			<div class="alignright"><?php previous_posts_link('Novšie články &raquo;',0) ?></div>
		</div>
	
	<?php else : ?>

		<h3 class="archive">Výsledok vyhľadávania<br/><small>hľadaný výraz: <strong>'<?php echo wp_specialchars($s); ?>'</strong></small></h3>
    <div class="error">Zadaný výraz sa nepodarilo nájsť.</div> <br/><br/><br/>
	<?php endif; ?>
    
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		
	</div>


<?php get_footer(); ?>
