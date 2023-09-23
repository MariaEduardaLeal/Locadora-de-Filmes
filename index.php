<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script type="text/javascript" src="funcoes.js"></script>
    <link rel="stylesheet" href="style/styleGeral.css">
    <link rel="stylesheet" href="style/index.css">
</head>

<body>
    <form action="autenticar.php" method="post">
        <h1>Login</h1>
        <span>Usuário</span>
        <input type="text" name="login" id="login" required placeholder="Nome do usuário"> <br>
        <span>Senha</span>
        <input type="password" name="senha" id="senha" required placeholder="Senha">
        Mostrar Senha: <input type="checkbox" onclick="mostrarOcultarSenha()">

        <button type="submit" value="Entrar">Entrar</button>
        <a href="cadastrar_cliente.php">Cadastrar novo cliente</a>
    </form>


</body>

</html>