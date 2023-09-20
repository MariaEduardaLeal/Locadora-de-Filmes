<?php
include('conexao.php');
include('verificacao.php');
$login = $_SESSION['login'];

$idfilme = $_POST['idfilme'];

$nome_filmes = "SELECT nomefilme FROM filme 
                       WHERE idfilme = $idfilme";
$query_nome = mysqli_query($conexao, $nome_filmes);
$dado_nome = mysqli_fetch_assoc($query_nome);
$nome_filme = $dado_nome['nomefilme'];

$ano_filmes = "SELECT anofilme FROM filme 
                       WHERE idfilme = $idfilme";
$query_ano = mysqli_query($conexao, $ano_filmes);
$dado_ano = mysqli_fetch_assoc($query_ano);
$ano_filme = $dado_ano['anofilme'];

$genero_filmes = "SELECT genero FROM filme 
                       WHERE idfilme = $idfilme";
$query_genero = mysqli_query($conexao, $genero_filmes);
$dado_genero = mysqli_fetch_assoc($query_genero);
$genero_filme = $dado_genero['genero'];

$unidades_filmes = "SELECT unidades_disponiveis FROM filme 
                       WHERE idfilme = $idfilme";
$query_unidades = mysqli_query($conexao, $unidades_filmes );
$dado_unidades = mysqli_fetch_assoc($query_unidades);
$unidades_filme = $dado_unidades['unidades_disponiveis'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Filmes</title>
</head>
<body>
    <form id="editForm" action="editar_filmes_scripting.php" method="post">
        
        <input type="hidden" name="idfilme" value="<?= $idfilme?>">
        
        <label>Nome do filme: </label> 
        <input type="text" name="nome_filme" placeholder="<?= $nome_filme ?>"><br>

        <label>Ano de lançamento: </label>
        <input type="number" name="ano_lancamento" required placeholder="<?= $ano_filme ?>"><br>

        <label>Genero: </label>
        <input type="text" name="genero" required placeholder="<?= $genero_filme ?>"><br>

        <label>Unidades disponiveis: </label>
        <input type="number" name="unidades_disponiveis" required placeholder="<?= $unidades_filme ?>"><br>
        <!--TODO: Fazer uma função que verifique se há locações para esse filme, se houver ele não deixa editar, 
        mas da a possibilidade de adcionar um novo filme ao catálogo -->
        <input type="submit" value="Editar" onclick="return confirmEdit()">
    </form>
    <a href="lista_filmes.php" onclick="return confirmBack()">Voltar</a>

    <script src="funcoes.js"></script>

</body>
</html>

