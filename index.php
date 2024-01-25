<?php

require_once './config.php';

$lista = [];
$sql = $pdo->query('SELECT clients.id, clients.nome, clients.email, clients.sexo, clients.nascimento, contatos.telefone, contatos.celular, localidade.endereco, localidade.cidade, localidade.uf
                    FROM clients
                    LEFT JOIN contatos ON clients.id = contatos.cliente_id
                    LEFT JOIN localidade ON clients.id = localidade.cliente_id');

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
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>

    <header>
        <h1 class="title">Listagem de usuários</h1>
    </header>

    <div class="container">
        <main>
            <table border="1">
                <tr class="t-row">
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Sexo</th>
                    <th>Nascimento</th>
                    <th>Telefone</th>
                    <th>Celular</th>
                    <th>Endereço</th>
                    <th>Cidade</th>
                    <th>UF</th>
                    <th>Ações</th>
                </tr>
                <?php foreach ($lista as $clients) : ?>
                    <tr class="t-row">
                        <td><?= $clients['id'] ?></td>
                        <td><?= $clients['nome'] ?></td>
                        <td><?= $clients['email'] ?></td>
                        <td><?= $clients['sexo'] ?></td>
                        <td><?= $clients['nascimento'] ?></td>
                        <td><?= $clients['telefone'] ?></td>
                        <td><?= $clients['celular'] ?></td>
                        <td><?= $clients['endereco'] ?></td>
                        <td><?= $clients['cidade'] ?></td>
                        <td><?= $clients['uf'] ?></td>
                        <td>
                            <a href="editar.php?id=<?= $clients['id'] ?>">[ Editar ]</a>
                            <a href="excluir.php?id=<?= $clients['id'] ?>">[ Excluir ]</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <div class="div-btn">
                <input class="btn" onclick="redirecionarCadastro()" type="button" value="Cadastrar usuário">
            </div>
        </main>
    </div>

    <footer><span>SEMGE &COPY;</span></footer>
</body>

</html>

<script>
    function redirecionarCadastro() {
        window.location.href = "http://localhost/crud_php/cadastrar.php";
    }
</script>