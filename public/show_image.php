<?
$id = (int)$_GET["id"];
define("IMG_SMALL", "gallery_img/small/");
define("IMG_BIG", "gallery_img/big/");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Галерея</title>
</head>
<body>
<?php
require(__DIR__ . '/../config/config.php');
include LIB_DIR . 'db.php';

$result = executeDB("UPDATE `img` SET `likes` = `likes` + 1 WHERE id =" . $id);

$result = executeDB("SELECT `name`, `img_name`, `likes` FROM `img` WHERE id =" . $id);

$row = mysqli_fetch_assoc($result);

echo "<a href='index.php'><img src='" . IMG_BIG . "{$row["img_name"]}' width='800'/></a><br>
<p>{$row["name"]}</p><br><p>Количество просмотров: {$row["likes"]}</p>";

$result = executeDB("SELECT id, img_name, likes FROM img ORDER BY likes DESC");
while ($row = mysqli_fetch_assoc($result)) {
    echo "<div style='display: flex'><p>Название фото:&nbsp;{$row["img_name"]}</p>
          <p> &nbsp;Количество просмотров:&nbsp;{$row["likes"]}</p></div>";
};

?>
</body>
</html>
