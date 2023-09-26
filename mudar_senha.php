<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueceu a senha</title>
</head>
<body>
    <form action="mudar_senha_scripting.php" method="post" onclick="return validateForm()">
       <label>Confirme seu login</label>
       <input type="text" name="login" id="login" oninput="validateLogin()" required><br>
       
       <span>Senha</span>
        <input type="password" name="senha" id="senha" onkeyup="validatePassword()" required><br>

        <span>Confirme sua senha</span>
        <input type="password" name="confirma" id="confirma" onkeyup="validatePassword()" required><br>

        <input type="submit" value="Entrar">
    </form>
    <a href="index.php">Voltari</a>
    <script src="funcoes.js"></script>
</body>
</html>