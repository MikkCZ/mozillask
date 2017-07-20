<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="sk" lang="sk-SK">
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <meta http-equiv="content-language" content="sk" />

	<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Archív správ <?php } ?> <?php wp_title(); /*if (is_page('test')) msk_title();*/?></title>

	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
	<meta name="keywords" content="mozilla, slovakia, slovensko, slovenčina, localization, lokalizácia, lokalizačná komunita, firefox, thunderbird, sunbird, camino, seamonkey, nvu, netscape, rozšírenia, pluginy, doplnky, download, stiahnutie, stiahnuť, fórum, podpora" />
  <meta name="description" content="Mozilla.sk – základňa slovenskej lokalizačnej komunity"  />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="Články (RSS 2.0)" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Články (Atom 0.3)" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="Komentáre (RSS 2.0)" href="<?php bloginfo('comments_rss2_url'); ?>" />
<!--	<link rel="alternate" type="application/rss+xml" title="Rozšírenia (RSS 2.0)" href="https://www.mozilla.sk/rozsirenia_rss.php" /> -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="search" type="application/opensearchdescription+xml" title="Vyhľadávací modul pre Mozilla.sk" href="https://www.mozilla.sk/wp-content/download/searchplugins/mozillask_search.xml" />
	<link rel="icon" href="/favicon.png" type="image/png" />

	<?php wp_get_archives('type=monthly&format=link'); ?>

	<?php wp_head(); ?>
</head>
<body>

<div id="page">
<div id="header">
		<h1><a href="<?php echo get_settings('home'); ?>" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h1>
		<div class="description"><?php bloginfo('description'); ?></div>
		
		   <ul id="primary">
             <li class="koniec"><a href="https://forum.mozilla.sk" title="Fórum Mozilla.sk">Fórum</a></li>
             <li class="stred"><a href="/sitemap/" title="Mapa servera">Mapa portálu</a></li>
             <li class="stred"><a href="/kontakt/" title="Kontakt">Kontakt</a></li>
             <li><a href="/o-nas/" title="O nás">O nás</a></li>
           </ul>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" id="search">
        <input class="form-text" type="text" size="15" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="keys" />
        <input id="submit" type="image" src="/wp-content/themes/mozillask/images/searcha.png"  />
        </form> 


</div>
<hr />
