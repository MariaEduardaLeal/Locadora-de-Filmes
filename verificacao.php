<?php
// Verifica se a sessão já foi iniciada
if (session_status() == PHP_SESSION_NONE) {
    // Inicia a sessão
    session_start();
}

// Verifica se a variável de sessão 'user' não está definida
if(!isset($_SESSION['login'])){
    // Redireciona para index.php
    header("Location: index.php");
    exit();
}
?>
