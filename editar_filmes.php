<?php
include('conexao.php');
include('verificacao.php');
include('funcoes.php');

$login = $_SESSION['login'];
$idfilme = $_POST['idfilme'];

$nome_filme = getNomeFilme($conexao, $idfilme);
$ano_filme = getAnoFilme($conexao, $idfilme);
$genero_filme = getGeneroFilme($conexao, $idfilme);
$unidades_filme = getUnidadesFilme($conexao, $idfilme);

// Verifique se há locações para o filme
if (verificarLocacoesFilme($conexao, $idfilme)) {
    // Há locações para o filme, exiba uma mensagem de aviso e não permita a edição
    echo "<script>alert('Não é possível editar este filme, pois há locações associadas a ele.')</script>";
    echo "<script>window.location.href='lista_filmes.php'</script>";
} else {
    // Não há locações para o filme, permita a edição
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
<?php
}
?>
