<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar cliente</title>
    <script type="text/javascript" src="funcoes.js"></script>
</head>
<body>
    <form action="cadastrar_cliente_scriptign.php" method="post" onsubmit="return validarFormulario()">
        <span>Nome do usuário</span>
        <input type="text" name="nome" id="nome" required><br>

        <span>Login</span>
        <input type="text" name="login" id="login" required  oninput="validateLogin()"><br>

        <span>Senha</span>
        <input type="password" name="senha" id="senha" required onkeyup="validatePassword()"><br>

        <span>Confirme sua senha</span>
        <input type="password" name="confirma" id="confirma" required onkeyup="validatePassword()"><br>

        <span>Estado</span>
        <input type="text" name="estado" id="estado" required><br>

        <span>Cidade</span>
        <input type="text" name="cidade" id="cidade" required><br>

        <span>Logradouro</span>
        <input type="text" name="logradouro" id="logradouro" required><br>

        <span>Número</span>
        <input type="number" name="numero" id="numero" required><br>

        <span>Bairro</span>
        <input type="text" name="bairro" id="bairro" required><br>

        <input type="submit" value="Entrar">
    </form>
</body>
</html>