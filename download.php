<?php
/*
Template Name: Download
*/
?>


<?php get_header(); ?>

<?php get_sidebar(); ?>

<div class="entrytext">

	<div id="content" class="narrowcolumn">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="post-page">
	<h2 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>
	<h3>Slovenské inštalačné balíky</h3>
	<p>Tu sa nachádzajú aktuálne vydania programov kompletne v slovenskom jazyku.</p>

		<div id="firefox" class="dl-ff-top">
			<div class="dl-ff-bottom">
			<div class="dl-blob dl-ff-logo">
				
				<h2 id="dl-ff-logotype">Firefox</h2>

				<?php get_dlpage('firefox') ?>
	
			</div>
			<p style="margin-left: 10px; margin-right: 10px;">Nové verzie <b>Firefoxu 3.0</b> nájdete v našom <a href="/download/archiv-firefoxu/">archíve</a>. Firefox 3.0 bude podporovaný do <b>31. decembra 2009</b>.</p>
			</div>
		</div>

		<div id="thunderbird" class="dl-tb-top">
			<div class="dl-tb-bottom">
			<div class="dl-blob dl-tb-logo">
				
				<h2 id="dl-tb-logotype">Thunderbird</h2>

				<?php get_dlpage('thunderbird') ?>
	
			</div>
			</div>
		</div>

		<div id="mozilla-sunbird" class="dl-sb-top">
			<div class="dl-sb-bottom">
			<div class="dl-blob dl-sb-logo">
				
				<h2 id="dl-sb-logotype">Sunbird</h2>

				<?php get_dlpage('mozilla-sunbird') ?>
	
			</div>
			<p style="margin-left: 10px; margin-right: 10px;">Rozšírenie <b><a href="http://www.mozilla.org/projects/calendar/lightning/" hreflang="en" >Lightning</a></b> nájdete v sekcii <a href="/rozsirenia/lightning/">Rozšírenia</a>.</p>
			</div>
		</div>


		<div id="flock" class="dl-cm-top">
			<div class="dl-cm-bottom">
			<div class="dl-blob dl-fl-logo">
				
				<h2 id="dl-fl-logotype">Flock</h2>

				<?php get_dlpage('flock') ?>
	
			</div>
			</div>
		</div>

				<?php the_content('<p class="serif">Čítajte zvyšok článku &raquo;</p>'); ?>
	
				<?php wp_link_pages("before=<p><strong>Čítajte ďalšie stránky tohto článku: </strong>&after=</p>&next_or_number=number&pagelink= % "); ?>
	
			</div>
		</div>
	  <?php endwhile; endif; ?>
	<?php edit_post_link('Upraviť tento článok', '<p class="center">', '</p>'); ?>


	</div>

<?php get_footer(); ?> 
