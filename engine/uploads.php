<?php
require __DIR__ . '/../config/config.php';
include LIB_DIR . 'funcImgResize.php';
include LIB_DIR . 'db.php';

define("IMG_SMALL", "gallery_img/small/");
define("IMG_BIG", "gallery_img/big/");

/*function uploadFile($destination, $attribute = 'file', $callback = null){
    if (isset($_FILES[$attribute])){
        $tmp = $_FILES[$attribute]['tmp_name'];
        $filePath = $destination . $_FILES[$attribute]['name'];
        move_uploaded_file($tmp, $filePath);
        if (!is_null($callback)){
            $callback($_FILES[$attribute]['name']); ////почему выделяет красным?
        }
    }
}*/

function uploadImg(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_FILES['file'])) {
            $filename = IMG_BIG . $_FILES['file']['name'];
            $dest = IMG_SMALL . $_FILES['file']['name'];
            img_resize($filename, $dest, 100, 100);
            move_uploaded_file($_FILES['file']['tmp_name'], $filename);
            $result = executeDB("INSERT INTO img (`name`, img_name, likes) VALUES ('{$_FILES['file']['name']}', '{$_FILES['file']['name']}', 0)");
           return $result;

        }            //header("Location: /"); exit;

    }

}
