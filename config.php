<?php

$db_name = 'crud_php';
$db_host = 'localhost';
$db_user = 'adminuser';
$db_password = 'password';

$pdo = new PDO("mysql:dbname=" . $db_name . ";host=" . $db_host, $db_user, $db_password);
