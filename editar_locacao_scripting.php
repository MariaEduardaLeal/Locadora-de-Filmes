<?php
include('conexao.php');
include('verificacao.php');

$idaluguel = $_POST['idaluguel'];
$nomeCliente = $_POST['nomeCliente'];
$idFilmeEscolhido = $_POST['nomeFilme'];
$dataLocacao = $_POST['data'];
$dataEntregaNova = $_POST['data_de_entrega'];
$dataEntregaAntiga = $_POST['dataEntregaAntiga'];

// Verifique se a nova data de entrega é anterior à data de entrega antiga
if (strtotime($dataEntregaNova) < strtotime($dataEntregaAntiga)) {
    // A nova data de entrega é anterior, atualize o status_de_entrega para 2 (Pendente)
    $update_status_pendente = "UPDATE aluguel SET status_de_entrega = 2 WHERE idaluguel = '$idaluguel'";
    $query_update_status = mysqli_query($conexao, $update_status_pendente);

    if (!$query_update_status) {
        echo "<script>alert('Erro ao atualizar o status de entrega para Pendente')</script>";
        echo "<script>window.location.href='lista_locacao.php'</script>";
        exit;
    }
}

// Atualize os outros dados da locação
$update_locacao = "UPDATE aluguel
                    SET idfilme = '$idFilmeEscolhido', dataaluguel = '$dataLocacao', prazo_de_entrega = '$dataEntregaNova'
                    WHERE idaluguel = '$idaluguel'";
$query_update = mysqli_query($conexao, $update_locacao);

if ($query_update) {
    echo "<script>alert('Locação Atualizada')</script>";
    echo "<script>window.location.href='lista_locacao.php'</script>";
} else {
    echo "<script>alert('Locação não pode ser atualizada')</script>";
    echo "<script>window.location.href='lista_locacao.php'</script>";
}
?>
