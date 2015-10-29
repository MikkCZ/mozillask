<?php
/*
Template Name: Spravicky
*/
?>

<?php get_header(); ?>

<?php get_sidebar(); ?>

	<div id="content" class="narrowcolumn">
	

	<h2 class="pagetitle">Krátke správy zo sveta Mozilly</h2>
		

	<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("cat=13&paged=$paged&showposts=8"); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
			<div class="alignleft"><?php posts_nav_link('','','&laquo; Staršie správy') ?></div>
			<div class="alignright"><?php posts_nav_link('','Novšie správy &raquo;','') ?></div>
		</div>
	
	<?php else : ?>

		<h2 class="center">Neboli nájdené žiadne správy.</h2>
	  <?php endif; ?>
	</div>

<?php get_footer(); ?> 
