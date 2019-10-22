<?php
$code = '12345!';

if (mb_strlen($_POST['code']) > 0) { //Обрабатывать кодовое слово только если оно не пустое
    $ProcessedCode = strtolower($_POST['code']);
    $ProcessedCode = trim($ProcessedCode);
}

if (preg_match('/\W/', $_POST['login'])) {
    echo 'В поле "Логин" недопустимо вводить спецсимволы.';
} elseif (mb_strlen($_POST['password']) < 8) {
    echo 'Пароль должен быть не менее 8 символов';
} elseif (preg_match('/^[a-zA-Z0-9_\-.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-.]+$/', $_POST['email']) === 0) {
    echo 'Некорректный формат email';
} elseif (strlen($_POST['firstName']) === 0 or strlen($_POST['lastName']) === 0 or strlen($_POST['middleName']) === 0) {
    echo 'Поля: "Имя", "Фамилия", "Отчество" не могут быть пустыми';
} elseif (strlen($_POST['code']) === 0) {
    echo 'Поле "Кодовое слово" не может быть пустым';
} elseif ($ProcessedCode != $code) {
    echo 'Вы ввели неверное кодовое слово';
} else {
    echo 'Регистрация выполнена успешно';
}