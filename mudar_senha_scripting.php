<?php
include('conexao.php');
include('funcoes.php');

$login = $_POST["login"];
$senha = $_POST["senha"];

if ($login == '' || $senha == '') {
    echo "<script>alert('O campo login e senha são obrigatórios')</script>";
    echo "<script>window.location.href='mudar_senha.php'</script>";
} else {
    $verifica_login_existe = "SELECT login FROM login WHERE login = '$login'";
    $query_verificar = mysqli_query($conexao, $verifica_login_existe);

    $dado_login = mysqli_fetch_assoc($query_verificar);
    $verificacao = verificarSeUsuarioExiste($conexao, $login);

    $update_senha = "UPDATE login SET senha = '$senha'
                    WHERE login = '$login'";
    $query_update = mysqli_query($conexao, $update_senha);

    if ($query_update) {
        echo "<script>alert('Senha atualizada com sucesso')</script>";
        echo "<script>window.location.href='index.php'</script>";
    }else {
        echo "<script>alert('Update falhou')</script>";
        echo "<script>window.location.href='mudar_senha.php'</script>";
    }
}
?>