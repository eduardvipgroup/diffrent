<?php
header("Content-type: text/html; charset=UTF-8");
// Задание 1
$a = mt_rand(-10, 10);
$b = mt_rand(-10, 10);
function arithmeticOperations($a, $b)
{
    if ($a >= 0 && $b >= 0) {
        $res = $a - $b;
        return "разность {$a} - {$b} = {$res}";
    } elseif ($a < 0 && $b < 0) {
        $res = $a * $b;
        return "произведение {$a}" ." ". "*" ."{$b} = {$res}";
    } else {
        $res = $a + $b;
        return "сумма {$a} + {$b} = {$res}";
    }
}
echo "<h2>" . arithmeticOperations($a, $b) . "</h2>";

$c = mt_rand(-10, 10);
$d = mt_rand(-10, 10);
arithmeticOperations($c, $d);

echo "<h4>" . arithmeticOperations($c, $d) . "</h4>";
// Задание 3
$a = mt_rand(-10, 10);
$b = mt_rand(-10, 10);
function add($a, $b){
    return $a + $b;
}
function deduct($a, $b){
    return $a - $b;
}
function divide($a, $b){
    return ($b!=0)?$a/$b:"Делить на 0 - нельзя!";
}
function multiply($a, $b){
    return $a * $b;
}
echo "<h4>" . divide($a, $b) . "</h4>";
// Задание 4

$arg1 = mt_rand(-10, 10);
$arg2 = mt_rand(-10, 10);
$operation = mt_rand(0, 4); // 4 - для проверки default

switch ($operation) {
    case '0':
        $operation = "add";
        break;
    case '1':
        $operation = "deduct";
        break;
    case '2':
        $operation = "multiply";
        break;
    case '3':
        $operation = "divide";
        break;
}
echo "arg1 = {$arg1} <br> arg2 = {$arg2} <br> operation = {$operation} <br>";

function mathOperation($arg1, $arg2, $operation) {

    switch($operation) {
        case 'add':
            $res = add($arg1, $arg2);
            break;
        case 'deduct':
            $res = deduct($arg1, $arg2);
            break;
        case 'multiply':
            $res = multiply($arg1, $arg2);
            break;
        case 'divide':
            $res = divide($arg1, $arg2);
            break;
        default:
            $res = "Неверная операция!";
    }
    return $res;
}
echo "<h4 style='color: blue'>" . "результат = " . mathOperation($arg1, $arg2, $operation) . "</h4>";
// Задание 6

$val = mt_rand(-5, 10);
$pow = mt_rand(0, 10);
function power($val, $pow) {
    if ($pow == 0) return 1;
    return $val * power($val, $pow - 1);
}
echo "<br>";
echo "<h4 style='color: #874289'>" . "{$val} в степени {$pow} = " . power($val, $pow) . "</h4>";

// Задание 7
date_default_timezone_set('asia/vladivostok');

$time = time();

$hour = date('G', $time);
$min = date('i', $time);

echo "$hour " . getWord($hour,"hours") . " $min " . getWord($min,"min");

function getWord($number, $format) {
    // окончание
    if ($number > 10 && $number <= 20) $message = 1;
    else {
        switch ($number % 10) {
            case 1:
                $message = 2;
                break;
            case 2:
            case 3:
            case 4:
                $message = 3;
                break;
            default:
                $message = 1;
        }
    }
    //затем отдельно добавим само окончание по полученному варианту
    if ($format=="hours")
        switch ($message) {
            case 1:  return "часов";  // почему так НЕ работает?
            case 2:  return "час";
            case 3:  return "часа";
        }
    if ($format == "min")
        switch ($message) {
            case 1: return "минут";  // почему return работает, а выше НЕТ?
            case 2: return "минута";
            case 3: return "минуты";
        }
}
