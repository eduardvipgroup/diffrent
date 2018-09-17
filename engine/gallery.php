<?
//константы путей к изображениям
define("IMG_SMALL", "gallery_img/small/");
define("IMG_BIG", "gallery_img/big/");
//Получаем список файлов с изображениями
$images = array_splice(scandir(IMG_SMALL),2);
