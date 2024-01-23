<h1>Cadastrar usuário</h1>

<form action="cadastrar_action.php" method="post">
    <label for="">
        Nome Completo:
        <input type="text" name="nome" required>
    </label>
    <label for="">
        Email:
        <input type="email" name="email" required>
    </label>
    <label for="">
        Sexo:
        <input type="radio" name="sexo" value="M">Masculino
        <input type="radio" name="sexo" value="F">Feminino
    </label>
    <label for="">
        Nascimento:
        <input type="date" name="nascimento" required>
    </label>
    <label for="">
        Telefone:
        <input type="tel" name="tel">
    </label>
    <label for="">
        Celular:
        <input type="tel" name="cel" required>
    </label>
    <label for="">
        Endereço:
        <input type="text" name="endereco" required>
    </label>
    <label for="">
        Estado:
        <input type="text" name="estado" required>
    </label>
    <label for="">
        UF:
        <input type="text" name="uf" required>
    </label>
    <input type="submit" value="Cadastrar">
</form>