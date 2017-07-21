	<div id="sidebar">

		<div id="pagenav-top"><div id="pagenav-bottom">
			<?php wp_nav_menu( array( 'theme_location' => 'sidebar', 'container_id' => 'page-nav' ) ); ?>
		</div></div>

		<?php if (is_page('test')) {?>

		<div id="vyhladavanie"><h3>Vyhľadávanie rozšírení</h3>

			<form action="/rozsirenia/vyhladavanie/" method="post" id="vyhladavanie_form">
				<input class="form-text" type="text" size="15" value="<?php echo wp_specialchars($hladat, 1); ?>" name="hladat" id="keys_vyh" />
				<input id="submit_vyh" type="image" src="/wp-content/themes/mozillask/images/searcha.png"  /><br/>
				<input type="hidden" value="1" name="popis" />
				<input type="hidden" value="1" name="first_run" />
				<input type="hidden" value="1" name="hl_popis" />
			</form> 
		
		</div>

		<?php } ?>

		<?php
			if ( is_active_sidebar( 'left_sidebar' ) ) {
				dynamic_sidebar( 'left_sidebar' );
			}
		?>
			
	</div>


<div id="infobar">

<!--<a href="/1606/mozilla-spristupnila-finalnu-verziu-firefoxu-3-6/"><img style="padding-bottom: 10px" src="/wp-content/themes/mozillask/images/fx36_je_tu.png" alt="Vyskúšajte nový Firefox 3.6" title="Vyskúšajte nový Firefox 3.6" /></a>

<div style="text-align: center;"><img src="/wp-content/themes/mozillask/images/<?php /*if (rand(1,2) == 2) echo 'thunderbird'; else echo 'firefox' */?>_snow_globe.png" alt="Vianoce" title="Príjemné prežitie Vianoc a veľa štastia v roku 2010 želá Mozilla.sk" /></div>-->
      <div class="infopanel-top">
			<div class="infopanel-bottom"> 
				<div class="nadpis"><img src="/wp-content/themes/mozillask/images/aktualne-verzie.png" alt="Aktuálne verzie" /><img src="/wp-content/themes/mozillask/images/<?php $agent=$_SERVER["HTTP_USER_AGENT"]; $os='win'; $os_name='Windows'; if (strstr($agent,"Mac")) { $os='mac'; $os_name='Mac OS'; } elseif (strstr($agent,"Linux")) { $os='lin'; $os_name='Linux'; } echo $os ?>_ver.png" alt="system_image" /></div>
				<div class="infopanel verzie">
				<p><img src="/wp-content/images/logo/firefox35/firefox-36.png" alt="Firefox" /> <a href="<?php echo get_newprodukt('firefox','link') ?>" title="Prevziať Firefox <?php echo get_newprodukt('firefox','verzia'); echo ' (pre '.$os_name.')'; ?>">Firefox</a><br/><b><?php echo get_newprodukt('firefox','verzia') ?></b></p>
				<p><img src="/wp-content/images/logo/tb3_36.png" alt="Thunderbird" /> <a href="<?php echo get_newprodukt('thunderbird','link') ?>" title="Prevziať Thunderbird <?php echo get_newprodukt('thunderbird','verzia'); echo ' (pre '.$os_name.')'; ?>">Thunderbird</a><br/><b><?php echo get_newprodukt('thunderbird','verzia') ?></b></p>
				<p><img src="/wp-content/images/logo/lightning-64.png" alt="Lightning" /> <a href="https://addons.mozilla.org/sk/thunderbird/addon/lightning/" title="Prevziať Lightning <?php echo get_newprodukt('lightning','verzia'); echo ' (pre '.$os_name.')'; ?>">Lightning</a><br/><b><?php echo get_newprodukt('lightning','verzia') ?></b></p>
				<p><img src="/wp-content/images/logo/seamonkey34.png" alt="SeaMonkey" /> <a href="<?php echo get_newprodukt('seamonkey','link') ?>" title="Prevziať SeaMonkey <?php echo get_newprodukt('seamonkey','verzia'); echo ' (pre '.$os_name.')'; ?>">SeaMonkey</a><br/><b><?php echo get_newprodukt('seamonkey','verzia') ?></b></p>
				<small class="alignright tucne"><a href="/download/">Ďalšie verzie &raquo;</a></small><br/>
				</div>
			</div>
			</div>

			<?php
				if ( is_active_sidebar( 'right_sidebar' ) ) {
					dynamic_sidebar( 'right_sidebar' );
				}
			?>

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
					<li><a style="text-decoration: none;" title="Fórum (Atom)" href="https://forum.mozilla.sk/app.php/feed">Fórum <small>(Atom)</small></a></li>
					</ul>
				</div>
			</div>
			</div>

	</div>
