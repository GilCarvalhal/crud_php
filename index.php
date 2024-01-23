<?php

require_once './config.php';

$lista = [];
$sql = $pdo->query('SELECT * FROM clients');

if ($sql->rowCount() > 0) {
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>

<h1>Listagem de usuários</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Sexo</th>
        <th>Nascimento</th>
        <th>Telefone</th>
        <th>Celular</th>
        <th>Endereço</th>
        <th>Estado</th>
        <th>UF</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($lista as $clients) : ?>
        <tr>
            <td><?= $clients['id'] ?></td>
            <td><?= $clients['nome'] ?></td>
            <td><?= $clients['email'] ?></td>
            <td><?= $clients['sexo'] ?></td>
            <td><?= $clients['nascimento'] ?></td>
            <td><?= $clients['telefone'] ?></td>
            <td><?= $clients['celular'] ?></td>
            <td><?= $clients['endereco'] ?></td>
            <td><?= $clients['estado'] ?></td>
            <td><?= $clients['uf'] ?></td>
            <td>
                <a href="editar.php?id=<?= $clients['id'] ?>">[ Editar ]</a>
                <a href="excluir.php?id=<?= $clients['id'] ?>">[ Excluir ]</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<a href=" ./cadastrar.php">Cadastrar usuário</a>