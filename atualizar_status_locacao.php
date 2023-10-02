<?php 
include('conexao.php');
include('verificacao.php');
include('funcoes.php');

$idfilme = $_POST['idfilme'];
$idaluguel = $_POST['idaluguel'];
$status_entrega = $_POST['status_entrega'];
$prazo_de_entrega = $_POST['prazo_de_entrega'];

switch ($status_entrega) {
    case 1:
        //Não deixa o adm mudar o status para dentro do prazo de o prazo de entrega já estiver passado
        verificarStatusPrazo($prazo_de_entrega);
        $novo_status = 1;
        break;
    case 2:
        //Não deixa o adm mudar o status para pendente se o prazo de entrega não tiver passado
        verificarStatusPendenteData($prazo_de_entrega);
        $novo_status = 2;
        break;
    case 3:
        $novo_status = 3;

        // Atualize as unidades disponíveis na tabela filme
        $idfilme = $_POST['idfilme'];
        $atualizar_unidades_disponiveis = "UPDATE filme SET unidades_disponiveis = unidades_disponiveis + 1 WHERE idfilme = '$idfilme'";
        $query_atualizar_unidades = mysqli_query($conexao, $atualizar_unidades_disponiveis);

        // Se o status for "Entregue", atualize a data de entrega
        $atualizar_data_entrega = "UPDATE aluguel SET prazo_de_entrega = NOW() WHERE idaluguel = '$idaluguel'";
        $query_atualizar_data_entrega = mysqli_query($conexao, $atualizar_data_entrega);

        break;
    default:
        echo "<script>alert('Status de entrega inválido')</script>";
        echo "<script>window.location.href='lista_locacao.php'</script>";
        exit; // Saia do script se o status for inválido
}

// Atualize o status_de_entrega na tabela aluguel
$atualizar_status = "UPDATE aluguel SET status_de_entrega = $novo_status WHERE idaluguel = '$idaluguel'";

if (mysqli_query($conexao, $atualizar_status)) {
    echo "<script>alert('Status de entrega atualizado com sucesso')</script>";
    echo "<script>window.location.href='lista_locacao.php'</script>";
} else {
    echo "<script>alert('Erro ao atualizar o status de entrega')</script>";
    echo "<script>window.location.href='lista_locacao.php'</script>";
}

?>