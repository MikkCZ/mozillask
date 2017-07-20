<?php
/*
Template Name: Archiv produktov 
*/
?>


<?php get_header(); ?>

<?php get_sidebar(); ?>

<div class="entrytext">

	<div id="content" class="narrowcolumn">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="post-page">
	<h2 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>

				<?php get_archiv($wp_query->post->post_content) ?>
	
  </div>
  <?php endwhile; endif;?>
  </div>
	<?php edit_post_link('Upraviť tento článok', '<p class="center">', '</p>'); ?>
</div>  
  
<?php get_footer(); ?> 
