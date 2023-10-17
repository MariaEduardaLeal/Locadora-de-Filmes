<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueceu a senha</title>
    <link rel="stylesheet" href="style/styleGeral.css">
    <link rel="stylesheet" href="style/mudarSenha.css">
</head>

<body>
    <div class="Container">
        <form action="mudar_senha_scripting.php" method="post" onclick="return validateForm()">
            <h1>Mudar senha</h1>
            <label>Confirme seu login</label>
            <input type="text" name="login" id="login" oninput="validateLogin()" required><br>

            <span>Senha</span>
            <input type="password" name="senha" id="senha" onkeyup="validatePassword()" required><br>

            <span>Confirme sua senha</span>
            <input type="password" name="confirma" id="confirma" onkeyup="validatePassword()" required><br>

            <button type="submit">Entrar</button>
        </form>
        <div class="voltar">
            <a href="index.php" onclick="return confirmBack()"><button>Voltar</button></a>
            <script src="funcoes.js"></script>
        </div>
    </div>

</body>

</html>