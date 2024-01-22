<?php

$pdo = new PDO("mysql:dbname=crud_php;host=localhost:3306", "adminuser", "password");

$sql = $pdo->query('SELECT * FROM clients');

$dados = $sql->fetchAll(pdo::FETCH_ASSOC);

print_r($dados);
