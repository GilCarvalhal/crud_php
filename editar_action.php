<?php

require_once 'config.php';

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$endereco = filter_input(INPUT_POST, 'endereco');
$estado = filter_input(INPUT_POST, 'estado');
$uf = filter_input(INPUT_POST, 'uf');
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_VALIDATE_INT);
$celular = filter_input(INPUT_POST, 'celular', FILTER_VALIDATE_INT);

if ($id && $nome && $email && $endereco && $estado && $uf) {
    $sql = $pdo->prepare('UPDATE clients SET 
    nome = :nome, 
    email = :email, 
    endereco = :endereco, 
    estado = :estado, 
    uf = :uf WHERE id = :id');
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':endereco', $endereco);
    $sql->bindValue(':estado', $estado);
    $sql->bindValue(':uf', $uf);
    $sql->bindValue(':id', $id);
    $sql->execute();

    $sqlUpdateContato = $pdo->prepare("UPDATE contatos SET telefone = :telefone, celular = :celular 
    WHERE cliente_id = :id");

    $sqlUpdateContato->bindValue(':telefone', $telefone);
    $sqlUpdateContato->bindValue(':celular', $celular);
    $sqlUpdateContato->bindValue(':id', $id);
    $sqlUpdateContato->execute();

    header('Location: index.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}
