<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar cliente</title>
    <script type="text/javascript" src="funcoes.js"></script>
    <link rel="stylesheet" href="style/styleGeral.css">
    <link rel="stylesheet" href="style/cadastrarCliente.css">
</head>

<body>
    <div class="container">
        <h1>Cadastro</h1>
        <form action="cadastrar_cliente_scriptign.php" method="post" onclick="return validateForm()">
            <span>Nome do usuário</span>
            <input type="text" name="nome" id="nome" required>

            <span>Login</span>
            <input type="text" name="login" id="login" required oninput="validateLogin()">

            <span>Senha</span>
            <input type="password" name="senha" id="senha" required onkeyup="validatePassword()">

            <span>Confirmar Senha</span>
            <input type="password" name="confirma" id="confirma" required onkeyup="validatePassword()">
            <div id="senha-feedback" style="color: red;"></div> <!-- Mensagem de erro -->

            <span>Estado</span>
            <input type="text" name="estado" id="estado" required>

            <span>Cidade</span>
            <input type="text" name="cidade" id="cidade" required>

            <span>Logradouro</span>
            <input type="text" name="logradouro" id="logradouro" required>

            <span>Número</span>
            <input type="number" name="numero" id="numero" required>

            <span>Bairro</span>
            <input type="text" name="bairro" id="bairro" required>

            <button type="submit">Entrar</button>
        </form>
        <a href="index.php" onclick="return confirmBack()"><button>Voltar</button></a>
        <script src="funcoes.js"></script>
    </div>

</body>

</html>