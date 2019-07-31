<?php
include 'autoload.php';
include 'config/SystemConfig.php';

$jsonFileAccessModel = new JsonFileAccessModel('user.txt');
echo $jsonFileAccessModel->read();