<?php
//константы путей к изображениям
define("IMG_SMALL", "gallery_img/small/");
define("IMG_BIG", "gallery_img/big/");
//Получаем список файлов с изображениями

function getIMG()
{
    //$images = array_splice(scandir(IMG_SMALL), 2);
    //Вывожу изображения
    /*    foreach ($images as $filename) {
            echo "<a  target=\"_blank\" style='display: flex; min-width:30%; max-width:30%; padding: 10px' href='" . IMG_BIG . "{$filename}'>
            <img src='" . IMG_SMALL . "{$filename}' width='100px' height='100px'/></a>";
        }*/

    $db = mysqli_connect('localhost', 'root', '', 'images');
    $result = mysqli_query($db, "SELECT `id`, `img_name` FROM `img`");

    While ($row = mysqli_fetch_assoc($result)){
        echo "<a href='show_image.php?id= {$row['id']}'><img src='".IMG_SMALL."{$row["img_name"]}' width='150'/></a>";
    }
}

/*function getIMGFromDB(){

$img_name = $_FILES['file']['name'];

$db = mysqli_connect('127.0.0.1:3307', 'root', '', 'images')
or die("Не могу соединиться с MySQL.");

$result = mysqli_query($db, "INSERT INTO img VALUES (null, 'img', $img_name, 0)");
    $result = execute("UPDATE `img` SET `likes` = `likes` + 1 WHERE id =" . $id);

var_dump($result);
if ($result == true) {
    echo "ok";
} else {
    echo "problem";
}
$result = mysqli_query($db, "SELECT `id`, `img_name` FROM `img`");
While ($row = mysqli_fetch_assoc($result)) {
    echo "<a href='show_image.php?id= {$row['id']}'><img src='" . IMG_SMALL . "{$row["img_name"]}' width='150'/></a>";
}
mysqli_close($db);
return $row;
}*/

