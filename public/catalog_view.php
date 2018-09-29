<?
$id = (int)$_GET["id"];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ноутбук <?$row["name"]?></title>
</head>
<body>
<?
$db = mysqli_connect('localhost', 'root', '', 'images');
$result = mysqli_query($db, "SELECT `id`, `name`, description, path_small, path_big, price FROM goods WHERE id =" . $id);
$row = mysqli_fetch_assoc($result);

echo "<a href='index.php'><img src='{$row["path_big"]}' width='800'/></a><br>
<p>{$row["name"]}</p><br><p>Описание товара: {$row["description"]}</p><br><p>Стоимость: {$row["price"]}</p>";

?>
</body>
</html>
