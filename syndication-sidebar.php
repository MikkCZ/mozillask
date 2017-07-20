<?php


/**
*/
define('IN_PHPBB', true);
$phpbb_root_path = '/forum/';
$phpbb_prefix = 'mozbb3_'; 
//require($phpbb_root_path . 'config.php');
$phpEx = substr(strrchr(__FILE__, '.'), 1);
//$db			= new $sql_db();
// Connect to DB
//$db->sql_connect($dbhost, $dbuser, $dbpasswd, $dbname, $dbport, false, defined('PHPBB_DB_NEW_LINK') ? PHPBB_DB_NEW_LINK : false);

// We do not need this any longer, unset for safety purposes
//unset($dbpasswd); 

//include($phpbb_root_path . 'common.' . $phpEx);

// Start session management
//$user->session_begin();
//$auth->acl($user->data);
//$user->setup();

// Begin configuration
//$CFG['exclude_forums']    = '';
//$CFG['max_topics']       = '5';
// End configuration

// requests
//$fid    = request_var('fid', '');
//$count    = request_var('count', 0);
//$chars    = request_var('chars', 200);
//$type    = request_var('type', '');
//$topics_only = request_var('t', '');

// If not set, set the output count to max_topics
//$count = ( $count == 0 ) ? $CFG['max_topics'] : $count;

// maximum text char limit
//if($chars<0 || $chars>500) $chars=500; //Maximum

// generate url
//$board_url = generate_board_url();
$index_url = $board_url . '/index.' . $phpEx;
$viewtopic_url = $board_url . '/viewtopic.' . $phpEx;


// below three function barroved on "Full Syndication Suite 0.9.4a"

/**
* create a date according to RFC 3339 or 822
*/
function format_date($timestamp)
{
      // RFC 822 for RSS2
//      setlocale(LC_CTYPE, 'sk_SK');
//      setLocale(LC_TIME, 'sk_SK');
$dni = array( 'ne', 'po', 'ut', 'st', 'št', 'pi', 'so');
      return $dni[date("w",$timestamp)].', '.date("d.m.Y H:i",$timestamp);
//        return date("d, d.m.Y H:i",$timestamp);
}



$sql_where = '';

   $sql_from = 'FROM ' . $phpbb_prefix. 'posts as p, ' . $phpbb_prefix . 'forums as f, ' . $phpbb_prefix . 'users as u, ' . $phpbb_prefix . 'topics as t';

// Exclude forums
if ($CFG['exclude_forums'])
{
   $exclude_forums = explode(',', $CFG['exclude_forums']);
   foreach ($exclude_forums as $i => $id)
   {
      if ($id > 0)
      {
         $sql_where .= ' AND p.forum_id != ' . trim($id);
      }
   }
}

// SQL posts table
//$sql = 'SELECT p.post_id, p.poster_id, p.topic_id, t.topic_title, t.topic_id, t.topic_last_post_time, u.username
//      ' . $sql_from . '
//      WHERE (u.user_id = p.poster_id)
//      AND p.post_approved = 1
//      AND p.topic_id = t.topic_id
//      AND p.topic_id = t.topic_id
 //     ' . $sql_where . '
 //     ORDER BY t.topic_last_post_time DESC LIMIT 4';
 
 $sql = "SELECT t.topic_id, t.topic_last_post_time, t.topic_last_poster_name, t.topic_title, t.topic_last_post_id, t.topic_replies_real
						FROM mozbb3_topics as t
        ORDER BY t.topic_last_post_time DESC LIMIT 4";
        
$result = $wpdb->get_results($sql);

if($result)
{
  foreach ($result as $row) 
	{

   echo '<p><a target="_blank" href="'.$phpbb_root_path.'viewtopic.php?t='.$row->topic_id.'&amp;p='.$row->topic_last_post_id.'#p'.$row->topic_last_post_id.'">'.$row->topic_title.'</a><br/><strong>('.$row->topic_replies_real.')</strong> od '.$row->topic_last_poster_name.'<br/>'.format_date($row->topic_last_post_time).'</p>';
}

}

 
//$sql = "SELECT COUNT(post_id) FROM ' . $phpbb_prefix . 'posts";
$pocet = $wpdb->get_var('SELECT COUNT(post_id) FROM '.$phpbb_prefix.'posts');
if ($pocet) echo '<p>Počet&nbsp;príspevkov:&nbsp;<b>'.$pocet.'</b></p>';

?>
