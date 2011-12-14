<?php
function loadJpeg($imgname){
    
    // attempt to open the file
    $im = @imagecreatefromjpeg($imgname);

    // see if it failed
	$i=0;
	while (!$im){
		sleep(1);
		$im = @imagecreatefromjpeg($imgname);
        $i++;

        // stop the while loop after 15 tries
		if ($i>15){
			break;
		}
    }

    // open the camera is offline image instead
	if (!$im){
		$im = @imagecreatefromjpeg('../assets/offline640x480.jpg');
    }

    // return the correct camera image or the offline image
    return $im;
}

$img = loadJpeg('http://www.appnetjobs.com/hcwc/beechparkway/2400.jpg?cache=no');

// create image instances
$dest = imagecreatefromjpeg('http://www.appnetjobs.com/hcwc/beechparkway/2400.jpg?cache=no');
$src = imagecreatefrompng('overlay.png');

// copy
imagecopy($dest, $src, 0, 0, 0, 0, 640, 480);

// output and free from memory
header('Content-Type: image/jpeg');
imagejpeg($dest);

imagedestroy($dest);
imagedestroy($src);


?>
