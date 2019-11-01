<?php
include './classes/Person.php';
$person = new Person('Иван', 'Иванов', 'Иванович');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>bPHP - 3.2.1</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <h2>
            <span class="gender-<?=$person->getGender() ?>"> <?=$person->getGenderSymbol() ?> </span> 
            <?=$person->getFio() ?>
        </h2>
    </body>
</html>

