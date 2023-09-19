<?php
include('conexao.php');
include('verificacao.php');

$login = $_SESSION['login'];

$informacao_filme = "SELECT * FROM filme";
$resultado = mysqli_query($conexao, $informacao_filme);

//obtendo o tipo de usuário do banco de dados
$select_tipo_usuario = "SELECT id_tipo_usuario FROM login WHERE login = '$login'";

$query_tipo_usuario = mysqli_query($conexao, $select_tipo_usuario);
$dado_tipo_usuario = mysqli_fetch_assoc($query_tipo_usuario);

$id_tipo_usuario = $dado_tipo_usuario['id_tipo_usuario'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Filmes</title>
</head>

<body>
    <h1>Lista de filmes</h1>
    <table border="1">
        <tr>
            <th style="display: none">ID</th> <!-- Coluna ID oculta -->
            <th>Nome</th>
            <th>Ano</th>
            <th>Gênero</th>
            <?php if ($id_tipo_usuario == 1) : ?> <!--Funções do ADM-->
                <th>Excluir Filme do Banco de Dados</th>
                <th>Editar Filme do Banco de dados</th>
            <?php endif; ?>
        </tr>


        <?php if ($resultado->num_rows > 0) : ?>
            <?php while ($row = $resultado->fetch_assoc()) : ?>
                <tbody>
                    <td style="display: none"><?= $row['idfilme'] ?></td>
                    <td><?= $row['nomefilme'] ?></td>
                    <td><?= $row['anofilme'] ?></td>
                    <td><?= $row['genero'] ?></td>
                    <?php if ($id_tipo_usuario == 1) : ?> <!--Funções do ADM-->
                        <td>
                            <form action="deletar_filme.php" method="post">
                                <input type="hidden" name="idfilme" value="<?= $row['idfilme'] ?>">
                                <input type="submit" value="Deletar filme">
                            </form>
                        </td>
                        <td>
                        <form action="editar_filmes.php" method="post">
                                <input type="hidden" name="idfilme" value="<?= $row['idfilme'] ?>">
                                <input type="submit" value="Deletar filme">
                            </form>
                        </td>
                    <?php endif; ?>

                </tbody>
            <?php endwhile ?>
        <?php endif ?>
    </table>
</body>

</html>