<?php

require_once 'config.php';

$usuario = [];
$id = filter_input(INPUT_GET, 'id');
if ($id) {
    $sql = $pdo->prepare('SELECT * FROM clients WHERE id = :id');
    $sql->bindValue(':id', $id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        // O fetch no PHP é como pegar uma linha de dados após realizar uma consulta ao banco de dados.
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        header('Location: index.php');
        exit;
    }
} else {
    header('Location: index.php');
}

?>

<h1>Editar usuário</h1>
<form action="editar_action.php" method="post">
    <input type="hidden" name="id" value="<?= $usuario['id']; ?>">
    <label>
        Atualizar nome: <input type="text" name="nome" value="<?= $usuario['nome']; ?>"></input>
    </label>
    <label>
        Atualizar email: <input type="email" name="email" value="<?= $usuario['email']; ?>"></input>
    </label>
    <label>
        Atualizar telefone: <input type="tel" name="telefone" value="<?= $usuario['telefone']; ?>"></input>
    </label>
    <label>
        Atualizar celular: <input type="tel" name="celular" value="<?= $usuario['celular']; ?>"></input>
    </label>
    <label>
        Atualizar endereço: <input type="text" name="endereco" value="<?= $usuario['endereco']; ?>"></input>
    </label>
    <label>
        Atualizar estado: <input type="text" name="estado" value="<?= $usuario['estado']; ?>"></input>
    </label>
    <label>
        Atualizar uf: <input type="text" name="uf" value="<?= $usuario['uf']; ?>"></input>
    </label>
    <input type="submit" value="Atualizar">
</form>