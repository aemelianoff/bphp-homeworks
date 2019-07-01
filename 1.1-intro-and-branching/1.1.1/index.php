<?php
$variable = null;

if (is_bool($variable)) {
    $type = bool;
    $variable = "false";
    $description = "Логический тип данных.
                    Используеться для проверки на true или false";
} elseif (is_float($variable)) {
    $type = float;
    $description = "Число с плавающей точкой.
                    Используеться для вещественных числе";
} elseif (is_int($variable)) {
    $type = int;
    $description = "Целое число.
                    Один из простейших и самых распространённых типов данных";
} elseif (is_string($variable)) {
    $type = string;
    $description = "Строка.
                    Тип данных, значениями которого является произвольная последовательность символов алфавита";
} elseif (is_null($variable)) {
    $type = "null";
    $variable = "null";
    $description = "Псевдозначение.
                    Может быть записано в поле таблицы базы данных";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP - 1.1.1</title>
</head>
<body>
    <p><?php echo $variable."\n"."is"."\n".$type;?></p>
    <h3><?php echo $description?></h3>
</body>
</html>