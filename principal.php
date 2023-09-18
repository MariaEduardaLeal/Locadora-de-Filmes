<?php
session_start(); // inicia a sessão
include('conexao.php');

$login = $_SESSION['login'];

//obtendo o tipo de usuário do banco de dados
$select_tipo_usuario = "SELECT id_tipo_usuario FROM login";

$query_tipo_usuario = mysqli_query($conexao, $select_tipo_usuario);
$dado_tipo_usuario = mysqli_fetch_assoc($query_tipo_usuario);

$id_tipo_usuario = $dado_tipo_usuario['id_tipo_usuario'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>principal</title>
</head>

<body>
    <ul>
        <?php if ($id_tipo_usuario == 1) : ?> <!--Funções do ADM-->
            <li><a href="lista_clientes.php">Lista Clientes</a></li>
            <li><a href="edita_cliente.php">Edita Cliente</a></li>
            <li><a href="deleta_cliente.php">Deleta Cliente</a></li>
            <li><a href="cadastrar_filmes.php">Cadastrar Filmes</a></li>
            <li><a href="edita_filme.php">Edita Filme</a></li>
            <li><a href="deleta_filme.php">Deleta Filme</a></li>
            <li><a href="edita_locacao.php">Edita Locação</a></li>
            <li><a href="deleta_locacao.php">Deleta Locação</a></li>

        <?php elseif ($id_tipo_usuario ==2) : ?> <!-- Funções do usuário -->
            <li><a href="lista_filmes.php">Lista Filmes</a></li>
            <li><a href="cadastrar_locacao.php">Cadastrar Locação</a></li>
            <li><a href="lista_locacao.php">Lista Locacao</a></li>
        <?php endif; ?>

    </ul>
</body>

</html>