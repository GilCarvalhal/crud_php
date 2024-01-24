<?php

require_once './config.php';

$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$sexo = filter_input(INPUT_POST, 'sexo');
$nascimento = filter_input(INPUT_POST, 'nascimento');
$endereco = filter_input(INPUT_POST, 'endereco');
$estado = filter_input(INPUT_POST, 'estado');
$uf = filter_input(INPUT_POST, 'uf');
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_VALIDATE_INT);
$celular = filter_input(INPUT_POST, 'celular', FILTER_VALIDATE_INT);

$sqlInsert = $pdo->prepare("INSERT INTO clients (nome, email, sexo, nascimento, endereco, estado, uf) 
VALUES (:nome, :email, :sexo, :nascimento, :endereco, :estado, :uf)");

if ($nome && $email) {

    $sqlSelect = $pdo->prepare("SELECT * FROM clients WHERE email = :email");
    $sqlSelect->bindValue(':email', $email);
    $sqlSelect->execute();

    if ($sqlSelect->rowCount() === 0) {

        $sqlInsert->bindValue(':nome', $nome);
        $sqlInsert->bindValue(':email', $email);
        $sqlInsert->bindValue(':sexo', $sexo);
        $sqlInsert->bindValue(':nascimento', $nascimento);
        $sqlInsert->bindValue(':endereco', $endereco);
        $sqlInsert->bindValue(':estado', $estado);
        $sqlInsert->bindValue(':uf', $uf);
        $sqlInsert->execute();

        // Retorna o id do último registro inserido.
        $clienteId = $pdo->lastInsertId();

        $sqlInsertContato = $pdo->prepare("INSERT INTO contatos (cliente_id, telefone, celular) 
        VALUES (:cliente_id, :telefone, :celular)");

        $sqlInsertContato->bindValue(':cliente_id', $clienteId);
        $sqlInsertContato->bindValue(':telefone', $telefone);
        $sqlInsertContato->bindValue(':celular', $celular);
        $sqlInsertContato->execute();

        header('Location: index.php');
        exit;
    } else {
        header("Location: cadastrar.php");
    }
} else {
    header('Location: cadastrar.php');
    exit;
}
