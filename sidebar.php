	<div id="sidebar">

		<div id="pagenav-top"><div id="pagenav-bottom">
<div id="page-nav">  
		<ul>
		<?php /*wp_list_pages('depth=2&sort_column=menu_order&title_li=');*/ ?> 
		<li><a href="/zo-sveta-mozilly/" title="Správy zo sveta Mozilly">Zo sveta Mozilly</a></li>
		<li><a href="/produkty/" title="Produkty">Produkty</a>
			<ul>
				<li><a href="/firefox/" title="Mozilla Firefox">Mozilla Firefox</a></li>
				<li><a href="/thunderbird/" title="Mozilla Thunderbird">Mozilla Thunderbird</a></li>
				<li><a href="/mozilla-sunbird/" title="Sunbird">Mozilla Sunbird</a></li>
				<li><a href="/produkty/ostatne/" title="Ďalšie produkty">Ďalšie produkty</a></li>
			</ul>
			</li>	
		<li><a href="/download/" title="Na prevzatie">Na prevzatie</a>
			<ul>
				<li><a href="/download/slovenske-jazykove-baliky/" title="Jazykové balíčky">Jazykové balíky</a></li>
				<li><a href="/download/prenosne/" title="Prenosné verzie (portables)">Prenosné verzie</a></li>
			</ul>
		</li>	
		<li><a href="/doplnky/" title="Doplnky">Doplnky</a>
			<ul>
				<li><a href="/rozsirenia/" title="Rozšírenia">Rozšírenia</a></li>
			</ul>
		</li>	
		<li><a href="/tipy-a-navody/" title="Tipy a návody">Tipy a návody</a></li>
		<li><a href="/download/tapety-a-reklamne-pruzky/" title="Propagácia">Propagácia</a></li>
		</ul>
		</div></div> 
</div>

		<?php if (is_page('test')) {?>

		<div id="vyhladavanie"><h3>Vyhľadávanie rozšírení</h3>

			<form action="/rozsirenia/vyhladavanie/" method="post" id="vyhladavanie_form">
				<input class="form-text" type="text" size="15" value="<?php echo wp_specialchars($hladat, 1); ?>" name="hladat" id="keys_vyh" />
				<input id="submit_vyh" type="image" src="/wp-content/themes/mozillask/searcha.png"  /><br/>
				<input type="hidden" value="1" name="popis" />
				<input type="hidden" value="1" name="first_run" />
				<input type="hidden" value="1" name="hl_popis" />
			</form> 
		
		</div>	

		<?php } ?>
		
		<div id="categnav"><h3>Rubriky</h3>
				<ul>
				<?php list_cats(0, '', 'name', 'asc', '', 1, 0, 1, 1, 1, 1, 0,'','','','','') ?>
				</ul>
		</div>

		<div id="archnav"><h3>Písali sme...</h3>
				<ul>
				<?php (date(n)>6) ? $mesiac = 6 : $mesiac = date(n); wp_get_archives("type=monthly&limit=".$mesiac); ?>
				<li><a href="<?php echo get_year_link('2008'); ?>">Rok 2008</a></li>
				<li><a href="<?php echo get_year_link('2007'); ?>">Rok 2007</a></li>
				<li><a href="<?php echo get_year_link('2006'); ?>">Rok 2006</a></li>
				<li><a href="<?php echo get_year_link('2005'); ?>">Rok 2005</a></li>
				</ul>
		</div>

		<div id="linknav"><h3>Odkazy</h3>
				<ul>
				<?php get_links('-1', '<li>', '</li>', '<br />', FALSE, 'id', TRUE, 
FALSE, -1, TRUE); ?>
				</ul>
		</div>

		<div id="supportnav"><h3>Podporujeme</h3>
		<p class="center"><a href="http://www.skosi.org/" title="Slovak Open Source Initiative"><img src="/wp-content/themes/mozillask/images/skosi.png" alt="SKosi.org" /></a></p>
		<p class="center"><a href="http://www.sospreskoly.org"><img src="http://www.sospreskoly.org/files/propagacia_01_1.png" title="Slobodný a otvorený softvér pre školy" /></a></p></div>
			
	</div>


<?php
 $nah = rand(1, 2);
	if ($nah == 2) $nah = 'thunderbird';
  else $nah = 'firefox';
