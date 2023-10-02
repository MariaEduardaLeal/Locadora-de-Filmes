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
    <div class="senhaAlinhada">
    <form action="autenticar.php" method="post">
        <h1>Login</h1>
        <span>Usuário</span>
        <input type="text" name="login" id="login" required placeholder="Nome do usuário"><br>
        <span>Senha</span>
        <input type="password" name="senha" id="senha" required placeholder="Senha">
        <span>Mostrar Senha:<input type="checkbox" onclick="mostrarOcultarSenha()"></span>
        <div class="senha">        
        <a href="mudar_senha.php">Esqueceu a senha?</a></div>
        <button type="submit">Entrar</button>
        <div class="cadastrar"><a href="cadastrar_cliente.php">Cadastrar novo cliente</a> </div>
    </form>
    </div>    
</body>
</html>