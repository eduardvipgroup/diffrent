<?php
header("Content-type: text/html; charset=UTF-8");
require(__DIR__ . '/../config/config.php');
require(LIB_DIR . 'funcImgResize.php');
include LIB_DIR . 'gallery.php';
include LIB_DIR . 'db.php';

define("UPLOADS_DIR", "gallery_img/big/");
define("UPLOADS_SMALL", "gallery_img/small/");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['file'])) {

        $filename = UPLOADS_DIR . $_FILES['file']['name'];
        $dest = UPLOADS_SMALL . $_FILES['file']['name'];
        img_resize($filename, $dest, 100, 100);
        move_uploaded_file($_FILES['file']['tmp_name'], $filename);
        $result = executeDB("INSERT INTO img (`name`, img_name, likes) VALUES ('{$_FILES['file']['name']}', '{$_FILES['file']['name']}', 0)");
        //var_dump($result);
        if ($result == true) {
            echo "ok";
        } else {
            echo "problem";
        }
    }
}
//header("Location: index.php"); exit;

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>галерея</title>
</head>
<body>
<div style='display: flex; justify-content: space-around; flex-wrap: wrap; max-width: 40%; margin: auto'>
    <? getIMG() ?>
    <?/* $images = array_splice(scandir(IMG_SMALL), 2); */?><!--
    <?php /*foreach ($images as $filename):*/?>
        <a  target="_blank" style='display: flex; min-width:30%; max-width:30%; padding: 10px' href="<?/*='. UPLOADS_DIR . $filename'*/?>">
            <img src="<?/*='. UPLOADS_SMALL . $filename'*/?>" width='100px' height='100px'/></a>
    --><?php /*endforeach;*/?>
</div>
<form style='display: flex; justify-content:center; margin: 20px auto' action="" enctype="multipart/form-data"
      method="post">
    <input type="file" name='file'>
    <input type="submit">
</form>
</body>


