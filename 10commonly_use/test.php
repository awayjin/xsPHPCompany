<?php
$image = imagecreatetruecolor(300, 300);
$dark = imagecolorallocate($image, 220, 123, 123);
$white = imagecolorallocate($image, 255, 255, 255);
$red = imagecolorallocate($image, 255, 0, 5);
imagefill($image, 0, 0, $red);

imagerectangle($image, 0, 0, 300, 100, $dark);
imagefilledrectangle($image, 0, 0, 280, 100, $white );

$text = iconv("gb2312", "utf-8",  "hujinweÖÐÎÄÊä³ö");
$font= "simsun.ttc";
imagettftext($image, 10, 0, 10, 40, $dark, $font, $text);

header("Content-type:image/png");
imagepng($image);
imagedestroy($image);
?>
