<?php get_header(); ?>

<?php get_sidebar(); ?>

<?php
	if ( !is_paged() ) {
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
		$feed = fetch_feed('https://www.mozilla.cz/feed/'); // specify feed url
		if ( !is_wp_error( $feed ) ) {
			$items = $feed->get_items(0, $feed->get_item_quantity(5)); // specify first and last item
		}
	}
?>

	<div id="content" class="narrowcolumn">

	<?php if ( !is_paged() && !empty($items) ) : ?>
		<div class="post-top"><div class="post-bottom">
			<div class="post" id="zo-sveta-mozilly">
				<img src="/wp-content/themes/mozillask/images/spravy-svet.png" alt="Správy zo sveta Mozilly" /><br/>
				<div class="first">
					<h3><a href="<?php echo $items[0]->get_permalink(); ?>" target="_blank"><?php echo $items[0]->get_title(); ?></a></h3>
					<small><?php echo formatdatum(strtotime($items[0]->get_date())); ?><? if (!is_null($items[0]->get_authors())) : ?>, autor: <?php echo $items[0]->get_authors()[0]->get_name(); ?><?php endif; ?></small>
					<p><?php echo $items[0]->get_description(); ?></p>
				</div>
				<div>
					<?php for ($i = 1; $i < count($items); $i++) {?>
						<h4><a href="<?php echo $items[$i]->get_permalink(); ?>" target="_blank"><?php echo $items[$i]->get_title(); ?></a></h4>
						<small><?php echo formatdatum(strtotime($items[$i]->get_date())); ?></small><br/>
					<?php } ?>
					<small class="alignright tucne"><a href="https://www.mozilla.cz/" target="_blank">ďalšie správy na Mozilla.cz&raquo;</a></small>
				</div>
			</div>
		</div></div>

	<?php
		$spravicky = 13;
		$paged = (get_query_var('paged')) ? get_query_var('paged') : '1&posts_per_page=5';
		query_posts("cat=-$spravicky&paged=$paged");
	?>

	<?php if (have_posts()) : ?>

		<?php include (TEMPLATEPATH . '/includes/posts-list.php'); ?>
		<?php include (TEMPLATEPATH . '/includes/posts-list-navigation.php'); ?>

	<?php else : ?>

		<div class="error">Žiaľ, hľadáte niečo, čo sa tu nenachádza.</div>
		<?php include (TEMPLATEPATH . '/includes/searchform.php'); ?>

	<?php endif; ?>

	</div>

<?php get_footer(); ?>

