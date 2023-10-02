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
    <link rel="stylesheet" href="style/styleGeral.css">
    <link rel="stylesheet" href="style/cadastrarFilme.css">
</head>

<body>
    <div class="container">
        <form action="cadastrar_filme_scriptign.php" method="post">
             <h1>Cadastrar Filme</h1>
            <span>Nome do filme</span>
            <input type="text" name="nome" id="nome" required><br>

            <span>Ano</span>
            <input type="text" name="ano" id="ano" required><br>

            <span>Genero</span>
            <input type="text" name="genero" id="genero" required><br>

            <span>Unidades Disponíveis</span>
            <input type="number" name="unidades_disponiveis" id="unidades_disponiveis"><br>

            <button type="submit">Cadastrar</button>

        </form>

        <a href="principal.php" onclick="return confirmBack()"><button>Voltar</button></a>
        <script src="funcoes.js"></script>
    </div>
</body>

</html>