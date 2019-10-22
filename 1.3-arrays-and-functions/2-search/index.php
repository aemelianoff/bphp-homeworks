<?php
    $map = [
        1 => [
            1 => true,
            2 => false,
            3 => true,
            4 => true,
            5 => false,
            6 => false
        ],
        2 => [
            1 => true,
            2 => true,
            3 => true,
            4 => false,
            5 => false,
            6 => true
        ],
        3 => [
            1 => true,
            2 => false,
            3 => false,
            4 => false,
            5 => true,
            6 => false
        ],
        4 => [
            1 => false,
            2 => false,
            3 => false,
            4 => false,
            5 => false,
            6 => false 
        ]
    ];
    function search_seats($map, $seats_num)
    {
        if (is_array($map) === false) return "Указана некорректная карта посадочных мест";
        if ($seats_num < 1) return "Указано некорректное количество необходимых мест";
        foreach ($map as $row => $seats) {
            $found_seats = [];
            $counter = 0;
            foreach ($seats as $seat => $value) {
                if ($value === false) {
                    $counter++;
                    $found_seats[] = $seat;
                } else {
                    $counter = 0;
                    $found_seats = [];
                }
                if ($counter === $seats_num) {
                    return "Найдены места " . implode(',', $found_seats) . " в " . $row . "-м ряду";
                }
            }
        }
        return "Подходящих мест нет";
    }
    echo search_seats($map, 3);
?>