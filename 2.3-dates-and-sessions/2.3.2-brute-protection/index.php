<?php
$users = [
    'admin' => 'admin1234',
    'randomUser' => 'somePassword',
    'janitor' => 'nimbus2000'
];

//Функция для авторизации
function login($users) {
    foreach ($users as $key => $value) {
        if ($key == $_POST['login']) {
            if ($value == $_POST['password']) {
                echo 'Вы успешно авторизировались';
                return true;
            }
        }
    }
    echo 'Неправельный логин или пароль';
    return false;
}

//Функция для проверки верный ли логин или пароль
function check($users) {
    $_SESSION['login'] = $_POST['login'];
    $bool = login($users);
    if ($bool == true) {
        return;
    } else {
        $_SESSION['time'] = time();
        $_SESSION['counter'] = 1;
        return;
    }
}

//Функция защиты от перебора
function bruteForceProtection($users) {
    session_set_cookie_params(1800);
    session_start();

    //Если это первая попытка авторизации, то вызвать функцию проверки
    if (count($_SESSION) == 0) {
        check($users);
        return;
    }

    //Если это не первая попытка авторизации и логин используеться тот же
    if ($_SESSION['login'] == $_POST['login']) {
        //Если авторизацию производят через 5 секунд с неправельным паролем
        if (time() < $_SESSION['time'] + 5) {
            $_SESSION['counter']++;
            echo 'Слишком часто вводите пароль. Попробуйте еще раз через минуту';
            //Если авторизация происходит в течении минуты с неправельным поролем
        } elseif (time() < $_SESSION['time'] + 60) {
            $_SESSION['counter']++;
            echo 'Слишком часто вводите пароль. Попробуйте еще раз через минуту';
            //Если прошло уже больше минуты то снова позволить пройти авторизацию
        } elseif (time() >= $_SESSION['time'] + 60) {
            $_SESSION = [];
            check($users);
            return;
        }

        //Если пароль был введен не првельно 3 раза
        if ($_SESSION['counter'] == 3) {
            $_SESSION['counter'] = 0;
                
            //Записать в файл имя, время и дату неправельного ввода
            $file = 'bruteForce.txt';
            $fpFile = fopen($file, 'a');
            $str = $_POST['login'] . ': ' . date('j F Y, g:i a') . "\n";
            fwrite($fpFile, $str);
            fclose($fpFile);
        }
    //Если логин отличаеться от вводимого ранее
    } else {
        check($users);
        return;
    }
}

bruteForceProtection($users);

