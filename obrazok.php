<?php
/*
Template Name: Obrazok
*/
?>

<?php
$mozsk_img = urldecode($_GET["mski"]);
$mozsk_title = urldecode($_GET["mskt"]);
?>


<?php get_header(); ?>

	<div id="content" class="widecolumn">

		<div class="post-page">
		<h2 id="post-<?php the_ID(); ?>"><?php echo $mozsk_title ?></h2>
			<div class="entrytext">
<?php 
	echo "<p><img src=\"/wp-content/images/$mozsk_img\" class=\"centered\" alt=\"$mozsk_title\" title=\"$mozsk_title\" /></p>";
?>
<p><a href="javascript:history.go(-1)">&laquo; Naspäť</a></p>
			</div>
		</div>

	</div>

<?php get_footer(); ?>
