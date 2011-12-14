<?php

// where the camera image lives
$url = "http://www.appnetjobs.com/hcwc/beechparkway/2400.jpg?cache=no";

// where the offline image lives
$url_fail = "http://highcountrywebcams.com/assets/offline640x480.jpg";

// check to see if the image exists by trying to open it for read only
if (@fopen($url, "r")){
    $img = $url;
} else {
    $img = $url_fail;
} 

// prepare the images
$dest = imagecreatefromjpeg($img);
$src = imagecreatefrompng('overlay.png');

// copy
imagecopy($dest, $src, 0, 0, 0, 0, 640, 480);

// output and free from memory
header('Content-Type: image/jpeg');
imagejpeg($dest);
imagedestroy($dest);
imagedestroy($src);

?>
