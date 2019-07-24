<?php
spl_autoload_register (
    function ($className) {
        include 'classes/' . $className . '.php';
    }
);

spl_autoload_register (
    function ($className) {
        include './2.2.1/classes/' . $className . '.php';
    }
);