?>
<div id="infobar">
<a href="/1221/finalny-firefox-35-dostupny-na-prevzatie/"><img style="padding-bottom: 10px" src="/wp-content/themes/mozillask/images/fx35_je_tu.png" alt="Vyskúšajte Firefox 3.5" title="Vyskúšajte Firefox 3.5" /></a>

      <div class="infopanel-top">
			<div class="infopanel-bottom"> 
			<?php if (is_page('download')) {?>
				<div class="nadpis"><img src="/wp-content/themes/mozillask/images/ocakavame.png" alt="Očakávame" /></div>
				<div class="infopanel male">
				<br/>
        <?php include (TEMPLATEPATH.'/ocakavame.php');
				echo '<p class="center tucne">Dátumy sú približné a môžu sa meniť.</p>';
				echo '</div>';
				 } else { ?>
				<div class="nadpis"><img src="/wp-content/themes/mozillask/images/aktualne-verzie.png" alt="Aktuálne verzie" /><img src="/wp-content/themes/mozillask/images/<?php $agent=$_SERVER["HTTP_USER_AGENT"]; $os='win'; $os_name='Windows'; if (strstr($agent,"Mac")) { $os='mac'; $os_name='Mac OS'; } elseif (strstr($agent,"Linux")) { $os='lin'; $os_name='Linux'; } echo $os ?>_ver.png" alt="system_image" /></div>
				<div class="infopanel verzie">
				<p><img src="/wp-content/images/logo/firefox35/firefox-36.png" alt="Firefox" /> <a href="<?php echo get_newprodukt('firefox','link') ?>" title="Prevziať Firefox <?php echo get_newprodukt('firefox','verzia'); echo ' (pre '.$os_name.')'; ?>">Firefox</a><br/><b><?php echo get_newprodukt('firefox','verzia') ?></b></p>
				<p><img src="/wp-content/images/logo/thunderbird32.png" alt="Thunderbird" /> <a href="<?php echo get_newprodukt('thunderbird','link') ?>" title="Prevziať Thunderbird <?php echo get_newprodukt('thunderbird','verzia'); echo ' (pre '.$os_name.')'; ?>">Thunderbird</a><br/><b><?php echo get_newprodukt('thunderbird','verzia') ?></b></p>
				<p><img src="/wp-content/images/logo/sunbird32.png" alt="Sunbird" /> <a href="<?php echo get_newprodukt('mozilla-sunbird','link') ?>" title="Prevziať Sunbird <?php echo get_newprodukt('mozilla-sunbird','verzia'); echo ' (pre '.$os_name.')'; ?>">Sunbird</a><br/><b><?php echo get_newprodukt('mozilla-sunbird','verzia') ?></b></p>
				<small class="alignright tucne"><a href="/download/">Ďalšie verzie &raquo;</a></small><br/>
				</div>
        <?php } ?>
			</div>
			</div> 

			<div class="infopanel-top">
			<div class="infopanel-bottom">
				<div class="nadpis"><a href="http://forum.mozilla.sk"><img src="/wp-content/themes/mozillask/images/forum-mozilla-sk.png" alt="Fórum Mozilla.sk" /></a></div>
				<div class="infopanel male">
				<?php include (TEMPLATEPATH.'/syndication-sidebar.php'); ?>
<p><span class="alignright tucne"><a href="http://forum.mozilla.sk" target="_blank">Pridajte sa aj vy! &raquo;</a></span></p><br/>
				</div>
			</div>
			</div>

			<div class="infopanel-top">
			<div class="infopanel-bottom">
			<?php if (is_page('test')) {?>
				<div class="nadpis"><img src="/wp-content/themes/mozillask/images/pripravovane-rozsirenia.png" alt="Pripravované rozšírenia" /></div>
				<div class="infopanel" style="text-align: left">
		
				
				
				<?php $rozsirenia = $wpdb->get_results("SELECT nazov, addon FROM mozsk_rozsirenia
										WHERE publikovat=0 OR publikovat=2 GROUP BY nazov ORDER BY nazov ASC"); 
						if($rozsirenia) {
						    echo '<ul>';			
							foreach ($rozsirenia as $rozsirenie) 
								{
									echo '<li>';
									if ($rozsirenie->addon != '' ) echo '<a style="text-decoration: none" href="https://addons.mozilla.org/extensions/moreinfo.php?id='.$rozsirenie->addon.'">'.$rozsirenie->nazov.'</a>';
										else echo $rozsirenie->nazov;
									echo '</li>';
								}
							echo '</ul>';	
						}
						else echo '<p>Momentálne nepripravujeme žiadne nové lokalizácie rozšírení, ak chcete nejaké preložiť vy, ozvite na nám.</p>';
				 } else { ?>
				<div class="nadpis"><img src="/wp-content/themes/mozillask/images/napisali.png" alt="Napísali o Mozille" /></div>
				<div class="infopanel male">
									
				<?php get_napisali(3,1); ?>
				<br/><span class="alignright tucne"><a href="/napisali/">Ďalšie články &raquo;</a></span><br/>
				<?php } ?>
				</div>
			</div>
			</div>

			<div class="infopanel-top">
			<div class="infopanel-bottom">
				<div class="nadpis"><img src="/wp-content/themes/mozillask/images/kanaly-rss.png" alt="Kanály RSS" style="padding-right: 10px;"/></div>
				<div class="infopanel">
					<ul style="padding-left: 9px;padding-top: 9px;">
					<li><a style="text-decoration: none;" title="Články (RSS 2.0)" href="<?php bloginfo('rss2_url'); ?>" >Články <small>(RSS 2.0)</small></a></li>
					<li><a style="text-decoration: none;" title="Články (Atom 0.3)" href="<?php bloginfo('atom_url'); ?>" >Články <small>(Atom 0.3)</small></a></li>
					<li><a style="text-decoration: none;" title="Komentáre (RSS 2.0)" href="<?php bloginfo('comments_rss2_url'); ?>" >Komentáre <small>(RSS 2.0)</small></a></li>
					<li><a style="text-decoration: none;" title="Rozšírenia (RSS 2.0)" href="http://www.mozilla.sk/rozsirenia_rss.php" >Rozšírenia <small>(RSS 2.0)</small></a></li>
					<li><a style="text-decoration: none;" title="Fórum (RSS 2.0)" href="http://forum.mozilla.sk/syndication.php" >Fórum <small>(RSS 2.0)</small></a></li>
					<li><a style="text-decoration: none;" title="Fórum (Atom 0.3)" href="http://forum.mozilla.sk/syndication.php?atom" >Fórum <small>(Atom 0.3)</small></a></li>
					</ul>
				</div>
			</div>
			</div>

	</div>
