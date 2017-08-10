<?php

require "vendor/autoload.php";

use  Huy\Calculate;
use  Huy\People;
use  Huy\People1;
use AppArr\Arr;
use AppStr\Str;



$number1 = 1;
$number2 = 2;
$mayTinh = new Calculate();
$people= new People();
$people1= new People1();
echo $people1->getName("Van Huy");
$arr= new Arr();
$arrShow=$arr->strToArr("sdf adfa asdfas");
var_dump($arrShow);
$str=new Str();
echo $strShow=$str->showStr("asdfas adsfasd");
echo $mayTinh->tinhHieu($number1, $number2)."<br>";

echo $people->showYear("22");
echo"ádfs";
