<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="autenticar.php" method="post">
        <span>Usuário</span>
        <input type="text" name="login" id="login" require placeholder="Nome do usuário"> <br> 
        <span>Senha</span>
        <input type="password" name="senha" id="senha" require placeholder="Senha"><br>
        <br>Mostrar Senha: <input type="checkbox" onclick="mostrarOcultarSenha()">
        
        <input type="submit" value="Entrar">
    </form>

    <script type="text/javascript" src="funcoes.js"></script>
</body>
</html>