<?php
session_start();
function create_image()
{
 $md5_hash = md5(rand(0,999));
 $security_code = substr($md5_hash, 15, 5);
 $_SESSION["security_code"] = $security_code;
 $width = 60;
 $height = 20;
 $image = ImageCreate($width, $height);
 $string = ImageColorAllocate($image, 0,0,0);
 $back = ImageColorAllocate($image, 255, 255, 255);
 ImageFill($image, 0, 0, $back);
 ImageString($image, 9, 9, 7, $security_code, $string);
 header("Content-Type: image/png");
 ImageJpeg($image);
 ImageDestroy($image);
}
create_image() ;
exit();
?>