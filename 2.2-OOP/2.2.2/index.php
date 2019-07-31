<?php
include 'autoload.php';
include 'SystemConfig.php';

$users = new Users();
$a = $users->displaySortedList();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <style>
        .element {
            display: inline-block;
            padding-left: 7px;
            padding-bottom: 10px;
        }
        .elemnt2 {
            background-color: LightGray;
            border-top: 3px solid black;
            border-bottom: 2px solid grey;
        }
        .h1 {
            padding-left: 7px;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <div class = "elemnt2">
            <h1 class = "h1">Создать пользователя</h1>
            <div>
                <div class = "element">Имя:</div>
                <div class = "element"><input type="text" name="name"></div>
            </div>
            <div>
                <div class = "element">Пароль:</div>
                <div class = "element"><input type="password" name="password"></div>
            </div> 
            <div>
                <div class = "element">Электронная почта:</div>
                <div class = "element"><input type="email" name="email"></div>
            </div> 
            <div>
                <div class = "element">Рейтинг:</div>
                <div class = "element"><input type="number" name="rate"></div>
            </div>
            <div>
                <div class = "element"><input type="submit" value = "Добавить пользователя"></div>
            </div>         
        </div>
    </form>
</body>
</html>