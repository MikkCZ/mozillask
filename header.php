<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Archív blogu <?php } ?> <?php wp_title(); ?></title>

	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
	<meta name="description" content="mozilla, slovakia, slovensko, slovenčina, localization, lokalizácia, lokalizačná komunita, firefox, thunderbird, sunbird, camino, seamonkey, nvu, netscape, rozšírenia, pluginy, doplnky, download, stiahnutie, stiahnuť, fórum, podpora" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="Články (RSS 2.0)" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Články (Atom 0.3)" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="Komentáre (RSS 2.0)" href="<?php bloginfo('comments_rss2_url'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="Rozšírenia (RSS 2.0)" href="http://www.mozilla.sk/rozsirenia_rss.php" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="icon" href="/mozilla-16.png" type="image/png" />

	<?php wp_get_archives('type=monthly&format=link'); ?>

	<?php wp_head(); ?>
</head>
<body>

<div id="page">


<div id="header">
		<h1><a href="<?php echo get_settings('home'); ?>" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h1>
		<div class="description"><?php bloginfo('description'); ?></div>
</div>
<hr />
