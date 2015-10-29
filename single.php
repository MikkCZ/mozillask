<?php get_header(); ?>

<?php get_sidebar(); ?>

	<div id="content" class="narrowcolumn">
				
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div class="navigation">
			<div class="alignleft"><?php previous_post('&laquo; %','','yes') ?></div>
			<div class="alignright"><?php next_post(' % &raquo;','','yes') ?></div>
		</div>
	
		<div class="post-page">
		<br/>
			<h2 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>
	
			<div class="entrytext">
				<?php the_content('<p class="serif">Čítať zvyšok tohto článku &raquo;</p>'); ?>
	
				<?php link_pages('<p><strong>Strán:</strong> ', '</p>', 'number'); ?>
	
				<p class="postmetadata alt">
					
						Tento príspevok bol zaradený dňa <?php the_time('j.n.Y') ?> o&nbsp;<?php the_time() ?>
						do&nbsp;rubriky <?php the_category(', ') ?>.
						Komentáre môžete sledovať pomocou <?php comments_rss_link('RSS 2.0'); ?>.
						
						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							Môžete <a href="#respond">pridať komentár</a> alebo <a href="<?php trackback_url(display); ?>">trackback</a> z&nbsp;vášho servera.
						
						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Komentáre sú momentálne uzavreté, ale môžete <a href="<?php trackback_url(display); ?> ">trackback</a>ovať z&nbsp;vášho servera.
						
						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							Môžete preskočiť na koniec a pridať komentár. Pingovanie momentálne nie je povolené.
			
						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							Komentáre aj pingy nie sú momentálne povolené.
						
						<?php } edit_post_link('Upraviť tento príspevok.','',''); ?>
						
					
				</p>
	
			</div>
		</div>
		
	<?php comments_template(); ?>
	
	<?php endwhile; else: ?>
	
		<p><?php _e('Žiaľ, ani jeden príspevok nevyhovuje daným kritériám.'); ?></p>
	
<?php endif; ?>
	
	</div>

<?php get_footer(); ?>
