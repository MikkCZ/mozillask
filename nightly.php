<?php
/*
Template Name: Nightly
*/
?>


<?php get_header(); ?>

<?php get_sidebar(); ?>

<div class="entrytext">

	<div id="content" class="narrowcolumn">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="post-page">
	<h2 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>

<?php
        the_content('<p class="serif">Čítajte zvyšok článku &raquo;</p>'); 
        // make sure curl is installed
        if (function_exists('curl_init')) {
        // initialize a new curl resource
        $ch = curl_init();
       // set the url to fetch
        if (is_page('vetva30')) $adresa = 'http://tinderbox.mozilla.org/Mozilla-l10n-sk/panel.html'; else $adresa = 'http://tinderbox.mozilla.org/Mozilla1.8-l10n-sk/panel.html'; 
       curl_setopt($ch, CURLOPT_URL, $adresa);

   // don't give me the headers just the content
   curl_setopt($ch, CURLOPT_HEADER, 0);

   // return the value instead of printing the response to browser
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

   // use a user agent to mimic a browser
   curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.0; sk; rv:1.9pre) Gecko/2008041005 Minefield/3.0pre');

   $obsah = curl_exec($ch);
   
   // remember to always close the session and free all resources
   curl_close($ch);
}

          $obsah = substr($obsah,strpos($obsah,'<tr><td'),strlen($obsah));

          if( eregi("<td(.*)</td>", $obsah, $rawitems ) ) {

           $items = explode("<td", $rawitems[0]);

           echo '<br /><table align="center" width="100%" class="tabulka">';
           echo '<thead><tr><th colspan="12">Stav prekladov</th></tr></thead>';

             $stav = array('FFFFFF','FFFFFF','FFFFFF','FFFFFF','FFFFFF','FFFFFF','FFFFFF','FFFFFF','FFFFFF');
             for( $i = 0; $i < count($items); $i++ ) {
              eregi("bgcolor='(.*)'>",$items[$i], $farba);
              if (strpos($items[$i],'Fx')) {
                      if (strpos($items[$i],'WIN')) $stav[0]=$farba[1];
                      elseif (strpos($items[$i],'Lin')) $stav[1]=$farba[1];
                      elseif (strpos($items[$i],'Mac')) $stav[2]=$farba[1];
                      }
               elseif (strpos($items[$i],'Tb')) {
                      if (strpos($items[$i],'WIN')) $stav[3]=$farba[1];
                      elseif (strpos($items[$i],'Lin')) $stav[4]=$farba[1];
                      elseif (strpos($items[$i],'Mac')) $stav[5]=$farba[1];
                      }
               elseif (strpos($items[$i],'Sb')) {
                      if (strpos($items[$i],'WIN')) $stav[6]=$farba[1];
                      elseif (strpos($items[$i],'Lin')) $stav[7]=$farba[1];
                      elseif (strpos($items[$i],'Mac')) $stav[8]=$farba[1];
                      }
               elseif (strpos($items[$i],'Sb')) {
                      if (strpos($items[$i],'WIN')) $stav[6]=$farba[1];
                      elseif (strpos($items[$i],'Lin')) $stav[7]=$farba[1];
                      elseif (strpos($items[$i],'Mac')) $stav[8]=$farba[1];
                      }
               elseif (strpos($items[$i],'sea')) {
                      if (strpos($items[$i],'WIN')) $stav[9]=$farba[1];
                      elseif (strpos($items[$i],'Lin')) $stav[10]=$farba[1];
                      elseif (strpos($items[$i],'Mac')) $stav[11]=$farba[1];
                      }
               elseif (strpos($items[$i],'Univ')) {
                      $stav[11]=$farba[1];
                      }
              }
           echo '<tr><td colspan="3" class="center tucne" style="height: 30px;"><img src="/wp-content/images/logo/ff_small.png" alt="Firefox" /> Firefox</td><td colspan="3" class="center tucne"><img src="/wp-content/images/logo/tb_small.png" alt="Thunderbird" /> Thunderbird</td><td colspan="3" class="center tucne"><img src="/wp-content/images/logo/sn_small.png" alt="Sunbird" /> Sunbird</td>';
           if (is_page('vetva30')) echo '<td colspan="3" class="center tucne"><img src="/wp-content/images/logo/sm_small.png" alt="SeaMonkey" /> SeaMonkey</td>';
           echo '</tr>';
           echo '<tr><td style="height: 25px;"><img class="centered" src="/wp-content/images/logo/win_small.png" alt="Win" title="Windows" /></td><td><img class="centered" src="/wp-content/images/logo/lin_small.png" alt="Lin" title="Linux" /></td><td><img class="centered" src="/wp-content/images/logo/mac_small.png" alt="MAC" title="Mac OS" /></td>
                 <td><img class="centered" src="/wp-content/images/logo/win_small.png" alt="Win" title="Windows" /></td><td><img class="centered" src="/wp-content/images/logo/lin_small.png" alt="Lin" title="Linux" /></td><td><img class="centered" src="/wp-content/images/logo/mac_small.png" alt="MAC" title="Mac OS" /></td>
                 <td><img class="centered" src="/wp-content/images/logo/win_small.png" alt="Win" title="Windows" /></td><td><img class="centered" src="/wp-content/images/logo/lin_small.png" alt="Lin" title="Linux" /></td><td><img class="centered" src="/wp-content/images/logo/mac_small.png" alt="MAC" title="Mac OS" /></td>';
          if (is_page('vetva30')) echo '<td><img class="centered" src="/wp-content/images/logo/win_small.png" alt="Win" title="Windows" /></td><td><img class="centered" src="/wp-content/images/logo/lin_small.png" alt="Lin" title="Linux" /></td><td><img class="centered" src="/wp-content/images/logo/mac_small.png" alt="MAC" title="Mac OS" /></td>';
          echo '</tr><tr>';
          for ( $i = 0; $i < count($stav); $i++ ) {
             /*echo '<td bgcolor="#'.$stav[$i].'">&nbsp;</td>';*/
             echo '<td style="height: 25px;">';
             if ($stav[$i]=='11DD11') echo '<img class="centered" src="/wp-content/themes/mozillask/images/good.png" alt="OK" title="Lokalizácia je kompletná" />';
             else if ($stav[$i]=='FFAA00') echo '<img class="centered" src="/wp-content/themes/mozillask/images/warning.png" alt="Warning" title="Lokalizácia nie je kompletná" />';
             else if ($stav[$i]=='EE0000') echo '<img class="centered" src="/wp-content/themes/mozillask/images/error.png" alt="Error" title="Lokalizovaná verzia neprešla testom" />';
             else echo '<img class="centered" src="/wp-content/themes/mozillask/images/exclude.png" alt="Nezname" title="Stav sa nepodarilo zistiť" />';
             echo '</td>';
            }
           echo '</tr></table>';
           ?>

 
            <br/>
             <img src="/wp-content/themes/mozillask/images/good.png" alt="OK" title="Lokalizácia je kompletná, môžete sťahovať" /> - Lokalizácia je kompletná<br/>
             <img src="/wp-content/themes/mozillask/images/warning.png" alt="Warning" title="Lokalizácia nie je kompletná" /> - Chýbajú niektoré reťazce, produkt nemusí pracovať správne<br/>
             <img src="/wp-content/themes/mozillask/images/error.png" alt="Error" title="Lokalizovaná verzia neprešla testom" /> - Produkt neprešiel testami, nesťahujte !<br/>
             <img src="/wp-content/themes/mozillask/images/exclude.png" alt="Nezname" title="Stav sa nepodarilo zistiť" /> - Stav lokalizácie sa nepodarilo zistiť<br/>
           <?php       
        }

				wp_link_pages("before=<p><strong>Čítajte ďalšie stránky tohto článku: </strong>&after=</p>&next_or_number=number&pagelink= % "); ?>
	
			</div>
  <?php endwhile; endif; ?>
		</div>
	<?php edit_post_link('Upraviť tento článok', '<p class="center">', '</p>'); ?>


	</div>

<?php get_footer(); ?> 
