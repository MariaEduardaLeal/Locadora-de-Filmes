<?php
include('conexao.php');
include('verificacao.php');
include('funcoes.php');

$login = $_SESSION['login'];
verificarEAtualizarStatusPendente($conexao, $login);
verificarLocacaoPendenteEExibirAlerta($conexao, $login);

// Obtendo o tipo de usuário usando a função
$id_tipo_usuario = getTipoUsuario($conexao, $login);

// Obtendo o tipo de usuário usando a função
$id_tipo_usuario = getTipoUsuario($conexao, $login);

// Obtendo as locações com base no tipo de usuário
$resultado = getLocacoes($conexao, $login, $id_tipo_usuario);

// Obtendo os valores da tabela 'status'
$resultadoStatus = getStatus($conexao);

// Converta o conjunto de resultados em um array associativo
$statusOptions = array();
while ($statusRow = mysqli_fetch_assoc($resultadoStatus)) {
    $statusOptions[] = $statusRow;
}

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
            <th style="display: none;">ID Aluguel</th>
            <th>Nome do Cliente</th>
            <th>Nome do Filme</th>
            <th>Data de Aluguel</th>
            <th>Status de Entrega</th>
            <th>Data de Devolução</th>
            <?php if ($id_tipo_usuario == 1 || $id_tipo_usuario == 3) : ?> <!--Funções do ADM-->
                <th>Mudar Status</th>
                <th>Editar Locação</th>
                <th>Excluir Locação</th>
            <?php endif; ?>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($resultado)) : ?>
            <tr>
                <td style="display: none;"><?= $row['idaluguel'] ?></td>
                <td><?= $row['nomecliente'] ?></td>
                <td><?= $row['nomefilme'] ?></td>
                <td><?= $row['dataaluguel'] ?></td>
                <td><?= $row['status_entrega'] ?></td>
                <td><?= $row['prazo_de_entrega'] ?></td>
                <?php if ($id_tipo_usuario == 1 || $id_tipo_usuario == 3) : ?> <!--Funções do ADM-->
                    <td>
                        <form action="atualizar_status_locacao.php" method="post">
                            <input type="hidden" name="prazo_de_entrega" value="<?= $row['prazo_de_entrega'] ?>">
                            <input type="hidden" name="idfilme" value="<?= $row['idfilme'] ?>">
                            <input type="hidden" name="idaluguel" value="<?= $row['idaluguel'] ?>">
                            <select name="status_entrega">
                                <?php
                                foreach ($statusOptions as $statusRow) :
                                ?>
                                    <option value="<?= $statusRow['id'] ?>" <?php if ($row['status_entrega'] == $statusRow['id']) echo 'selected' ?>>
                                        <?= $statusRow['status'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <input type="submit" value="Atualizar Status">
                        </form>
                    </td>

                    <td>
                        <form action="editar_locacao.php" method="post">
                            <input type="hidden" name="idaluguel" value="<?= $row['idaluguel'] ?>">
                            <input type="hidden" name="idfilme" value="<?= $row['idfilme'] ?>">
                            <input type="hidden" name="nomecliente" value="<?= $row['nomecliente'] ?>">
                            <input type="hidden" name="nomefilme" value="<?= $row['nomefilme'] ?>">
                            <input type="hidden" name="dataaluguel" value="<?= $row['dataaluguel'] ?>">
                            <input type="hidden" name="dataentrega" value="<?= $row['prazo_de_entrega'] ?>">
                            <input type="submit" value="Editar Locação">
                        </form>
                    </td>

                    <td>
                        <form action="excluir_locacao.php" method="post">
                            <input type="hidden" name="idaluguel" value="<?= $row['idaluguel'] ?>">
                            <input type="hidden" name="idfilme" value="<?= $row['idfilme'] ?>">
                            <input type="submit" value="Excluir Locação" onclick="return confirmaExclusao()">
                        </form>
                    </td>


                <?php endif; ?>
            </tr>
        <?php endwhile ?>
    </table>
    <a href="principal.php">Voltar</a>
    <script src="funcoes.js"></script>
</body>

</html>