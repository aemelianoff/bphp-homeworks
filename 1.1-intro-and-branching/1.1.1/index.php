<?php
$variable = true;

if (is_bool($variable)) {
    $type = 'bool';
    if ($variable == false) {
        $variable = 'false';
    } elseif ($variable == true) {
        $variable = 'true';
    }
    $description = 'Логический тип данных.<br>Используеться для проверки на true или false';
} elseif (is_float($variable)) {
    $type = 'float';
    $description = 'Число с плавающей точкой.<br>Используеться для вещественных числе';
} elseif (is_int($variable)) {
    $type = 'int';
    $description = 'Целое число.<br>Один из простейших и самых распространённых типов данных';
} elseif (is_string($variable)) {
    $type = 'string';
    $description = 'Строка.<br>Тип данных, значениями которого является произвольная последовательность символов алфавита';
} elseif (is_null($variable)) {
    $type = 'null';
    $variable = (unset)$variable;
    $description = 'Псевдозначение.<br>Может быть записано в поле таблицы базы данных';
} elseif(is_array($variable) or is_object($variable) or is_resource($variable)) {
    $type = 'other';
    $description = 'Другие типы данных.<br>Такие как массив, объект, ресурс';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP - 1.1.1</title>
</head>
<body>
    <p><?php echo "$variable is $type";?></p>
    <h3><?php echo $description?></h3>
</body>
</html>