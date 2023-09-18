<?php 
session_start(); // inicia a sessão
include('conexao.php');

$login = $_SESSION['login'];
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
        <li><a href="cadastrar_cliente.php">Cadastrar Cliente</a></li>
        <li><a href="lista_clientes.php">Lista Clientes</a></li>
        <li><a href="edita_cliente.php">Edita Cliente</a></li>
        <li><a href="deleta_cliente.php">Deleta Cliente</a></li>
        <li><a href="cadastrar_filmes.php">Cadastrar Filmes</a></li>
        <li><a href="lista_filmes.php">Lista Filmes</a></li>
        <li><a href="edita_filme.php">Edita Filme</a></li>
        <li><a href="deleta_filme.php">Deleta Filme</a></li>
        <li><a href="cadastrar_locacao.php">Cadastrar Locação</a></li>
        <li><a href="lista_locacao.php">Lista Locacao</a></li>
        <li><a href="edita_locacao.php">Edita Locação</a></li>
        <li><a href="deleta_locacao.php">Deleta Locação</a></li>
    </ul>
</body>
</html>
