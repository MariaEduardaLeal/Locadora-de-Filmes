<?php
include('conexao.php');
include('verificacao.php');
include('funcoes.php');

$login = $_SESSION['login'];
$id_tipo_usuario = getTipoUsuario($conexao, $login);

if ($id_tipo_usuario == 2) {
    echo "<script>alert('Você não tem o direito de acessar essa página')</script>";
    echo "<script>window.location.href='principal.php'</script>";
}

verificarEAtualizarStatusPendente($conexao, $login);
verificarLocacaoPendenteEExibirAlerta($conexao, $login);

$informacao_cliente = "SELECT c.idcliente, c.nomecliente, c.logradouro, c.numlogradouro, c.bairro, c.cidade, c.estado, l.id_tipo_usuario, tu.nome AS nome_tipo_usuario
FROM cliente c
LEFT JOIN login l ON c.idcliente = l.idcliente
LEFT JOIN tipo_usuario tu ON l.id_tipo_usuario = tu.id_tipo_usuario";

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
            <th>Tipo de Usuário</th>
            <?php if ($id_tipo_usuario == 1) : ?>
                <th>Alterar Tipo</th>
            <?php endif; ?>
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
                    <td><?= $row["nome_tipo_usuario"] ?></td>
                    <?php if ($id_tipo_usuario == 1) : ?>
                        <td>
                            <form action="atualizar_tipo_usuario.php" method="post">
                                <input type="hidden" name="idcliente" value="<?= $row["idcliente"] ?>">
                                <select name="novo_tipo_usuario">
                                    <option value="1">Administrador</option>
                                    <option value="2">Cliente</option>
                                    <option value="3">Funcionário</option>
                                </select>
                                <input type="submit" value="Atualizar">
                            </form>
                        </td>
                    <?php endif; ?>
                    <td>
                        <form action="deletar_usuario.php" method="post">
                            <input type="hidden" name="idcliente" value="<?= $row["idcliente"] ?>">
                            <input type="hidden" name="id_tipo_usuario" value="<?= $id_tipo_usuario ?>">
                            <input type="hidden" name="tipo_usuario_tabela" value="<?= $row["nome_tipo_usuario"] ?>">
                            <input type="submit" value="Deletar usuário" onclick="return confirmaExclusaoUsuario()">
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else : ?>
            <tr>
                <td colspan='9'>Nenhum cliente encontrado.</td>
            </tr>
        <?php endif; ?>
    </table>
    <a href="principal.php">Voltar</a>

    <script src="funcoes.js"></script>
</body>

</html>