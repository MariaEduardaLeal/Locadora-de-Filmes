<?php
include('conexao.php');
include('verificacao.php');

$idcliente = $_POST['idcliente'];
$novo_tipo_usuario = $_POST['novo_tipo_usuario'];


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
        
?>