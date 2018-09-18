<?
//require(LIB_DIR . 'funcImgResize.php');
//константы путей к изображениям
define("IMG_SMALL", "gallery_img/small/");
define("IMG_BIG", "gallery_img/big/");
//Получаем список файлов с изображениями
$images = array_splice(scandir("gallery_img/small/"),2);
//$dir = opendir(IMG_BIG);
/*while ($name = readdir()){
    $name = scandir(2);
    var_dump($img);

    foreach ($img as $item){
        var_dump($item);
    }
}*/

//closedir($dir);