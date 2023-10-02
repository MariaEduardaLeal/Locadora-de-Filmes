<?php

include('conexao.php');

$login = isset($_POST['login']) ? $_POST['login'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" http-equiv="refresh" content="3;url=principal.php">
    <title>Document</title>
    <link rel="stylesheet" href="style/loading.css">
</head>
<body>
<h1>Carregando...</h1>
<div class="loader"></div>
<form action="autenticar.php" method="post">
    <input type="hidden" name="login" value="<?= $login ?>">
    <input type="hidden" name="senha" value="<?= $senha ?>">
</form>

</body>
</html>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="3;url=principal.php"> 
    <title>Carregando...</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="loading-container">
        <h1>Carregando...</h1>
        <div class="loaderBar"></div>
    </div>
</body>
</html> -->


