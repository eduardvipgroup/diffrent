<?php
require __DIR__ . '/../config/config.php';
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

function uploadImg(){ /////////////ни фига не работает!!!!!!!!
    include LIB_DIR . 'funcImgResize.php';
    include LIB_DIR . 'db.php';

    $big = PUBLIC_DIR . IMG_BIG;
    uploadFile($big, 'file', function ($file) use ($big) {
        $filename = $file['name'];
        img_resize($big . $filename, $big . IMG_SMALL . "{$filename}", 100, 100);
        execute("INSERT INTO img (name, img_name, likes) VALUES ('{$filename}', '{$filename}', 0)");
    });
}