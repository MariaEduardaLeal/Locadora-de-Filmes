<?php
include('conexao.php');
include('verificacao.php');
include('funcoes.php');

$idfilme = $_POST['idfilme'];
$unidades_disponiveis = $_POST['unidades_disponiveis'];

if (verificarLocacoesFilme($conexao, $idfilme)) {
     // Há locações para o filme, exiba uma mensagem de aviso e não permita a edição
     echo "<script>alert('Não é possível deletar o filme, pois há locações associadas a ele.')</script>";
     echo "<script>window.location.href='lista_filmes.php'</script>";
}else {
        $retirar_verificacao_de_FK = "SET FOREIGN_KEY_CHECKS = 0";

        $query_FK = mysqli_query($conexao, $retirar_verificacao_de_FK);

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
}
