<?php
include('conexao.php');
include('verificacao.php');


$idcliente = $_POST['idcliente'];
$nomeCliente = $_POST['nomeCliente'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$logradouro = $_POST['logradouro'];
$numlogradouto = $_POST['numlogradouro'];
$bairro = $_POST['bairro'];

$atualizarInfoCliente = "UPDATE cliente
                         SET nomecliente = '$nomeCliente',
                             estado = '$estado',
                             cidade = '$cidade',
                             logradouro = '$logradouro',
                             numlogradouro = '$numlogradouto',
                             bairro = '$bairro'
                         WHERE idcliente = $idcliente";


$resultado = mysqli_query($conexao, $atualizarInfoCliente);

if ($resultado) {
    // O UPDATE foi bem-sucedido
    echo "<script>alert('Informações do cliente atualizadas com sucesso.')</script>";
    echo "<script>window.location.href='lista_clientes.php'</script>";
} else {
    // Ocorreu um erro durante o UPDATE
    echo "<script>alert('Erro ao atualizar informações do cliente.')</script>";
    echo "<script>window.location.href='lista_clientes.php'</script>";
}


?>