<?php
function is_dst() {
	$offset = get_option('gmt_offset', 1);
	return $offset * 3600;
}

function formatdatum($datum) {
	$teraz = localtime( time()+is_dst() );
	$dnes = mktime( 23, 59, 59, $teraz[4]+1, $teraz[3], $teraz[5]+1900 );
	if ($dnes - $datum < 86400) {
		return '<strong><span class="dnes">dnes</span></strong>';
	} elseif ($dnes - $datum < 172800) {
		return '<strong><span class="vcera">včera</span></strong>';
	} else {
		return date("j.n.Y", $datum);
	}
}

include_once(ABSPATH.WPINC.'/rss.php');
$feed = fetch_feed('https://www.mozilla.cz/feed/');
if ( !is_wp_error( $feed ) ) {
	$feed_items = $feed->get_items(0, $feed->get_item_quantity(5)); // specify first and last item
}
?>

<?php if ( !empty($feed_items) ) : ?>
	<div class="post" id="zo-sveta-mozilly">
		<img src="/wp-content/themes/mozillask/images/spravy-svet.png" alt="Správy zo sveta Mozilly" /><br/>
		<div class="first">
			<?php $feed_item = $feed_items[0]; ?>
			<h3><a href="<?php echo $feed_item->get_permalink(); ?>" target="_blank"><?php echo $feed_item->get_title(); ?></a></h3>
			<small><?php echo formatdatum(strtotime($feed_item->get_date())); ?></small>
			<p><?php echo $feed_item->get_description(); ?></p>
		</div>
		<div>
			<?php for ( $i = 1; $i < count($feed_items); $i++ ) : ?>
				<?php $feed_item = $feed_items[$i]; ?>
				<h4><a href="<?php echo $feed_item->get_permalink(); ?>" target="_blank"><?php echo $feed_item->get_title(); ?></a></h4>
				<small><?php echo formatdatum(strtotime($feed_item->get_date())); ?></small><br/>
			<?php endfor; ?>
			<small class="alignright tucne"><a href="https://www.mozilla.cz/" target="_blank">ďalšie správy na Mozilla.cz&raquo;</a></small>
		</div>
	</div>
<?php endif; ?>
