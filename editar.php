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

        $sqlContato = $pdo->prepare('SELECT * FROM contatos WHERE cliente_id = :id');
        $sqlContato->bindValue(':id', $id);
        $sqlContato->execute();
        $contato = $sqlContato->fetch(PDO::FETCH_ASSOC);
    } else {
        header('Location: index.php');
        exit;
    }
} else {
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="editar.css">
</head>

<body>
    <header>
        <h1>Editar usuário</h1>
    </header>
    <main>
        <div class="container">
            <form class="box-form" action="editar_action.php" method="post">
                <input type="hidden" name="id" value="<?= $usuario['id']; ?>">
                <div class="label">
                    <label>
                        <p>Atualizar nome:</p> <input type="text" name="nome" value="<?= $usuario['nome']; ?>"></input>
                    </label>
                    <label>
                        <p>Atualizar email:</p> <input type="email" name="email" value="<?= $usuario['email']; ?>"></input>
                    </label>
                    <label>
                        <p>Atualizar telefone:</p> <input type="tel" name="telefone" value="<?= $contato['telefone']; ?>"></input>
                    </label>
                    <label>
                        <p>Atualizar celular:</p> <input type="tel" name="celular" value="<?= $contato['celular']; ?>"></input>
                    </label>
                    <label>
                        <p>Atualizar endereço:</p> <input type="text" name="endereco" value="<?= $usuario['endereco']; ?>"></input>
                    </label>
                    <label>
                        <p>Atualizar estado:</p> <input type="text" name="estado" value="<?= $usuario['estado']; ?>"></input>
                    </label>
                    <label>
                        <p>Atualizar uf:</p> <input type="text" name="uf" value="<?= $usuario['uf']; ?>"></input>
                    </label>
                    <input type="submit" value="Atualizar" class="btn">
                </div>
            </form>
        </div>
    </main>

    <footer><span>SEMGE &COPY;</span></footer>

</body>

</html>