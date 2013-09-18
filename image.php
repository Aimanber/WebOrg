<?php

session_start();
$img = ImageCreateFromPng('images/img.png');
$color = ImageColorAllocate($img,0xfff,0x000,0x000);
$rand=rand(11111,99999);
ImageTTFText($img,24,0,30,30,$color,'LucidaTypewriterBold.ttf',$rand);
header('Content-Type: image/png');
Imagepng($img);
$_SESSION["control"]=$rand;
?>