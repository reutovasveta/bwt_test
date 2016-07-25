<?php
session_start();
class Captcha{
    
    public function generateCaptcha(){  
 $_SESSION["captcha"]='';
$width = 150;               //Ширина изображения
 $height = 50;               //Высота изображения
 $font_size = 16;            //Размер шрифта
 $let_amount = 5;            //Количество символов, которые нужно набрать
 $fon_let_amount = 30;       //Количество символов на фоне
 $font = "../fonts/verdana.ttf";   //Путь к шрифту
 
//набор символов
  $letters = array('a','b','c','d','e','f','g','h','j','k','m','n','p','q','r','s','t','u','v','w','x','y','z','2','3','4','5','6','7','9');
 //цвета
  $colors = array('10','30','50','70','90','110','130','150','170','190','210');

 
    $src = imagecreatetruecolor($width,$height);    //создаем изображение              
    $fon = imagecolorallocate($src,255,255,255);    //создаем фон
    imagefill($src,0,0,$fon);                       //заливаем изображение фоном


    for($i=0;$i < $let_amount;$i++)      //то же самое для основных букв
    {
        $color = imagecolorallocatealpha($src,$colors[rand(0,sizeof($colors)-1)],
        $colors[rand(0,sizeof($colors)-1)],
        $colors[rand(0,sizeof($colors)-1)],rand(20,40));
        $letter = $letters[rand(0,sizeof($letters)-1)];
        $size = rand($font_size*2-2,$font_size*2+2);
        $x = $i*20 + rand(3,7);      //даем каждому символу случайное смещение
        $y = (($height*2)/3) + rand(0,5);                           
        $cod[] = $letter;                        //запоминаем код
        imagettftext($src,$size,rand(0,15),$x,$y,$color,$font,$letter);
    }

    $_SESSION["captcha"] = implode('',$cod);               //переводим код в строку

    header ("Content-type: image/gif");         //выводим готовую картинку
    imagegif($src);
 }

}
$captcha_echo = new Captcha();
$captcha_echo->generateCaptcha();