<?php
include('conexao.php');
include('verificacao.php');
include('funcoes.php');

$login = $_SESSION['login'];
$idfilme = $_POST['idfilme'];
verificarEAtualizarStatusPendente($conexao, $login);
verificarLocacaoPendenteEExibirAlerta($conexao, $login);
verificarStatusUsuario($conexao, $login);
$nome_filme = getNomeFilme($conexao, $idfilme);
$ano_filme = getAnoFilme($conexao, $idfilme);
$genero_filme = getGeneroFilme($conexao, $idfilme);
$unidades_filme = getUnidadesFilme($conexao, $idfilme);

?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Filmes</title>
        <link rel="stylesheet" href="style/styleGeral.css">
        <link rel="stylesheet" href="style/editarFilmes.css">
    </head>

    <body>
        <div>
            <form id="editForm" action="editar_filmes_scripting.php" method="post">
<h1>editar filmes</h1>
                <input type="hidden" name="idfilme" value="<?= $idfilme ?>">

                <label>Nome do filme: </label>
                <input type="text" name="nome_filme" value="<?= $nome_filme ?>" readonly><br>

                <label>Ano de lançamento: </label>
                <input type="number" name="ano_lancamento" required placeholder="<?= $ano_filme ?>"><br>

                <label>Genero: </label>
                <input type="text" name="genero" required placeholder="<?= $genero_filme ?>"><br>

                <label>Unidades disponiveis: </label>
                <input type="number" name="unidades_disponiveis" required placeholder="<?= $unidades_filme ?>"><br>
                <!--TODO: Fazer uma função que verifique se há locações para esse filme, se houver ele não deixa editar, 
        mas da a possibilidade de adcionar um novo filme ao catálogo -->
                <button type="submit" onclick="return confirmEdit()">Editar</button>
            </form>
            <a href="lista_filmes.php" onclick="return confirmBack()"><button>Voltar</button></a>
            <script src="funcoes.js"></script>
        </div>
    </body>

    </html>
