<?php
function sendMessage()
{
    $name = $_GET['name'];
    $message = $_GET['message'];
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if ($_REQUEST["send"]) {
            if (isset($_GET['name']) && isset($_GET['message'])) {
                $db = mysqli_connect('127.0.0.1:3307', 'root', '', 'images');
                return mysqli_query($db, "INSERT INTO chat (`name`, message) VALUES ('$name', '$message')");

        //header("Location: index.php"); exit;
    }
        }
    }
}

function getMessage()
{
    $db = mysqli_connect('localhost', 'root', '', 'images');
    $result = mysqli_query($db, "SELECT `id`, `name`, message FROM chat");

    While ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='block' style='display: flex; justify-content: start; width: 500px; margin: auto'>
    <div class='number'>" . $row['id'] . "</div>
    <div class='nameAuthor' style='margin: 0 20px 0 30px'>" . $row['name'] . "</div>
    <div class='message' style='color: brown'>" . $row['message'] . "</div>
    </div>";
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
<form style='display: flex; justify-content:center; margin: 20px auto' action="" method="get">
    <input type="text" name="name" placeholder="Введите Ваше имя">
    <textarea name="message" placeholder="Напишите Ваш комментарий" cols="30" rows="4"></textarea>
    <input type="submit" name="send">
</form>
<? getMessage() ?>
</body>
</html>