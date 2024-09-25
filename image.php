<?php
include("header.php");


session_start();


$captcha_code = $_GET["captcha_code"] ;

header('Content-Type: image/png');

$image = imagecreatetruecolor(150, 50);

$background_color = imagecolorallocate($image, 231, 100, 18);

$text_color = imagecolorallocate($image, 255, 255, 255);

imagefilledrectangle($image, 0, 0, 200, 50, $background_color);

$font = dirname(__FILE__) . '/font.ttf';

imagettftext($image, 30, 0, 15, 40, $text_color, $font, $captcha_code);

imagepng($image);

imagedestroy($image);

?>