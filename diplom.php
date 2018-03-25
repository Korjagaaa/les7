<?php
header('Content-Type: image/png');
$image = imagecreatetruecolor(400,400);
$fontFile = 'fonts/OpenSans.ttf';
$textColor = imagecolorallocate($image,255,0,0);
$backgroundColor = imagecolorallocate($image,255,255,255);
imagefill($image,0,0,$backgroundColor);
imagettftext($image,20, 0, 20, 50,$textColor,$fontFile,$_POST["name"]);
imagettftext($image,20, 0, 20, 120,$textColor,$fontFile,"оценка");
unset($_POST["name"]);
$score = 0;
foreach ($_POST as $item) {
    $score += preg_replace('~[^0-9]+~','',$item);;
}
$score = $score/count($_POST)*100;
if ($score < 50){
    $score = 2;
}
elseif ($score < 70){
    $score = 3;
}
elseif ($score < 80 ){
    $score = 4;
}
elseif ($score <= 100){
    $score=5;
}
imagettftext($image,90, 0, 110, 250,$textColor,$fontFile,$score);
imagepng($image);
?>