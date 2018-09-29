<?php
/**
 * Created by PhpStorm.
 * User: Eduard Panteleev
 * Date: 29.09.2018
 * Time: 12:22
 */

function buyGood()
{
    $db = mysqli_connect('localhost', 'root', '', 'images');
    $result = mysqli_query($db, "SELECT `id`, `name`, description, path_small, price FROM goods");
    While ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='item'>
        <form action='' method='GET'>
            <img src='{$row["path_small"]}'>
            <h3 class='item-name'>{$row["name"]}</h3>
            <p class='price'>{$row["price"]}</p>
            <a href='catalog_view.php?id={$row['id']}'><input class='add-to-basket' type='submit' value='Подробнее'></a>
        </form>
    </div>";
    }
}
