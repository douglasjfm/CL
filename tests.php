<?php
depositaImg();
function depositaImg() {
	$im = @imagecreatefromjpeg('originais/'.'JPEG_20161201_212952_-1466003511.jpg');
	
	list($imw,$imh,$t,$attr) = getimagesize('originais/'.'JPEG_20161201_212952_-1466003511.jpg');
	$w = 512;
	$h = 512 * ($imh/$imw);
	
	$im2 = @imagecreatetruecolor($w, $h);
	imagecopyresampled ($im2, $im ,
				0, 0,
				0, 0,
				$w, $h,
				$imw, $imh);
	imagejpeg($im2, 'deposito/'.'JPEG_20161201_212952_-1466003511.jpg',100);
	imagedestroy($im);
	imagedestroy($im2);

        echo "($imw,$imh,$t,$attr)";
}
