<?php
    $time = date("H");
    $dayOfTheWeek = date("N");

    if ($time >= 6 and $time <= 10) {
        $image = 'img/morning.jpg';
        $greeting = 'Доброе утро!';
    } elseif ($time >= 11 and $time <= 17) {
        $image = 'img/day.jpg';
        $greeting = 'Добрый день!';
    } elseif ($time >= 18 and $time <= 22) {
        $image = 'img/evening.jpg';
        $greeting = 'Добрый вечер!';
    } elseif (($time >= 0 and $time <= 5) and ($time = 23)) {
        $image = 'img/night.jpg';
        $greeting = 'Доброй ночи!';
    }

    if ($dayOfTheWeek == 1) {
        $day = 'Сегодня - понедельник';
    } elseif ($dayOfTheWeek == 2) {
        $day = 'Сегодня - вторник';
    } elseif ($dayOfTheWeek == 3) {
        $day = 'Сегодня - среда';
    } elseif ($dayOfTheWeek == 4) {
        $day = 'Сегодня - четверг';
    } elseif ($dayOfTheWeek == 5) {
        $day = 'Сегодня - пятница';
    } elseif ($dayOfTheWeek == 6) {
        $day = 'Сегодня - суббота';
    } elseif ($dayOfTheWeek == 7) {
        $day = 'Сегодня - воскресенье';
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
            <h1><?php echo "$greeting $day"; ?></h1>
        </div>
    </div>
</body>
</html>