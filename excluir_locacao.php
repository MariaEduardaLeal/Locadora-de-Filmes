<?php
include('conexao.php');
include('verificacao.php');

$idaluguel = $_POST['idaluguel'];

$excluir_locacao = "DELETE FROM aluguel
                    WHERE idaluguel = '$idaluguel'";
$query_excluir = mysqli_query($conexao, $excluir_locacao);

if ($query_excluir) {
    echo "<script>alert('Locação excluido com sucesso')</script>";
    echo "<script>window.location.href='lista_locacao.php'</script>";
}else {
    echo "<script>alert('Locação não pôde ser excluído')</script>";
    echo "<script>window.location.href='lista_locacao.php'</script>";
}
?>