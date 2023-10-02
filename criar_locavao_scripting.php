<?php
include('conexao.php');
include('verificacao.php');
$login = $_SESSION['login'];

$idfilme = $_POST['idfilme'];

date_default_timezone_set('America/Sao_Paulo'); // Define o timezone do Brasil
$data_atual = date('Y-m-d H:i:s');

// Calcula a data de entrega, que é 7 dias após a data atual
$data_entrega = date('Y-m-d H:i:s', strtotime($data_atual . ' + 7 days'));

$select_idCliente = "SELECT idcliente FROM login WHERE login = '$login'";

$query_idCliente = mysqli_query($conexao, $select_idCliente);
$dado_idCliente = mysqli_fetch_assoc($query_idCliente);

// Pegou o idcliente da tabela login
$idcliente = $dado_idCliente['idcliente'];

// TODO: Fazer o insert na tabela aluguel
$inserir_valores = "INSERT INTO aluguel(dataaluguel, idcliente, idfilme, prazo_de_entrega, status_de_entrega)
                    VALUES ('$data_atual', '$idcliente', '$idfilme', '$data_entrega', 1)";

                    //INSERT INTO aluguel(dataaluguel, dataentrega, idcliente, idfilme) VALUES ('$data_atual', '$data_entrega', '$idcliente', '$idfilme')";
if (mysqli_query($conexao, $inserir_valores)) {
    // Inserção bem-sucedida
    // TODO: Faça a subtração das unidades disponíveis na tabela filme
    $pegar_unidades = "SELECT unidades_disponiveis FROM filme
                            WHERE idfilme = '$idfilme'";
    $query_unidades = mysqli_query($conexao, $pegar_unidades);
    $dado_unidades = mysqli_fetch_assoc($query_unidades);

    // Pegar as unidades disponíveis
    $unidades_disponiveis = $dado_unidades['unidades_disponiveis'];

    $subtracao_unidades = $unidades_disponiveis - 1;

    $update_unidades = "UPDATE filme SET 
    unidades_disponiveis = $subtracao_unidades
    WHERE idfilme = $idfilme";

    if (mysqli_query($conexao, $update_unidades)) {
        echo "<script>alert('Aluguel confirmado com sucesso, passe hoje na loja para retirar seu filme')</script>";
        echo "<script>window.location.href='lista_filmes.php'</script>";
    } else {
        echo "<script>alert('O aluguel não pode ser realizado')</script>";
        echo "<script>window.location.href='lista_filmes.php'</script>";
    }
} else {
    echo "Não foi possível fazer a locação";
}

?>
