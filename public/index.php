<?php
require(__DIR__ . '/../config/config.php');
include LIB_DIR . 'gallery.php';
include LIB_DIR . 'uploads.php';
include LIB_DIR . 'calc.php';
uploadImg();

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styles.css" type="text/css">

    <title>6 урок </title>
</head>
<body>
<form style='display: flex; justify-content:center; margin: 20px auto' action="" enctype="multipart/form-data"
      method="post">
    <input type="file" name='file'>
    <input type="submit">
</form>

<!--<div style='display: flex; justify-content: space-around; flex-wrap: wrap; max-width: 40%; margin: auto'>
    <?/* getIMG() */?>
</div>
--><br>
<form action="" method="get" style="display: flex; justify-content: center; margin: 20px auto">
    <label for="first"><input type="number" name="first">
        <select name="operation" id="">
            <option value="1">+</option>
            <option value="2">-</option>
            <option value="3">/</option>
            <option value="4">*</option>
        </select>
        <input type="number" name="second"></label>
    <button type="submit" name="send">Результат</button>
    <div style="color: blue; border: 1px solid #444444; padding: 0 5px 0 5px; width: auto; text-align: center">
        <?= simpleCalc() ?>
    </div>
</form>
<br>
<form action="" method="post" style="display: flex; justify-content: center;margin: 20px auto">
    <div style="display: flex; width: 350px">
        <input type="number" name="first" placeholder="Введите число 1">
        <input type="number" name="second" placeholder="Введите число 2"></div>
    <div style="display: flex; width: 300px">
        <input type="submit" name="sum" value="сложить">
        <input type="submit" name="ded" value="вычесть">
        <input type="submit" name="div" value="делить">
        <input type="submit" name="mul" value="умножить"></div>
    <div style="color: blue; border: 1px solid #444444; padding: 0 5px 0 5px; width: auto; text-align: center">
        <?= formCalc() ?>
    </div>
</form>
<br>
<?= include LIB_DIR . 'chat.php'; sendMessage() ?>
<br>
<div class="content" style="display: flex; justify-content: center;margin: 20px auto">
    <h2>Каталог товаров</h2>
    <? include LIB_DIR . 'catalog.php'; buyGood() ?>
</div>
</body>
</html>