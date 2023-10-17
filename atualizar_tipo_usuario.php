<?php
include('conexao.php');
include('verificacao.php');
include('funcoes.php');

$login = $_SESSION['login'];
$id_tipo_usuario = getTipoUsuario($conexao, $login);

$idcliente = $_POST['idcliente'];
$novo_tipo_usuario = $_POST['novo_tipo_usuario'];
$tipo_usuario_tabela = $_POST['tipo_usuario_tabela'];
$temPermissaoParaEditar = verificarPermissaoParaEditar($id_tipo_usuario, $tipo_usuario_tabela);

if (!$temPermissaoParaEditar) {
    echo "<script>alert('Você não tem permissão para editar essas informações')</script>";
    echo "<script>window.location.href='lista_clientes.php'</script>";
}else {
    $atualizar_tipo_usuario = "UPDATE login 
                  SET id_tipo_usuario = '$novo_tipo_usuario'
                  WHERE idcliente = '$idcliente'";
    $query_atualizar = mysqli_query($conexao, $atualizar_tipo_usuario);

    if ($query_atualizar) {
        echo "<script>alert('Status atualizado com sucesso')</script>";
        echo "<script>window.location.href='lista_clientes.php'</script>";
    }else{
        echo "<script>alert('Status não pode ser atualizado')</script>";
        echo "<script>window.location.href='lista_clientes.php'</script>";
    }
}

        
?>