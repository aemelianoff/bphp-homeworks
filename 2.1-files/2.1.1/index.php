<?php
$csv = array_map('str_getcsv', file('data.csv'));
$arr = [];

for ($a = 0; $a < count($csv) - 1; $a++) {
    if ($a === 0) {
        $name = substr($csv[$a][$a], 0, 4);
        $art = substr($csv[$a][$a], 5, 3);
        $price = substr($csv[$a][$a], 9, 5);
        $b = 1;
    }
    if ($a < 9) {
        $arr[$a] = [
            "$name" => substr($csv[$b][0], 0, 9),
            "$art" => substr($csv[$b][0], 10, 4),
            "$price" => substr($csv[$b][0], 15, 5)
        ];
    } else {
        $arr[$a] = [
            "$name" => substr($csv[$b][0], 0, 10),
            "$art" => substr($csv[$b][0], 11, 4),
            "$price" => substr($csv[$b][0], 16, 5)
        ];
    }
    $b++;
}

$json = json_encode($arr);
print_r($json);
file_put_contents('data.json', $json);
echo 'Файл data.csv успешно конвертирован в data.json';

