<?php


class SertificatGD
{
    public function generaitt($text,$text2)
    {
    $im = imagecreatetruecolor(1110,800);
    $bColor = imagecolorallocate($im,255,224,221);
    $tColor = imagecolorallocate($im,129,15,90);
    $frontFile ='../Tester/src/GreatVibes-Regular.otf';
    $imBox = imagecreatefrompng('../Tester/src/1.png');
    imagefill($im,0,0,$bColor);
    imagecopy($im,$imBox, 10,0,0,0,1280,1024);
    imagettftext($im,30,0,30,130,$tColor,$frontFile,$text);

    imagettftext($im,30,0,700,130,$tColor,$frontFile,$text2);

    header('Content-Type: image/png');
    imagepng($im);
    imagedestroy($im);
    }
}