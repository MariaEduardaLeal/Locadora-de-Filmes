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


$idcliente = $_POST['idcliente'];
$nomeCliente = $_POST['nomeCliente'];
$logradouro = $_POST['logradouro'];
$numlogradouto = $_POST['numlogradouro'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$tipo_usuario_tabela = $_POST['tipo_usuario_tabela'];

$temPermissaoParaEditar = verificarPermissaoParaEditar($id_tipo_usuario, $tipo_usuario_tabela);

if (!$temPermissaoParaEditar) {
    echo "<script>alert('Você não tem permissão para editar essas informações')</script>";
    echo "<script>window.location.href='lista_clientes.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cadastro</title>
</head>
<body>
    <form action="editar_cadastro_usuario_scripting.php" method="post">
        <input type="hidden" name="idcliente" value="<?= $idcliente ?>">
        <label>Nome:</label><br>
        <input type="text" name="nomeCliente" value="<?= $nomeCliente ?>"><br>
        <label>Estado:</label><br>
        <input type="text" name="estado" value="<?= $estado ?>"><br>
        <label>Cidade:</label><br>
        <input type="text" name="cidade" value="<?= $cidade ?>"><br>
        <label>Logradouro:</label><br>
        <input type="text" name="logradouro" value="<?= $logradouro ?>"><br>
        <label>Número do logradouro:</label><br>
        <input type="num" name="numlogradouro" value="<?= $numlogradouto ?>"><br>
        <label>Bairro:</label><br>
        <input type="text" name="bairro" value="<?= $bairro ?>"><br>
        <input type="submit" value="Editar" onclick="return confirmEdit()">
    </form>
    <a href="lista_clientes.php" onclick="return confirmBack()">Voltar</a>
    <script src="funcoes.js"></script>
</body>
</html>