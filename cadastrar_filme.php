<?php
include('conexao.php');
include('funcoes.php');
include('verificacao.php');
$login = $_SESSION['login'];
verificarEAtualizarStatusPendente($conexao, $login);
verificarLocacaoPendenteEExibirAlerta($conexao, $login);

$id_tipo_usuario = getTipoUsuario($conexao, $login);

if ($id_tipo_usuario == 2) {
    echo "<script>alert('Você não tem o direito de acessar essa página')</script>";
    echo "<script>window.location.href='principal.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Filme</title>
</head>

<body>
    <form action="cadastrar_filme_scriptign.php" method="post">

        <span>Nome do filme</span>
        <input type="text" name="nome" id="nome" required><br>

        <span>Ano</span>
        <input type="text" name="ano" id="ano" required><br>

        <span>Genero</span>
        <input type="text" name="genero" id="genero" required><br>

        <span>Unidades Disponíveis</span>
        <input type="number" name="unidades_disponiveis" id="unidades_disponiveis"><br>

        <input type="submit" value="Cadastrar">

    </form>

    <a href="principal.php">Voltar</a>

</body>

</html>