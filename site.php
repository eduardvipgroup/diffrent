<?
$title = "Lesson 1";
$h1 = "Lesson 1";
$name = "Эдуард";
$age = 38;
$todayDate = date("l - F - Y  H : i");
$_ = "_";
$empty = " ";
// как все же вывести print_r на UTF-8 ?

$hi = "Меня зовут {$name}, мне $age лет. Через год мне будет " . ($age + 1) . " лет, а еще через год " . ($age + 2) . " лет.
На моих часах сейчас: $todayDate";

$hi2 = "My name is {$name}. On my watch is $todayDate";

$hi = str_ireplace($empty, $_, $hi);

$rest = mb_strcut($hi, strpos($hi, 'На'));

define("IMG_PATH", "111.png");
$content = "<img src='" . IMG_PATH . "'>";
$hello = "Hello!";
$b = "<b>Просто пример жирного текста</b>";

$font = "<p style=\"color:green\">Этот текст зеленый</p>";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>

</head>
<body>
<br><br>
<h1><?= $h1 ?></h1>
    <hr/>
    <marquee direction="up" style="background: bisque ; height: 500px;" behavior="alternate">
        <?= $hello . ' ' . 'Бегущая строка - вчерашний день!' ?>
    </marquee>
    <hr/>
    <?php echo "Eще раз" . " " . $hello . " " . "- из echo" ?>
    <br><br>
    Ниже картинка "PHP"<br>
    <marquee behavior="alternate" direction="right" scrollamount="19" style="background: bisque ; width: 700px;"><?= $content ?> </marquee>

    <br>
    <br><br>
    <?= $rest ?>
    <br><br>
    <div style="display: flex ; justify-content: space-around; align-items: center ; margin: auto ; width: 320px">
        <h4 style='color: blue'>TODAY IS </h4>
        <p><?php echo " " . $todayDate ?> </p>
    </div>
    <br><br>
    <a href="two.php">вторая страница</a>
</body>
</html>