	<div id="sidebar">

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

	</div>
