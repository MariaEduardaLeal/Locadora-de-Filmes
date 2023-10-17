<?php
include('conexao.php');
include('verificacao.php');
include('funcoes.php');
$login = $_SESSION['login'];
//obtendo o tipo de usuário do banco de dados
$id_tipo_usuario = getTipoUsuario($conexao, $login);

verificarEAtualizarStatusPendente($conexao, $login);

verificarLocacaoPendenteEExibirAlerta($conexao, $login);

verificarStatusUsuario($conexao, $login);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>principal</title>
    <link rel="stylesheet" href="style/styleGeral.css">
    <link rel="stylesheet" href="style/principal.css">
</head>

<body>
    <div class="central"></div>
    <h1>Bem vindo(a), <?php echo $login ?></h1>

    <ul>
        <?php if ($id_tipo_usuario == 1 || $id_tipo_usuario == 3) : ?> <!--Funções do ADM e funcionário-->
            <li><a class="link" href="lista_clientes.php">Lista Clientes</a></li>
            <li><a class="link1" href="cadastrar_filme.php">Cadastrar Filmes</a></li>
            <li><a class="link2" href="lista_filmes.php">Lista Filmes</a></li>
            <li><a class="link3" href="lista_locacao.php">Lista Locacao</a></li>

        <?php elseif ($id_tipo_usuario == 2) : ?> <!-- Funções do usuário -->
            <li><a class="link4" href="lista_filmes.php">Lista Filmes</a></li>
            <li><a class="link5" href="lista_locacao.php">Lista Locacao</a></li>
        <?php endif; ?>
    </ul>    
    </div>
    <div>
    <a href="index.php"><button>Sair</button></a>
    <script src="funcoes.js"></script>
    </div>
    
</body>

</html>