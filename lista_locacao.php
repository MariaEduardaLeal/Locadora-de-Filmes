<?php
include('conexao.php');
include('verificacao.php');
include('funcoes.php');

$login = $_SESSION['login'];

//Obtendo o tipo de usuário usando a função
$id_tipo_usuario = getTipoUsuario($conexao, $login);

// Inicialize a consulta SQL comum
$sql = "SELECT al.idaluguel, cl.nomecliente, f.nomefilme, al.dataaluguel, f.idfilme 
        FROM aluguel AS al
        INNER JOIN cliente AS cl ON al.idcliente = cl.idcliente
        INNER JOIN filme AS f ON al.idfilme = f.idfilme";

// Verifique o tipo de usuário e ajuste a consulta SQL conforme necessário
if ($id_tipo_usuario == 2) {
    // Se o usuário for do tipo 2, ajuste a consulta para mostrar apenas suas locações
    $sql .= " WHERE al.idcliente = (SELECT idcliente FROM login WHERE login = '$login')";
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
    <link rel="stylesheet" href="style/styleGeral.css">
</head>

<body>
    <h1>Lista de locações</h1>
    <table border="1">
        <tr>
            <th style="display: none;">ID Aluguel</th>
            <th>Nome do Cliente</th>
            <th>Nome do Filme</th>
            <th>Data de Aluguel</th>
            <?php if ($id_tipo_usuario == 1) : ?> <!--Funções do ADM-->
                <th>Filme devolvido?</th>
                <th>Editar Locação</th>
            <?php endif; ?>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($resultado)) : ?>
            <tr>
                <td style="display: none;"><?= $row['idaluguel'] ?></td>
                <td><?= $row['nomecliente'] ?></td>
                <td><?= $row['nomefilme'] ?></td>
                <td><?= $row['dataaluguel'] ?></td>
                <?php if ($id_tipo_usuario == 1) : ?> <!--Funções do ADM-->
                    <td>
                        <form action="excluir_locacao.php" method="post">
                            <input type="hidden" name="idaluguel" value="<?= $row['idaluguel'] ?>">
                            <input type="submit" value="Excluir Locação" onclick="return confirmaExclusao()">
                        </form>
                    </td>
                    <td>
                        <form action="editar_locacao.php" method="post">
                            <input type="hidden" name="idaluguel" value="<?= $row['idaluguel'] ?>">
                            <input type="hidden" name="idfilme" value="<?= $row['idfilme'] ?>">
                            <input type="hidden" name="nomecliente" value="<?= $row['nomecliente'] ?>">
                            <input type="hidden" name="nomefilme" value="<?= $row['nomefilme'] ?>">
                            <input type="hidden" name="dataaluguel" value="<?= $row['dataaluguel'] ?>">
                            <input type="submit" value="Editar Locação">
                        </form>
                    </td>

                <?php endif; ?>
            </tr>
        <?php endwhile ?>
    </table>
<<<<<<< HEAD
    <button onclick="goBack()">Voltar</button>
=======
    <a href="principal.php">Voltar</a>
>>>>>>> 8874dd3465ba9ca938adf156b5d5c7bb34ba0c40
    <script src="funcoes.js"></script>
</body>

</html>