<?php
include('conexao.php');
include('verificacao.php');

$id_usuario = $_POST['idcliente'];

$deletar_usuario = "DELETE FROM login WHERE idcliente = $id_usuario";
$query_deletar = mysqli_query($conexao, $deletar_usuario);

if (!$query_deletar) {
    echo "<script>alert('Algo deu errado')</script>";
    echo "<script>window.location.href='lista_clientes.php'</script>";
}else {
    $deletar_cliente = "DELETE FROM cliente WHERE idcliente = $id_usuario";
    $query_deletar_cliente = mysqli_query($conexao, $deletar_cliente);
    
    if ($query_deletar_cliente) {
        echo "<script>alert('Usuário deletado')</script>";
        echo "<script>window.location.href='lista_clientes.php'</script>";
    }else {
        echo "<script>alert('Algo deu errado')</script>";
        echo "<script>window.location.href='lista_clientes.php'</script>";
    }
}

?>