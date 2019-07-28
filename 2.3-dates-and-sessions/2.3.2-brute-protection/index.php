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

//Фунуцмя защиты от перебора
function bruteForceProtection($users) {
    session_set_cookie_params(1800);
    session_start();

    //Если сессия пустая, создать булевую проверку на авторизацию
    if (count($_SESSION) == 0) {
        $_SESSION['login'] = true;
    }

    //Вызвать функцию авторизации
    if ($_SESSION['login'] == true) {
        $_SESSION['login'] = login($users);
    }

    //Если пароль неправельный заустить защиту
    if ($_SESSION['login'] == false) {
        //создать время ввода и счетчик попыток ввода
        if (count($_SESSION) == 1) {
            $_SESSION['time'] = time(); //время
            $_SESSION['counter'] = 1; //счетчик попыток который сразу регестрирует 1 неверный ввод пороля
            //если время между попытками меньше 5 секунд
        } elseif (time() < $_SESSION['time'] + 5) {
            $_SESSION['counter']++;
            echo 'Слишком часто вводите пароль. Попробуйте еще раз через минуту';
            //Если в течении минуты ввели неправельно пароль + к счетчику попыток
        } elseif (time() < $_SESSION['time'] + 60) {
            $_SESSION['counter']++;
            //По истечению минуты снова разрешить ввод
        } elseif (time() >= $_SESSION['time'] + 60) {
            $_SESSION = [];
            $_SESSION['login'] = login($users);
        }
        
        //Если было 3 попытки за последную минуту
        if (isset($_SESSION['counter'])) {
            if ($_SESSION['counter'] == 3) {
                $_SESSION['counter'] = 0;
                echo 'Слишком часто вводите пароль. Попробуйте еще раз через минуту';
    
                //Записать в файл имя, время и дату неправельного ввода
                $file = 'bruteForce.txt';
                $fpFile = fopen($file, "a");
                $str = $_POST['login'] . ': ' . date("j F Y, g:i a");
                fwrite($fpFile, $str);
                fclose($fpFile);
            }
        }
    }
}

if (isset($_POST)) {
    bruteForceProtection($users);
}

