<?php
$name =  mb_convert_case($_POST['firstName'], MB_CASE_TITLE);
$surname = mb_convert_case($_POST['lastName'], MB_CASE_TITLE);
$middleName = mb_convert_case($_POST['middleName'], MB_CASE_TITLE);

$fullName = $surname . ' ' . $name . ' ' . $middleName;
$surnameAndInitials = $surname . ' ' . mb_substr($name, 0, 1) . '.' .  mb_substr($middleName, 0, 1 );
$fio = mb_substr($surname, 0, 1) . mb_substr($name, 0, 1) . mb_substr($middleName, 0, 1 );

echo "Полное имя: $fullName<br>";
echo "Фамилия и инициалы: $surnameAndInitials<br>";
echo "Аббревиатура: $fio";