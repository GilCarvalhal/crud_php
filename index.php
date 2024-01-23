<?php

require_once './config.php';

$lista = [];
$sql = $pdo->query('SELECT * FROM clients');

if ($sql->rowCount() > 0) {
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela</title>
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
</head>


<body>

    <header>
        <h1 class="title">Listagem de usuários</h1>
    </header>

    <div class="container">
        <main>
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
            <div class="cadastro">
                <a href="./cadastrar.php" class="btn-cadastro">Cadastrar usuário</a>
            </div>
        </main>
    </div>

    <footer><span>SEMGE &COPY;</span></footer>
</body>

</html>