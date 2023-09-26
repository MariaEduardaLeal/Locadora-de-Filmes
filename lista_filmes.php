<?php
include('conexao.php');
include('verificacao.php');
include('funcoes.php');

$login = $_SESSION['login'];
verificarEAtualizarStatusPendente($conexao, $login);
verificarLocacaoPendenteEExibirAlerta($conexao, $login);

$informacao_filme = "SELECT * FROM filme";
$resultado = mysqli_query($conexao, $informacao_filme);

//obtendo o tipo de usuário do banco de dados
$id_tipo_usuario = getTipoUsuario($conexao, $login);

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
            <th>Unidades disponiveis</th>
            <?php if ($id_tipo_usuario == 1 || $id_tipo_usuario == 3) : ?> <!--Funções do ADM-->
                <th>Excluir Filme do Banco de Dados</th>
                <th>Editar Filme do Banco de dados</th>
            <?php endif; ?>
            
            <th>Criar Locação</th>
        </tr>


        <?php if ($resultado->num_rows > 0) : ?>
            <?php while ($row = $resultado->fetch_assoc()) : ?>
                <tbody>
                    <td style="display: none"><?= $row['idfilme'] ?></td>
                    <td><?= $row['nomefilme'] ?></td>
                    <td><?= $row['anofilme'] ?></td>
                    <td><?= $row['genero'] ?></td>
                    <td><?= $row['unidades_disponiveis'] ?></td>
                    <?php if ($id_tipo_usuario == 1 || $id_tipo_usuario == 3) : ?> <!--Funções do ADM-->
                        <td>
                            <form action="deletar_filme.php" method="post" onsubmit="return confirmarExclusao()">
                                <input type="hidden" name="idfilme" value="<?= $row['idfilme'] ?>">
                                <input type="hidden" name="unidades_disponiveis" value="<?= $row['unidades_disponiveis'] ?>">
                                <input type="submit" value="Deletar filme">
                            </form>
                        </td>
                        <td>
                        <form action="editar_filmes.php" method="post">
                                <input type="hidden" name="idfilme" value="<?= $row['idfilme'] ?>">
                                <input type="submit" value="Editar filme">
                            </form>
                        </td>
                    <?php endif; ?>
                        <td>
                            <form action="criar_locavao_scripting.php" method="post">
                                <input type="hidden" name="idfilme" value="<?= $row['idfilme'] ?>">
                                <input type="hidden" name="unidades_disponiveis" value="<?= $row['unidades_disponiveis'] ?>">
                                <input type="submit" value="Alugar" <?php if ($row['unidades_disponiveis'] <= 0) echo 'style="display: none"'; ?>>
                            </form>
                            <p <?php if ($row['unidades_disponiveis'] > 0) echo 'style="display:none"'; ?>>Unidades indisponíveis</p>
                        </td>
                </tbody>
            <?php endwhile ?>
        <?php endif ?>
    </table>
    <a href="principal.php">Voltar</a>
    <script src="funcoes.js"></script>
</body>

</html>