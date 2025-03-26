<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <!-- CSS -->
    <link rel="stylesheet" href="./css/cadastro.css">
</head>

<body>

    <header>
        <h1>SEMGE</h1>
    </header>
    <main>
        <div class="container">
            <h1 class="title">Cadastrar usuário</h1>

            <form class="box-form" action="cadastrar_action.php" method="post">
                <div class="label">
                    <label>
                        <p>Nome Completo:</p>
                        <input type="text" name="nome" placeholder="Digite seu nome..." required>
                    </label>
                    <label>
                        <p>Email:</p>
                        <input type="email" name="email" placeholder="Digite seu email..." required>
                    </label>
                    <label>
                        <p>Sexo:</p>
                        <input type="radio" name="sexo" value="M">
                        <p class="m">Masculino</p>
                        <input type="radio" name="sexo" value="F">
                        <p class="f">Feminino</p>
                    </label>
                    <label>
                        <p>Nascimento:</p>
                        <input type="date" name="nascimento" required>
                    </label>
                    <label>
                        <p>Telefone:</p>
                        <input type="tel" name="telefone" placeholder="xxxxxxxxxx" oninput="validarTelefoneCelular(this)">
                    </label>
                    <label>
                        <p>Celular:</p>
                        <input type="tel" name="celular" placeholder="xxxxxxxxxx" oninput="validarTelefoneCelular(this)" required>
                    </label>
                    <label>
                        <p>Endereço:</p>
                        <input type="text" name="endereco" placeholder="Digite seu endereço..." required>
                    </label>
                    <label>
                        <p>Cidade:</p>
                        <input type="text" name="cidade" placeholder="Digite sua região..." required>
                    </label>
                    <label>
                        <p>UF:</p>
                        <input type="text" name="uf" placeholder="Digite sua UF..." oninput="validarUF(this)" required>
                    </label>
                </div>
                <div class="div-btn">
                    <input class="btn" type="submit" value="Cadastrar">
                    <input onclick="redirecionar()" class="btn" type="button" value="Retornar">
                </div>
            </form>
        </div>
    </main>

    <footer><span>SEMGE &COPY;</span></footer>

</body>

</html>

<script>
    function redirecionar() {
        window.location.href = "http://localhost/crud_php/index.php";
    }

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