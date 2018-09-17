<?php
require(__DIR__ . '/../config/config.php');
define("UPLOADS_DIR", "gallery_img/small/");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_FILES['file'])){
        if(!file_exists(UPLOADS_DIR)){
            mkdir(UPLOADS_DIR);
        }
        $filename = UPLOADS_DIR . $_FILES['file']['name'];

        if(file_exists($filename)){
            $path = pathinfo($filename);
            function getCount($path){
                $f=fopen($path['filename'],"a+");
                flock($f,LOCK_EX);
                $count=fread($f,100);
                $count += 1;
                ftruncate($f,0);
                fwrite($f,$count);
                fflush($f);
                flock($f,LOCK_UN);
                fclose($f);
                return $count;
            }

            $filename = UPLOADS_DIR . $path['filename'] . getCount($path) . "." . $path['extension'];

        }
        move_uploaded_file($_FILES['file']['tmp_name'], $filename );
    }
}

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

    <?php
    //Вывожу изображения
    foreach($images as $filename)
        echo "<a  target=\"_blank\" style='display: flex; min-width:30%; max-width:30%; height: auto; padding: 10px' href='".IMG_BIG."{$filename}'>
	<img src='".IMG_SMALL."{$filename}' width='100%' height='100%'/></a>";
    ?>
    <form style='margin: 20px auto' action="" enctype="multipart/form-data" method="post">
        <input type="file" name = 'file'>
        <input type="submit">
    </form>
</div>
</body>
