<?php
include('conexao.php');
include('verificacao.php');
include('funcoes.php');
$login = $_SESSION['login'];
//obtendo o tipo de usuário do banco de dados
$id_tipo_usuario = getTipoUsuario($conexao, $login);

verificarEAtualizarStatusPendente($conexao, $login);

verificarLocacaoPendenteEExibirAlerta($conexao, $login);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>principal</title>
</head>

<body>
    <h1>Bem vindo, <?php echo $login ?></h1>
    <ul>
        <?php if ($id_tipo_usuario == 1 || $id_tipo_usuario == 3) : ?> <!--Funções do ADM e funcionário-->
            <li><a href="lista_clientes.php">Lista Clientes</a></li>
            <li><a href="cadastrar_filme.php">Cadastrar Filmes</a></li>
            <li><a href="lista_filmes.php">Lista Filmes</a></li>
            <li><a href="lista_locacao.php">Lista Locacao</a></li>

        <?php elseif ($id_tipo_usuario == 2) : ?> <!-- Funções do usuário -->
            <li><a href="lista_filmes.php">Lista Filmes</a></li>
            <li><a href="lista_locacao.php">Lista Locacao</a></li>
        <?php endif; ?>
        <li><a href="sair.php">Sair</a></li>

    </ul>
</body>

</html>