<?php
header("Content-type: text/html; charset=UTF-8");
var_dump(__DIR__);
var_dump(file_get_contents('site.php'));

// Задание 1
$a = 0;
while ($a <= 100) {
    if ($a % 3 == 0) {
        echo $a . " ; ";
    }
    $a++;
}
echo "<br>";

// Задание 2
function getNumber()
{
    $i = 0;
    do {
        if ($i == 0)
            echo $i . " - это ноль<br>";
        elseif ($i % 2 != 0)
            echo $i . " - нечетное число<br>";
        else
            echo $i . " - четное число<br>";
        $i++;
    } while ($i <= 10);
}

getNumber();
// Задание 7
echo "<br>";
for ($i = mt_rand(0, 9); $i != 9; $i++, var_dump($i)) {
}
echo "<br>";
for ($i = 0; $i < 9; $i++, print_r($i)) {
}
echo '<br><br>';

// Задание 3 и 8

$area = [
    "Московская область" => ["Зеленогорск", "Павловский Посад", "Красногорск", "Краснознаменск"],
    "Ленинградская область" => ["Каменногорск", "Кировск", "Выборг", "Тосно"],
    "Хабаровский край" => ["Хабаровск", "Комсомольск-на-Амуре", "Бикин", "Полная дыра"],
];


foreach ($area as $key => $region) {
    echo $key . ':<br>';

    foreach ($region as $town) {
        if (mb_substr($town, 0, 1, "UTF-8") === 'К') { // для задания 3 - убрать условие
            echo $town;
            if ($town !== end($region)) {
                echo ', ';
            }
        }
    }
    echo '<br>';
}
echo '<br>';
echo '<hr>';
// Задание 6

$menu = [
    [
        "title" => "Главная",
        "href" => "/"
    ],
    [
        "title" => "Каталог",
        "href" => "two.php",
        "subitems" => [
            [
                "title" => "Одежда",
                "href" => "/catalog/goods/"
            ],
            [
                "title" => "Обувь",
                "href" => "site.php",
                "subitems" => [
                    [
                        "title" => "Ботинки",
                        "href" => "/catalog/goods/"
                    ],
                    [
                        "title" => "Сапоги",
                        "href" => "two.php"
                    ]
                ]
            ]
        ]
    ],
    [
        "title" => "Контакты",
        "href" => "/contact/"
    ],
];
$result = "<ul>";
$result .= menuRender($menu);
$result .= "</ul>";

function menuRender($menu_array)
{
    $result = "";

    foreach ($menu_array as $item) {
        $result .= "<li style='list-style: none'><a style='margin-left: 70px' href='{$item['href']}'>{$item['title']}</a>";
        echo implode(", ", $item); // склейка элементов массива

        if (isset($item["subitems"])) {
            $result .= "<ul>";
            $result .= menuRender($item["subitems"]);
            $result .= "</ul>";
        }
        $result .= "</li>";
    }
    return $result;

}
echo implode(", ", $menu[1]);

echo $result;
// Задание 4

$string = "Тестовая строка транслитерации";
echo $string . "<br>";
$arr1 = preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY); // а нужно использовать mb_str
//var_dump($arr1);

function translate($str){
    $alfabet = array(
        'а' => 'a', 'б' => 'b', 'в' => 'v',
        'г' => 'g', 'д' => 'd', 'е' => 'e',
        'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
        'и' => 'i', 'й' => 'y', 'к' => 'k',
        'л' => 'l', 'м' => 'm', 'н' => 'n',
        'о' => 'o', 'п' => 'p', 'р' => 'r',
        'с' => 's', 'т' => 't', 'у' => 'u',
        'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
        'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
        'э' => 'e', 'ю' => 'yu', 'я' => 'ya',

        'А' => 'A', 'Б' => 'B', 'В' => 'V',
        'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
        'Ё' => 'E', 'Ж' => 'Zh', 'З' => 'Z',
        'И' => 'I', 'Й' => 'Y', 'К' => 'K',
        'Л' => 'L', 'М' => 'M', 'Н' => 'N',
        'О' => 'O', 'П' => 'P', 'Р' => 'R',
        'С' => 'S', 'Т' => 'T', 'У' => 'U',
        'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
        'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch',
        'Ь' => '\'', 'Ы' => 'Y', 'Ъ' => '\'',
        'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',
        ' ' => ' ');

    $res = "";
    for($i = 0; $i < strlen($str); $i++){
        if($alfabet[$str{$i}]){
            $res .= $alfabet[$str{$i}];
        }
    }
    return $res;
}
echo translate("строка");

//ASCII

$result = "";
foreach ($arr1 as $letter) {
    $latin_letter = $alfabet[$letter];
    $result .= $latin_letter;
}

echo $result;
echo '<br>';
// Задание 5
echo $result = str_ireplace(" ", "_", $result); // или в словаре заменить " " на "_"

