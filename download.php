<?php
/*
Template Name: Download
*/
?>

<?php

function ffDownloadTop()
{
	echo "<div class=\"dl-ff-top\"><div class=\"dl-ff-bottom\"><div class=\"dl-blob\"><img class=\"dl-logo\" src=\"/wp-content/themes/mozillask/images/dl-ff-logo.png\" alt=\"Firefox logo\" /><h2 id=\"dl-ff-logotype\">Firefox</h2>";
}
function ffDownloadBottom()
{
	echo "</div></div></div>";
}

?>


<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post-page">
		<h2 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>
			<div class="entrytext">
				<?php the_content('<p class="serif">Čítajte zvyšok článku &raquo;</p>'); ?>
	
				<?php wp_link_pages("before=<p><strong>Čítajte ďalšie stránky tohto článku: </strong>&after=</p>&next_or_number=number&pagelink= % "); ?>
	
			</div>
		</div>
	  <?php endwhile; endif; ?>
	<?php edit_post_link('Upraviť tento článok.', '<p>', '</p>'); ?>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
