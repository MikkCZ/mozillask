<?php get_header(); ?>

<?php get_sidebar(); ?>

	<div id="content" class="narrowcolumn">

	<?php
		if (is_category()) { /* If this is a category archive */
			$title = 'Archív rubriky ' . single_cat_title('', false);
			$small_text = 'Práve si prezeráte archív rubriky ' . single_cat_title('', false) . ' na serveri <a href="' . get_settings('siteurl') . '">' . get_bloginfo('name') . '</a>.';
		} elseif (is_day()) { /* If this is a daily archive */
			$title = 'Archív z ' . get_the_time('j.n.Y');
			$small_text = 'Práve si prezeráte archív článkov servera <a href="' . get_settings('siteurl') . '">' . get_bloginfo('name') . '</a> za ' . get_the_time('j.n.Y') . '.';
		} elseif (is_month()) { /* If this is a monthly archive */
			$title = 'Archív z ' . get_the_time('F Y');
			$small_text = 'Práve si prezeráte archív článkov servera <a href="' . get_settings('siteurl') . '">' . get_bloginfo('name') . '</a> za ' . get_the_time('n/Y') . '.';
		} elseif (is_year()) { /* If this is a yearly archive */
			$title = 'Archív správ - rok ' . get_the_time('Y');
			$small_text = 'Práve si prezeráte archív článkov servera <a href="' . get_settings('siteurl') . '">' . get_bloginfo('name') . '</a> za rok ' . get_the_time('Y') . '.';
		} elseif (is_search()) { /* If this is a search */
			$title = 'Výsledok vyhľadávania';
			$small_text = 'hľadaný výraz: <strong>"' . wp_specialchars($s) . '"</strong>';
		} elseif (is_author()) { /* If this is an author archive */
			$title = 'Archív autora';
		} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { /* If this is a paged archive */
			$title = 'Archív blogu';
		}
	?>

	<h3 class="archive"><?php echo $title; ?>
		<?php if (isset($small_text)) { ?>
			<br/><small><?php echo $small_text; ?></small>
		<?php } ?>
	</h3>

	<?php if (have_posts()) : ?>

		<?php include (TEMPLATEPATH . '/includes/posts-list-navigation.php'); ?>
		<?php include (TEMPLATEPATH . '/includes/posts-list.php'); ?>
		<?php include (TEMPLATEPATH . '/includes/posts-list-navigation.php'); ?>

	<?php else : ?>

		<div class="error">Žiaľ, hľadáte niečo, čo sa tu nenachádza.</div>
		<?php include (TEMPLATEPATH . '/includes/searchform.php'); ?>

	<?php endif; ?>

	</div>

<?php get_footer(); ?>

