<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Filme</title>
    <link rel="stylesheet" href="style/styleGeral.css">
    <link rel="stylesheet" href="style/cadastrarFilme.css">
</head>

<body>
    <form action="cadastrar_filme_scriptign.php" method="post">

        <span>Nome do filme</span>
        <input type="text" name="nome" id="nome" required><br>

        <span>Ano</span>
        <input type="text" name="ano" id="ano" required><br>

        <span>Genero</span>
        <input type="text" name="genero" id="genero" required><br>

        <span>Unidades Disponíveis</span>
        <input type="number" name="unidades_disponiveis" id="unidades_disponiveis"><br>

        <button type="submit" value="Cadastra">cadastrar</button>

    </form>

    <button onclick="goBack()">Voltar</button>
        <script src="funcoes.js"></script>

</body>

</html>