<?php
    $time = date("H");
    $dayOfTheWeek = date("N");

    if ($time >= 6 and $time <= 10) {
        $image = "img/morning.jpg";
        $text = "Доброе утро!";
    } elseif ($time >= 11 and $time <= 17) {
        $image = "img/day.jpg";
        $text = "Добрый день!";
    } elseif ($time >= 18 and $time <= 22) {
        $image = "img/evening.jpg";
        $text = "Добрый вечер!";
    } elseif (($time >= 0 and $time <= 5) and ($time = 23)) {
        $image = "img/night.jpg";
        $text = "Доброй ночи!";
    }

    if ($dayOfTheWeek == 1) {
        $text_2 = "Сегодня - понедельник";
    } elseif ($dayOfTheWeek == 2) {
        $text_2 = "Сегодня - вторник";
    } elseif ($dayOfTheWeek == 3) {
        $text_2 = "Сегодня - среда";
    } elseif ($dayOfTheWeek == 4) {
        $text_2 = "Сегодня - четверг";
    } elseif ($dayOfTheWeek == 5) {
        $text_2 = "Сегодня - пятница";
    } elseif ($dayOfTheWeek == 6) {
        $text_2 = "Сегодня - суббота";
    } elseif ($dayOfTheWeek == 7) {
        $text_2 = "Сегодня - воскресенье";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP - 1.1.1</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="img" style="background-image: url(<?= $image; ?>)">
        <div class="greeting">
            <h1><?php echo $text."\n".$text_2; ?></h1>
        </div>
    </div>
</body>
</html>