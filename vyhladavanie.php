<?php

if (isset($HTTP_GET_VARS['hladat'])) ? $hladat=$HTTP_GET_VARS['hladat'] : $hladat='';


echo '<div class="post-page">

	<h3 class="archive">Vyhľadávanie rozšírení podľa názvu<br/><small>hľadaný výraz: <strong>'<?php echo wp_specialchars($hladat); ?>'</strong></small></h3>

		<div class="entrytext">';

		echo '<div class="post-top">
				<div class="post-bottom">
				<div class="post">';
?>
 			<form action="" method="get" id="vyhladavanie_rozsireni">
				<input class="form-text" type="text" size="15" value="<?php echo wp_specialchars($hladat, 1); ?>" name="hladat" id="hladat" />
				<input id="submit" type="image" src="/wp-content/themes/mozillask/searcha.png"  /><br/>
			</form> 

        </div></div></div>  
          
<?php          
          
/*
          <input id="popis" name="popis" type="checkbox" value="1"<?php if(($popis==1) || ($first_run==0)) echo ('checked="checked" '); ?> /> <label for="popis"><small>Zobrazovať popis rozšírenia</small></label>
*/
$rozsirenia = $wpdb->get_results("SELECT MAX(id) AS id, nazov FROM mozsk_rozsirenia
										WHERE publikovat=1 AND nazov LIKE '%$hladat%' GROUP BY nazov ORDER BY nazov ASC");


	if($rozsirenia)
	{
		echo '<dl>';
		foreach ($rozsirenia as $rozsirenie) 
		{
		$roz = $wpdb->get_row("SELECT urlid, nazov, urcene_ff_od, urcene_tb_od, urcene_ms_od, urcene_nv_od, urcene_sb_od, urcene_sm_od, urcene_ns_od, urcene_fl_od, popis, verzia FROM mozsk_rozsirenia, mozsk_roz_meta WHERE mozsk_rozsirenia.id=$rozsirenie->id AND nazov='$rozsirenie->nazov' AND mozsk_rozsirenia.kategoria=mozsk_roz_meta.id");

		echo '<dt style="float:left">';
		echo '<a href="'.$folder.$roz->urlid.'/">'.$roz->nazov.' <small>v'.$roz->verzia.'</small></a>&nbsp;';
		echo '</dt>';
		echo '<dt style="float:right">';
		if ($roz->urcene_ff_od!='') echo '&nbsp;<img alt="Firefox" src="/wp-content/images/logo/ff_small.png" />';
		if ($roz->urcene_tb_od!='') echo '&nbsp;<img alt="Thunderbird" src="/wp-content/images/logo/tb_small.png" />';
		if ($roz->urcene_ms_od!='') echo '&nbsp;<img alt="Mozilla Suite" src="/wp-content/images/logo/ms_small.png" />';
		if ($roz->urcene_nv_od!='') echo '&nbsp;<img alt="NVU" src="/wp-content/images/logo/nvu_small.png" />';
		if ($roz->urcene_sb_od!='') echo '&nbsp;<img alt="Sunbird" src="/wp-content/images/logo/sn_small.png" />';
		if ($roz->urcene_sm_od!='') echo '&nbsp;<img alt="SeaMonkey" src="/wp-content/images/logo/sm_small.png" />';
		if ($roz->urcene_ns_od!='') echo '&nbsp;<img alt="Netscape" src="/wp-content/images/logo/ns_small.png" />';
		if ($roz->urcene_fl_od!='') echo '&nbsp;<img alt="Flock" src="/wp-content/images/logo/fl_small.png" />';
		echo'</dt>';

		echo '<dd style="clear: both;">';
		echo formattext($roz->popis,$roz->urlid);
		echo '</dd>';

		}
		echo '</dl>';
	}
	else
	{
		echo '<div class="error">Nebolo nájdené žiadne rozšírenie.</div>';
	}
?>

</div></div>