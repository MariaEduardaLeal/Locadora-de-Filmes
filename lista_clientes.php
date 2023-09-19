<?php
session_start(); // Inicia a sessão
require('conexao.php');

$login = $_SESSION['login'];

$informacao_cliente = "SELECT * FROM cliente";
$resultado = mysqli_query($conexao, $informacao_cliente);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
</head>

<body>
    <h1>Lista de Clientes</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Logradouro</th>
            <th>Número</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Deletar Usuário</th>
        </tr>

        <?php if ($resultado->num_rows > 0) : ?>
            <?php while ($row = $resultado->fetch_assoc()) : ?>
                <tr>
                    <td><?= $row["idcliente"] ?></td>
                    <td><?= $row["nomecliente"] ?></td>
                    <td><?= $row["logradouro"] ?></td>
                    <td><?= $row["numlogradouro"] ?></td>
                    <td><?= $row["bairro"] ?></td>
                    <td><?= $row["cidade"] ?></td>
                    <td><?= $row["estado"] ?></td>
                    <td>
                        <form action="deletar_usuario.php" method="post">
                            <input type="hidden" name="idcliente" value="<?= $row["idcliente"] ?>">
                            <input type="submit" value="Deletar usuário">
                        </form>

                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else : ?>
            <tr>
                <td colspan='8'>Nenhum cliente encontrado.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>

</html>
<?php
// Feche a conexão com o banco de dados
$conexao->close();
?>