<?php
/**
 * Created by PhpStorm.
 * User: Eduard Panteleev
 * Date: 28.09.2018
 * Time: 20:45
 */
function simpleCalc()
{
    $operation = $_GET["operation"];
    $first = (int)$_GET["first"];
    $second = (int)$_GET["second"];

    if (isset($_REQUEST["send"])) {
        if ($operation == 1)
            return $sum = $first + $second;
        elseif ($operation == 2)
            return $sum = $first - $second;
        elseif ($operation == 3 && $second != 0)
            return $sum = $first / $second;
        elseif ($operation == 3 && $second == 0)
            return $sum = "<p style='color: red; margin: 0'>на ноль делить нельзя</p>";
        else
            return $sum = $first * $second;
    }
}

function formCalc()
{
    $first = (int)$_POST["first"];
    $second = (int)$_POST["second"];

    if (isset($_POST["sum"])) {
        return $sum = $first + $second;
    }
    if (isset($_POST["ded"])) {
        return $sum = $first - $second;
    }
    if (isset($_POST["div"])) {
        if ($second != 0)
            return $sum = $first / $second;
        else
            return $sum = "<p style='color: red; margin: 0'>на ноль делить нельзя</p>";
    }
    if (isset($_POST["mul"])) {
        return $sum = $first * $second;
    }
}