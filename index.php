<?php get_header(); ?>

<?php get_sidebar(); ?>

<?php
function is_dst()
{
// Is it DST? 
 $offset = get_option('gmt_offset', 1);
 return $offset * 3600; 
}

function formatdatum($datum)
{
  $teraz = localtime(time()+is_dst());
	$dnes=mktime(23,59,59,$teraz[4]+1,$teraz[3],$teraz[5]+1900);
		if($dnes - $datum < 86400)
			$vysledok='<strong><span class="dnes">dnes</span></strong> o '.date("H:i",$datum);
		else if (($dnes - $datum > 86400) && ($dnes - $datum < 172800))
			$vysledok='<strong><span style="color: black">včera</span></strong> o '.date("H:i",$datum);
		else
			$vysledok=date("j.n.Y \o H:i",$datum);
	return $vysledok;
}

?>
<?php $spravicky=13 ?>

<!--<p class="center" style="padding-top: 0; margin-top: 10px;">
<object type="application/x-shockwave-flash" data="/wp-content/images/banners/flash/banner_fx3_datetime.swf" width="468" height="60" id="flashmovie" >
    <param name="movie" value="/wp-content/images/banners/flash/banner_fx3_coming.swf" />
    <param name="quality" value="high" />
    <param name="swliveconnect" value="true" />
    <param name="wmode" value="transparent" />
  </object>
</p> -->
  <div id="content" class="narrowcolumn">
	

<?php
include_once(ABSPATH.WPINC.'/rss.php'); // path to include script
$feed = fetch_rss('http://feeds.feedburner.com/Mozillacz'); // specify feed url
$limit = 4;
$items = array_slice($feed->items, 0, $limit+1); // specify first and last item
?>

 
  <?php
   if (is_paged()== false ) :
      if (!empty($items)) : ?>
		<div class="post-top">
		<div class="post-bottom">
		<div class="post">
   	 <table border="0">
			<tr>
				<td rowspan="2" style="width:295px;vertical-align: top; padding-right: 15px;padding-bottom: 3px; padding-top: 0px;">
						<img src="/wp-content/themes/mozillask/images/spravy-svet.png" alt="svet" /> <!-- style="position: absolute; top: 115px; padding-left: 15px;" -->

						<h3 style="text-align: left;"><a href="<?php echo $items[0]['link'] ?>" target="_blank" rel="bookmark" title="Permanentný odkaz na <?php echo $items[0]['title']; ?>"><?php echo $items[0]['title']; ?></a></h3>
						<small><?php echo formatdatum(strtotime($items[0]['pubdate'])+is_dst())?>, autor: <?php echo $items[0]['dc']['creator']?> </small> 
						<p><?php echo $items[0]['description']; ?></p>

				</td>
			  	<td style="vertical-align: top; text-align: left; padding-top: 10px;">
						<?php for ($i = 1; $i <= $limit; $i++) {?>
						<h4><a href="<?php echo $items[$i]['link'] ?>" target="_blank" rel="bookmark" title="Permanentný odkaz na <?php echo $items[$i]['title']; ?>"><?php echo $items[$i]['title']; ?></a></h4>
						<small><?php echo formatdatum(strtotime($items[$i]['pubdate'])+is_dst()) ?></small><br/>
					<?php } ?>
				</td>
    		</tr>
    		<tr>
				<td><small class="alignright tucne"><a href="http://www.mozilla.cz/" target="_blank">ďalšie správy na Mozilla.cz&raquo;</a></small></td>
			</tr>
    	</table>
			
		</div>
		</div>
		</div>
   <?php endif;
   endif; ?>





	<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : '1&posts_per_page=5'; query_posts("cat=-$spravicky&paged=$paged"); 

	 if (have_posts()) : while (have_posts()) : the_post();  ?>
    		
				
			<div class="post-top">
			<div class="post-bottom">
				<div class="post">
					
					<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanentný odkaz na <?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<small><?php echo formatdatum(get_post_time())/*the_time('j.n.Y \o G:i')*/ ?>, autor: <?php the_author() ?></small>
					<div class="entry">
						<?php the_content('Čítať zvyšok tohto článku &raquo;'); ?>
					</div>
					<p class="postmetadata">Rubrika <?php the_category(', ') ?> <strong>|</strong> <?php edit_post_link('Upraviť','','<strong> |</strong>'); ?>  <?php comments_popup_link('Žiadne komentáre &#187;', 'Komentáre (1) &#187;', 'Komentáre (%) &#187;'); ?></p>
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
		<p class="center"><?php _e("Žiaľ, hľadáte niečo, čo sa tu nenachádza."); ?></p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>
	
	<?php
	$nah = rand(1, 3);
	if ($nah == 2) $nah = 'tb2';
	else if ($nah == 3) $nah = 'sb';
	else $nah = 'fx';
	?>
<!-- <p class="center">
  <object type="application/x-shockwave-flash" data="/wp-content/images/banners/flash/banner-<?php echo $nah ?>.swf" width="468" height="60" id="FlashMovie" >
    <param name="movie" value="/wp-content/images/banners/flash/banner-<?php echo $nah ?>.swf" />
    <param name="quality" value="high" />
    <param name="swliveconnect" value="true" />
    <param name="wmode" value="transparent" />
  </object>
  <br/><small><a href="http://www.mozilla.sk/">Mozilla.sk - základňa slovenskej lokalizačnej komunity</a><br/><br/>Banery vhodné pre vašu stránku nájdete v sekcii <a href="/download/tapety-a-reklamne-pruzky/">Propagácia</a>.</small></p> -->

	</div>



<?php get_footer(); ?>
