<?php
include('conexao.php');

$login = isset($_POST['login']) ? $_POST['login'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

if ($login == '' || $senha == '') {
    echo "<script>alert('O campo login e senha são obrigatórios')</script>";
    echo "<script>window.location.href='index.php'</script>";
} else {
    // Use prepared statements para evitar injeção SQL
    $select = "SELECT login, senha FROM login WHERE login = ? AND senha = ?";
    $stmt = mysqli_prepare($conexao, $select);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $login, $senha);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $dbLogin, $dbSenha);
        mysqli_stmt_fetch($stmt);

        if ($login == $dbLogin && $senha == $dbSenha) {
            session_start();
            $_SESSION['login'] = $dbLogin;
            header("location: principal.php");
        } else {
            echo "<script>alert('Login ou senha inválidos')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Erro na consulta SQL')</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
}
?>
