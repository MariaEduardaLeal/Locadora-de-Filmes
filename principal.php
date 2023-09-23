<?php
include('conexao.php');
include('verificacao.php');
include('funcoes.php');
$login = $_SESSION['login'];
//obtendo o tipo de usuário do banco de dados
$id_tipo_usuario = getTipoUsuario($conexao, $login);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>principal</title>
    <link rel="stylesheet" href="style/styleGeral.css">
    <link rel="stylesheet" href="style/principal.css">    
</head>

<body>
    <h1>Bem vindo, <?php echo $login ?></h1>
    <ul>
        <?php if ($id_tipo_usuario == 1) : ?> <!--Funções do ADM-->
            <li><a href="lista_clientes.php">Lista Clientes</a></li>
            <li><a href="cadastrar_filme.php">Cadastrar Filmes</a></li>
            <li><a href="lista_filmes.php">Lista Filmes</a></li>
            <li><a href="lista_locacao.php">Lista Locacao</a></li>

        <?php elseif ($id_tipo_usuario == 2) : ?> <!-- Funções do usuário -->
            <li><a href="lista_filmes.php">Lista Filmes</a></li>
            <li><a href="lista_locacao.php">Lista Locacao</a></li>
        <?php endif; ?>

        <button onclick="sair()">Sair</button>
        <script src="funcoes.js"></script>

    </ul>
</body>

</html>