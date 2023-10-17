<?php
include('conexao.php');
include('funcoes.php');
include('verificacao.php');

$login = $_SESSION['login'];
$id_tipo_usuario = getTipoUsuario($conexao, $login);

$idcliente = $_POST["idcliente"];
$novoStatusCliente = $_POST["novo_status_cliente"];
$tipo_usuario_tabela = $_POST['tipo_usuario_tabela'];
$temPermissaoParaEditar = verificarPermissaoParaEditar($id_tipo_usuario, $tipo_usuario_tabela);

if (!$temPermissaoParaEditar) {
    echo "<script>alert('Você não tem permissão para editar essas informações')</script>";
    echo "<script>window.location.href='lista_clientes.php'</script>";
}else {
    // Validar se o novoStatusCliente é 'ativo' ou 'inativo' para evitar possíveis ataques.
    if ($novoStatusCliente != 'ativo' && $novoStatusCliente != 'inativo') {
        echo "Status inválido.";
        exit;
    }

    // Atualizar o status do cliente no banco de dados.
    $atualizarStatusCliente = "UPDATE cliente SET status = '$novoStatusCliente' WHERE idcliente = $idcliente";

    if (mysqli_query($conexao, $atualizarStatusCliente)) {
        echo "<script>alert('Status do cliente atualizado com sucesso.')</script>";
        echo "<script>window.location.href='lista_clientes.php'</script>";
    } else {
        echo "<script>alert('Algo deu errado')</script>";
        echo "<script>window.location.href='lista_clientes.php'</script>";
    }
}

?>