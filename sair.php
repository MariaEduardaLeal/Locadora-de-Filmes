<?php
// Inicia a sessão
session_start();

// Destrói todas as variáveis de sessão
$_SESSION = array();

// Finalmente, destrói a sessão
session_destroy();

// Redireciona o usuário para index.php
header("Location: index.php");
exit();
?>