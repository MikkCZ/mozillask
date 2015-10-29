	<div id="sidebar">

		<div id="sideinfo">
			<?php /* If this is a category archive */ if (is_category()) { ?>
			<p>Práve si prezeráte archív rubriky <?php single_cat_title(''); ?>.</p>
			
			<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
			<p>Práve si prezeráte archív weblogu <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a>
			zo dňa <?php the_time('l, F jS Y'); ?>.</p>
			
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<p>Práve si prezeráte archív weblogu <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a>
			za <?php the_time('F Y'); ?>.</p>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<p>Práve si prezeráte archív webpogu <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a>
			za rok <?php the_time('Y'); ?>.</p>
			
			<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<p>Práve si prezeráte archív weblogu <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a>.</p>

			<?php } ?>
		</div>

		<div id="pagenav-top"><div id="pagenav-bottom"><div id="pagenav"><ul><?php wp_list_pages('depth=1&sort_column=menu_order&title_li='); ?><li class="page_item"><a href="http://forum.mozilla.sk/" title="Fórum Mozilla.sk">Fórum Mozilla.sk</a></li></ul></div></div></div>

		<div id="archnav"><h2>Archívy</h2>
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
		</div>

		<div id="categnav"><h2>Rubriky</h2>
				<ul>
				<?php list_cats(0, '', 'name', 'asc', '', 1, 0, 1, 1, 1, 1, 0,'','','','','') ?>
				</ul>
		</div>

		<div id="linknav"><h2>Odkazy</h2>
				<ul>
				<?php get_links('-1', '<li>', '</li>', '<br />', FALSE, 'id', TRUE, 
TRUE, -1, TRUE); ?>
				</ul>
		</div>

		<div id="supportnav"><h2>Podporujeme</h2>
		<p><a href="http://www.skosi.org/" title="Slovak Open Source Initiative"><img class="centered" src="/wp-content/themes/mozillask/images/skosi.png" alt="SKosi.org" /></a></p>
		</div>
			
	</div>

