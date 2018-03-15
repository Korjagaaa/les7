<?php
header('Content-Type: image/png');
$image = imagecreatetruecolor(300,300);
$text_color = imagecolorallocate($image,777,777,777);
$background_color = imagecolorallocate($image, 255,255,255);
imagefill($image,0,0,$background_color);
imagettftext($image,30, 0, 55, 50,$text_color,$font_file,$_POST["name"]);
imagettftext($image,30, 0, 70, 120,$text_color,$font_file,"оценка");
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
imagettftext($image,90, 0, 110, 250,$text_color,$font_file,$score);
imagepng($image);
?>