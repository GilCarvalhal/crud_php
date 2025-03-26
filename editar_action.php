<?php

require_once './config.php';

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$endereco = filter_input(INPUT_POST, 'endereco');
$cidade = filter_input(INPUT_POST, 'cidade');
$uf = filter_input(INPUT_POST, 'uf');
$telefone = filter_input(INPUT_POST, 'telefone');
$celular = filter_input(INPUT_POST, 'celular');

// Validação para garantir que telefone e celular sejam apenas números
if (!preg_match('/^\d+$/', $telefone) || !preg_match('/^\d+$/', $celular)) {
    header('Location: index.php');
    exit;
}

if ($id && $nome && $email && $endereco && $cidade && $uf) {
    $sql = $pdo->prepare('UPDATE clients SET 
    nome = :nome, 
    email = :email WHERE id = :id');
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':id', $id);
    $sql->execute();

    $sqlUpdateContato = $pdo->prepare("UPDATE contatos SET telefone = :telefone, celular = :celular 
    WHERE cliente_id = :id");

    $sqlUpdateContato->bindValue(':telefone', $telefone);
    $sqlUpdateContato->bindValue(':celular', $celular);
    $sqlUpdateContato->bindValue(':id', $id);
    $sqlUpdateContato->execute();

    $sqlUpdateLocal = $pdo->prepare("UPDATE localidade SET endereco = :endereco, cidade = :cidade, uf = :uf 
    WHERE cliente_id = :id");

    $sqlUpdateLocal->bindValue(':endereco', $endereco);
    $sqlUpdateLocal->bindValue(':cidade', $cidade);
    $sqlUpdateLocal->bindValue(':uf', $uf);
    $sqlUpdateLocal->bindValue(':id', $id);
    $sqlUpdateLocal->execute();

    header('Location: index.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}
