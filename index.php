<?php get_header(); ?>

<?php get_sidebar(); ?>

<?php
	function is_dst() {
		$offset = get_option('gmt_offset', 1);
		return $offset * 3600;
	}

	function formatdatum($datum) {
		$teraz = localtime(time()+is_dst());
		$dnes = mktime(23,59,59,$teraz[4]+1,$teraz[3],$teraz[5]+1900);
		if($dnes - $datum < 86400) {
			$vysledok = '<strong><span class="dnes">dnes</span></strong>';
		} else if ($dnes - $datum < 172800) {
			$vysledok = '<strong><span class="vcera">včera</span></strong>';
		} else {
			$vysledok = date("j.n.Y", $datum);
		}
		return $vysledok;
	}

	include_once(ABSPATH.WPINC.'/rss.php'); // path to include script
	$feed = fetch_rss('https://feeds.feedburner.com/Mozillacz'); // specify feed url
	$items = array_slice($feed->items, 0, 5); // specify first and last item
?>

	<div id="content" class="narrowcolumn">

	<?php if ( !is_paged() && !empty($items) ) : ?>
		<div class="post-top"><div class="post-bottom">
			<div class="post" id="zo-sveta-mozilly">
				<img src="/wp-content/themes/mozillask/images/spravy-svet.png" alt="Správy zo sveta Mozilly" /><br/>
				<div class="first">
					<h3><a href="<?php echo $items[0]['link']; ?>" target="_blank"><?php echo $items[0]['title']; ?></a></h3>
					<small><?php echo formatdatum(strtotime($items[0]['pubdate'])); ?>, autor: <?php echo $items[0]['dc']['creator']; ?></small>
					<p><?php echo $items[0]['description']; ?></p>
				</div>
				<div>
					<?php for ($i = 1; $i < count($items); $i++) {?>
						<h4><a href="<?php echo $items[$i]['link']; ?>" target="_blank"><?php echo $items[$i]['title']; ?></a></h4>
						<small><?php echo formatdatum(strtotime($items[$i]['pubdate'])); ?></small><br/>
					<?php } ?>
					<small class="alignright tucne"><a href="https://www.mozilla.cz/" target="_blank">ďalšie správy na Mozilla.cz&raquo;</a></small>
				</div>
			</div>
		</div></div>
	<?php endif; ?>

	<?php
		$spravicky = 13;
		$paged = (get_query_var('paged')) ? get_query_var('paged') : '1&posts_per_page=5';
		query_posts("cat=-$spravicky&paged=$paged");
	?>

	<?php if (have_posts()) : ?>

		<?php include (TEMPLATEPATH . '/posts-list.php'); ?>
		<?php include (TEMPLATEPATH . '/posts-list-navigation.php'); ?>

	<?php else : ?>

		<div class="error">Žiaľ, hľadáte niečo, čo sa tu nenachádza.</div>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>

<?php get_footer(); ?>

