<?php
$chairs = 40;
$map = generate(5, 8, $chairs);
$rowNumber = 5;
$placeNumber = 8;

$placesGoingInARow = 5;

$reserve = reserve($map, $rowNumber, $placeNumber);
logReserve($rowNumber, $placeNumber, $reserve);
$consecutivePlaces = reservations($map, $placesGoingInARow);

function generate($numberOfRows, $placesInARow, $numberOfSeats) {
    $arr = [];
    for ($i = 1; $i <= $numberOfRows; $i++) {
        $arr[$i] = [];
        for ($a = 1; $a <= $placesInARow; $a++) {
            $arr[$i][$a] = false;
        }
    }
    if (($numberOfRows * $placesInARow) >  $numberOfSeats) { //Если кол.во посадочных мест на карте
        return false;                                        //больше чем количество доступных мест
    }                                                        //вернуть false
    return $arr;
}

function reserve($map, $rowNumber, $placeNumber) {
    if (isset($map[$rowNumber]) === false or isset($map[$rowNumber][$placeNumber]) === false) {
        return false;
    } elseif ($map[$rowNumber][$placeNumber] === false) {
        $map[$rowNumber][$placeNumber] = true;
        return true;
    } else {
        return false;
    }
}

function logReserve($rowNumber, $placeNumber, $reserve) {
    if ($reserve) {
        echo "Ваше место забронированно! Ряд $rowNumber место $placeNumber<br>";
    } else {
        echo 'Что-то пошло не так=( Бронь не удалась<br>';
    }
}

function reservations($map, $placesGoingInARow) {
    $matchCounter = 0; //Счетчик для проверки подряд идущих мест
    $contractualLocations = [];

    for ($i = 1; $i <= count($map); $i++) {
        if ($matchCounter === $placesGoingInARow) {
            break;
        } else {                        //Сбросить все переменные
            $matchCounter = 0;          //если на прошлом ряду не было
            $contractualLocations = []; //подряд идущих мест
        }
        for ($a = 1; $a <= count($map[$i]); $a++) {
            if ($map[$i][$a] === false) {
                if ($matchCounter === $placesGoingInARow) {
                    break;
                }
                $matchCounter++;
                $contractualLocations['ряд'] = $i;
                $contractualLocations["место $a"] = $a;
            }
        }
    }

    if ($matchCounter === $placesGoingInARow) {
        echo 'Подряд идущие места: ряд' . ' ' . $contractualLocations['ряд'] . ', ';
        echo 'места' . ' ';
        for ($b = 1; $b <= $matchCounter; $b++) {
            echo  $contractualLocations["место $b"] . ' ';
        }
        return  $contractualLocations;
    } else {
        echo 'Подходящих мест нет';
    }
}