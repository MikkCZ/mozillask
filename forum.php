<?php

if (file_exists('/home/epicnet/mozilla.sk/forum/config.php'))

{
	include('/home/epicnet/mozilla.sk/forum/config.php');

	if ($conn=MySQL_Connect ($dbhost,$dbuser,$dbpasswd)) {
		mysql_select_db ($dbname,$conn);
		$result=MySQL_Query("SELECT SUM(forum_posts) AS post_total
				FROM {$table_prefix}forums",$conn);

		$pocet=MySQL_Result($result,0,'post_total');
		echo '<small class="black">Počet príspevkov: <strong>'.$pocet.'</strong>. Pridajte sa aj vy!</small>';

		MySQL_Close($conn); // ukončenie spojenia
	}
	else echo "Nepodarilo sa nadviazať spojenie s databázou.";
	
}

else ?>
		<p>Počet príspevkov: <strong>xxx</strong><br/>
		<span class="alignright tucne"><a href="https://forum.mozilla.sk">Pridajte sa aj vy! &raquo;</a></span></p>

