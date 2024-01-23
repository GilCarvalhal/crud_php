<?php

require_once './config.php';

$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$sexo = filter_input(INPUT_POST, 'sexo');
$nascimento = filter_input(INPUT_POST, 'nascimento');
$tel = filter_input(INPUT_POST, 'tel');
$cel = filter_input(INPUT_POST, 'cel');
$endereco = filter_input(INPUT_POST, 'endereco');
$estado = filter_input(INPUT_POST, 'estado');
$uf = filter_input(INPUT_POST, 'uf');

$sqlInsert = $pdo->prepare("INSERT INTO clients (nome, email, sexo, nascimento, telefone, celular, endereco, estado, uf) 
VALUES (:nome, :email, :sexo, :nascimento, :tel, :cel, :endereco, :estado, :uf)");

if ($nome && $email && $sexo && $nascimento && $tel && $cel && $endereco && $estado && $uf) {

    $sqlSelect = $pdo->prepare("SELECT * FROM clients WHERE email = :email");
    $sqlSelect->bindValue(':email', $email);
    $sqlSelect->execute();

    if ($sqlSelect->rowCount() === 0) {

        $sqlInsert->bindValue(':nome', $nome);
        $sqlInsert->bindValue(':email', $email);
        $sqlInsert->bindValue(':sexo', $sexo);
        $sqlInsert->bindValue(':nascimento', $nascimento);
        $sqlInsert->bindValue(':tel', $tel);
        $sqlInsert->bindValue(':cel', $cel);
        $sqlInsert->bindValue(':endereco', $endereco);
        $sqlInsert->bindValue(':estado', $estado);
        $sqlInsert->bindValue(':uf', $uf);
        $sqlInsert->execute();

        header('Location: index.php');
        exit;
    } else {
        header("Location: cadastrar.php");
    }
} else {
    header('Location: cadastrar.php');
    exit;
}
