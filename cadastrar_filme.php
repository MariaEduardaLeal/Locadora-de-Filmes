<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Filme</title>
</head>

<body>
    <form action="cadastrar_filme_scriptign.php" method="post">

        <span>Nome do filme</span>
        <input type="text" name="nome" id="nome" required><br>

        <span>Ano</span>
        <input type="text" name="ano" id="ano" required><br>

        <span>Genero</span>
        <input type="text" name="genero" id="genero" required><br>

        <input type="submit" value="Cadastra">

    </form>
</body>

</html>