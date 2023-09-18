<?php
include('conexao.php');

$login = isset($_POST['login'])? $_POST['login'] : '';
$senha = isset($_POST['senha'])? $_POST['senha']:'';

if ($login == '' && $senha == '') {
    echo "<script>alert('O campo login e senha são obrigatórios')</script>";
    echo "<script>window.location.href='index.php'</script>";
}else {
    $select = "SELECT login, senha FROM login
    WHERE login = '$login' AND senha = '$senha'";

    $query_selecionar = mysqli_query($conexao, $select);
    $dado = mysqli_fetch_row($query_selecionar);

    if($login == isset($dado[0]) && $senha == isset($dado[1])){
        session_start();
        $_SESSION['login'] = $dado[0];
        header("location: principal.php");
    }else{
        echo "<script>alert('Login ou senha inválidos')</script>";
        echo "<script>window.location.href='login.php'</script>";
    }
}
?>