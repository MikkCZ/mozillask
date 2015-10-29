<?php get_header(); ?>

<?php get_sidebar(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post-page">
		<h2 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>
			<div class="entrytext">
				<?php the_content('<p class="serif">Čítajte zvyšok článku &raquo;</p>'); ?>
	
				<?php wp_link_pages("before=<p><strong>Prečítajte si ďalšie podstránky: </strong>&after=</p>&next_or_number=number&pagelink= % "); ?>
	
			</div>
		</div>
	  <?php endwhile; endif; ?>
	<?php edit_post_link('Upraviť tento článok', '<p class="center">', '</p>'); ?>
	</div>


<?php get_footer(); ?>
