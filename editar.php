<?php

require_once './config.php';

$usuario = [];
$id = filter_input(INPUT_GET, 'id');
if ($id) {
    $sql = $pdo->prepare('SELECT * FROM clients WHERE id = :id');
    $sql->bindValue(':id', $id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);

        $sqlContato = $pdo->prepare('SELECT * FROM contatos WHERE cliente_id = :id');
        $sqlContato->bindValue(':id', $id);
        $sqlContato->execute();
        $contato = $sqlContato->fetch(PDO::FETCH_ASSOC);

        $sqlLocal = $pdo->prepare('SELECT * FROM localidade WHERE cliente_id = :id');
        $sqlLocal->bindValue(':id', $id);
        $sqlLocal->execute();
        $localidade = $sqlLocal->fetch(PDO::FETCH_ASSOC);
    } else {
        header('Location: index.php');
        exit;
    }
} else {
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="./css/editar.css">
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
                        <p>Atualizar telefone:</p> <input type="tel" name="telefone" value="<?= $contato['telefone']; ?>" oninput="validarTelefoneCelular(this)"></input>
                    </label>
                    <label>
                        <p>Atualizar celular:</p> <input type="tel" name="celular" value="<?= $contato['celular']; ?>" oninput="validarTelefoneCelular(this)"></input>
                    </label>
                    <label>
                        <p>Atualizar endereço:</p> <input type="text" name="endereco" value="<?= $localidade['endereco']; ?>"></input>
                    </label>
                    <label>
                        <p>Atualizar cidade:</p> <input type="text" name="cidade" value="<?= $localidade['cidade']; ?>"></input>
                    </label>
                    <label>
                        <p>Atualizar uf:</p> <input type="text" name="uf" value="<?= $localidade['uf']; ?>" oninput="validarUF(this)"></input>
                    </label>
                    <input type="submit" value="Atualizar" class="btn">
                </div>
            </form>
        </div>
    </main>

    <footer><span>SEMGE &COPY;</span></footer>

</body>

</html>

<script>
    function validarTelefoneCelular(input) {
        // Expressão regular para verificar se há caracteres não numéricos
        const regex = /[^0-9]/g;
        const valor = input.value;

        if (regex.test(valor)) {
            input.value = valor.replace(regex, '');
            alert("Por favor, insira apenas números no campo " + input.name);
        }
    }

    // Função para validar o formato de UF (apenas 2 letras maiúsculas)
    function validarUF(input) {
        let valor = input.value.toUpperCase();

        // Se houver mais de 2 caracteres, corta o valor para os primeiros 2
        if (valor.length > 2) {
            valor = valor.substring(0, 2);
        }

        // Expressão regular para garantir que seja composto apenas por letras maiúsculas
        const regexUF = /^[A-Z]{2}$/;

        // Verifica se o valor está correto
        if (!regexUF.test(valor)) {
            input.value = valor.replace(/[^A-Z]/g, ''); // Remove qualquer caractere não permitido
            alert("Por favor, insira uma UF válida (2 letras maiúsculas).");
        } else {
            input.value = valor; // Atualiza o campo com o valor válido
        }
    }
</script>