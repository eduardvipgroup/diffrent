<?php
//Выполняет соединение с базой данных
function getConnection()
{
    static $db = null;
    if (!$db) {
        $db = mysqli_connect('127.0.0.1:3307', 'root', '', 'images')
        or die("Не могу соединиться с MySQL.");
    }
    return $db;
}
//получим массив с данными результирующей таблицы по команде $sql
function queryDB($sql)
{
    return mysqli_fetch_all(executeDB($sql), MYSQLI_ASSOC);
}
// отправка запроса в БД по команде $sql
function executeDB($sql)
{
    return mysqli_query(getConnection(), $sql);
}