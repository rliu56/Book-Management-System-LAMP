<?php
session_start();
srand((double)microtime()*1000000);
while(($authn=rand()%10000)<1000);// generate a 4 digits verification code
$_SESSION['auth']=$authn;

// generate a pic
Header("Content-type: image/PNG");
$img = imagecreate(55,18);
$bg = ImageColorAllocate($img, 255,0,0);
$white = ImageColorAllocate($img, 180,180,100);
$gray = ImageColorAllocate($img, 240,240,240);
$black = ImageColorAllocate($img, 100,100,50);

imagefill($img,60,20,$gray);

// put the verificaiton code into the pic
for ($i = 0; $i < strlen($authn); $i++)
{
    $i%2 == 0?$top = -1:$top = 3;
    imagestring($img, 6, 13*$i+4, 1, substr($authn,$i,1), $white);
}

for($i=0;$i<100;$i++)   // add interference pixel
{
    imagesetpixel($img, rand()%70 , rand()%30 , $black);
}

ImagePNG($img);
ImageDestroy($img);
?>
