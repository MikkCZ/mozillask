<?php
//Thumbnailer script by a2z
//set the default dimensions that you want the image to be resized to
if (!isset($_GET['s'])){
$max = 150;
} else {
$max = $_GET['s'];
};
//Check if the variables are set
if (!isset($_GET['f'])){
?> <hr />
<h2>You Must Set a File</h2>
thumb.php?f=FILENAMEHERE.png sets a file.
<hr />
<br />
<br />
<h2>Php Error:</h2>
<?php
break;
break;
};
//retrieving file data
$filename = $_GET['f'];
//find image type
$namelength = strlen($filename);
$namelength = $namelength - 3;
if(strpos($filename, jpg) == $namelength){
$filetype = "jpg";
} else if(strpos($filename, png) == $namelength){
$filetype = "png";
} else if(strpos($filename, gif) == $namelength){
$filetype = "gif";
} else {
?> <hr />
<h2>The File You Selected (<?php print"$filename"; ?>) Isnt A Valid Type</h2>
It must be a gif, png or jpg.
<hr />
<br />
<br />
<h2>Php Error:</h2>
<?php
break;
};
//Check that the file actually exists
if ( !file_exists($filename) ) {
?> <hr />
<h2>The File You Selected (<?php print"$filename"; ?>) Doesnt Exist</h2>
As default it should be in the same directory as the thumbnailing file.
<hr />
<br />
<br />
<h2>Php Error:</h2>
<?php
break;
};
//setting sending as a png to the browser
header('Content-type: image/png');
//setting size values
list($width, $height) = getimagesize($filename);
if($width <= $max && $height <= $max){
$realwidth = $width;
$realheight = $height;
} else {
if($width >= $height){
$oldmax = $width;
} else if ($height > $width){
$oldmax = $height;
};
$decimal = $max / $oldmax;
$realwidth = $width * $decimal;
$realheight = $height * $decimal;
};
//creating thumbnail image
$thumb = imagecreatetruecolor($realwidth, $realheight);
//setting border color (the numbers are values from 0-255 in the order r, g ,b)
$color = imagecolorallocate($thumb, 0, 0, 200);
//detecting type of source file
if ( $filetype == "png") {
$source = imagecreatefrompng($filename);
} else if ( $filetype == "jpg") {
$source = imagecreatefromjpeg($filename);
} else if ( $filetype == "gif") {
$source = imagecreatefromgif($filename);
} else {
print"Error!";
break;
};
// resizing here
imagecopyresized($thumb, $source, 0, 0, 0, 0, $realwidth, $realheight, $width, $height); 
//drawing border
$widthm1 = $realwidth - 1;
$heightm1 = $realheight - 1;
imageline( $thumb, 0,0, $widthm1, 0, $color);
imageline( $thumb, $widthm1, 0, $widthm1, $heightm1, $color);
imageline( $thumb, $widthm1, $heightm1, 0, $heightm1, $color);
imageline( $thumb, 0, $heightm1, 0, 0, $color);
//rendering new image
imagepng($thumb);
//destroying old data
imagedestroy($thumb);
?> 