<?php
include('conexao.php');
include('verificacao.php');

$login = $_SESSION['login'];

// Obtendo o tipo de usuário do banco de dados
$select_tipo_usuario = "SELECT id_tipo_usuario FROM login WHERE login = '$login'";

$query_tipo_usuario = mysqli_query($conexao, $select_tipo_usuario);
$dado_tipo_usuario = mysqli_fetch_assoc($query_tipo_usuario);

$id_tipo_usuario = $dado_tipo_usuario['id_tipo_usuario'];

// Inicialize a consulta SQL comum
$sql = "SELECT * FROM aluguel";

// Verifique o tipo de usuário e ajuste a consulta SQL conforme necessário
if ($id_tipo_usuario == 2) {
    // Se o usuário for do tipo 2, ajuste a consulta para mostrar apenas suas locações
    $sql .= " WHERE idcliente = (SELECT idcliente FROM login WHERE login = '$login')";
}

// Execute a consulta SQL
$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Locação</title>
</head>
<body>
    <h1>Lista de locações</h1>
    <table border="1">
        <tr>
            <th>ID Aluguel</th>
            <th>ID Cliente</th>
            <th>ID Filme</th>
            <th>Data de Aluguel</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($resultado)) : ?>
            <tr>
                <td><?= $row['idaluguel'] ?></td>
                <td><?= $row['idcliente'] ?></td>
                <td><?= $row['idfilme'] ?></td>
                <td><?= $row['dataaluguel'] ?></td>
            </tr>
        <?php endwhile ?>
    </table>
</body>
</html>
