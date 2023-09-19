<?php
include('conexao.php');

// Recupere os dados do formulário
$nomeFilme = $_POST["nome"];
$anoFilme = $_POST["ano"];
$generoFilme = $_POST["genero"];

// Verifique se o filme já existe
$verificar_filme = "SELECT idfilme FROM filme WHERE nomefilme = '$nomeFilme'";
$query_ver_filme = mysqli_query($conexao, $verificar_filme);
$quant_filme = mysqli_num_rows($query_ver_filme);

if ($quant_filme > 0) {
    echo "<script>alert('O filme já está cadastrado.')</script>";
    echo "<script>window.location.href='cadastrar_filme.php'</script>";
} else {
    // Inicie uma transação para garantir a consistência dos dados
    mysqli_begin_transaction($conexao);

    // Insira os dados na tabela "filme"
    $inserirFilme = "INSERT INTO filme (nomefilme, anofilme, genero) 
        VALUES ('$nomeFilme', '$anoFilme', '$generoFilme')";

    $queryInserirFilme = mysqli_query($conexao, $inserirFilme);

    if ($queryInserirFilme) {
        // Commit a transação se tudo estiver correto
        mysqli_commit($conexao);
        echo "<script>alert('Filme cadastrado com sucesso.')</script>";
        echo "<script>window.location.href='cadastrar_filme.php'</script>";
    } else {
        // Rollback em caso de erro na inserção de filme
        mysqli_rollback($conexao);
        echo "<script>alert('Erro ao cadastrar filme.')</script>";
        echo "<script>window.location.href='cadastrar_filme.php'</script>";
    }
}

// Feche a conexão com o banco de dados
mysqli_close($conexao);

?>