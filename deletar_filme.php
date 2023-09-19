<?php
include('conexao.php');
include('verificacao.php');

$idfilme = $_POST['idfilme'];

$deletar_filme = "DELETE FROM filme
                  WHERE idfilme = $idfilme";

$query_excluir = mysqli_query($conexao, $deletar_filme);

if (!$query_excluir) {
    echo "<script>alert('Filme não pode ser excluido')</script>";
    echo "<script>window.location.href='lista_filmes.php'</script>";
}else {
    echo "<script>alert('Filme excluido com sucesso')</script>";
    echo "<script>window.location.href='lista_filmes.php'</script>";
}
?>