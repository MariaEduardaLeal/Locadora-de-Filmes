<?php
include('conexao.php');
include('verificacao.php');

$idfilme = $_POST['idfilme'];
$nome_filme = $_POST['nome_filme'];
$ano_lancamento = $_POST['ano_lancamento'];
$genero = $_POST['genero'];
$unidades_disponiveis = $_POST['unidades_disponiveis'];

$update_sql = "UPDATE filme SET 
    nomefilme = '$nome_filme',
    anofilme = $ano_lancamento,
    genero = '$genero',
    unidades_disponiveis = $unidades_disponiveis
    WHERE idfilme = $idfilme";

// Execute a consulta SQL
if (mysqli_query($conexao, $update_sql)) {
    echo "<script>alert('Registro atualizado com sucesso')</script>";
    echo "<script>window.location.href='lista_filmes.php'</script>";
} else {
    echo "<script>alert('Erro ao atualizar o registro: ')</script>";
    echo "<script>window.location.href='lista_filmes.php'</script>";
}

// Feche a conexão com o banco de dados, se necessário
mysqli_close($conexao);
?>