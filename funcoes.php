<?php
//Pega o tipo de usuário
function getTipoUsuario($conexao, $login) {
    $select_tipo_usuario = "SELECT id_tipo_usuario FROM login WHERE login = '$login'";
    $query_tipo_usuario = mysqli_query($conexao, $select_tipo_usuario);
    $dado_tipo_usuario = mysqli_fetch_assoc($query_tipo_usuario);
    return $dado_tipo_usuario['id_tipo_usuario'];
}

//Pega o nome do filme
function getNomeFilme($conexao, $idfilme) {
    $sql = "SELECT nomefilme FROM filme WHERE idfilme = $idfilme";
    $query = mysqli_query($conexao, $sql);
    $dado = mysqli_fetch_assoc($query);
    return $dado['nomefilme'];
}

//Pega o ano do filme
function getAnoFilme($conexao, $idfilme) {
    $sql = "SELECT anofilme FROM filme WHERE idfilme = $idfilme";
    $query = mysqli_query($conexao, $sql);
    $dado = mysqli_fetch_assoc($query);
    return $dado['anofilme'];
}

//Pega o gênero
function getGeneroFilme($conexao, $idfilme) {
    $sql = "SELECT genero FROM filme WHERE idfilme = $idfilme";
    $query = mysqli_query($conexao, $sql);
    $dado = mysqli_fetch_assoc($query);
    return $dado['genero'];
}

//Pega as unidades disponíveis
function getUnidadesFilme($conexao, $idfilme) {
    $sql = "SELECT unidades_disponiveis FROM filme WHERE idfilme = $idfilme";
    $query = mysqli_query($conexao, $sql);
    $dado = mysqli_fetch_assoc($query);
    return $dado['unidades_disponiveis'];
}

function verificarLocacoesFilme($conexao, $idfilme) {
    $sql = "SELECT COUNT(*) as total_locacoes FROM aluguel WHERE idfilme = $idfilme";
    $query = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_assoc($query);
    $total_locacoes = $dados['total_locacoes'];
    
    return $total_locacoes > 0;
}

// Função para criar um campo de seleção com os nomes dos filmes
function criarCampoSelecaoFilmes($conexao, $idfilme) {
    // Consulta para obter os nomes dos filmes do banco de dados
    $consulta_filmes = "SELECT idfilme, nomefilme FROM filme";
    $resultado_filmes = mysqli_query($conexao, $consulta_filmes);

    // Iniciar o campo de seleção
    echo '<select name="nomeFilme" id="nomeFilme">';
    
    while ($row = mysqli_fetch_assoc($resultado_filmes)) {
        $nomeFilme = $row['nomefilme'];
        $idFilme = $row['idfilme'];
        
        // Criar uma opção para cada filme
        echo "<option value=\"$idFilme\"";
        if ($idfilme == $idFilme) {
            echo " selected";
        }
        echo ">$nomeFilme</option>";
    }

    // Fechar o campo de seleção
    echo '</select>';
}

function buscarInformacoesCliente($conexao) {
    // Query SQL
    $informacao_cliente = "SELECT * FROM cliente";
    
    // Executar a consulta
    $resultado = mysqli_query($conexao, $informacao_cliente);
    
    // Verificar se a consulta foi bem-sucedida
    if (!$resultado) {
        die("Erro na consulta: " . mysqli_error($conexao));
    }
    
    // Criar um array para armazenar os resultados
    $clientes = array();
    
    // Loop para obter os resultados e armazená-los no array
    while ($row = mysqli_fetch_assoc($resultado)) {
        $clientes[] = $row;
    }
    
    // Liberar o resultado da consulta
    mysqli_free_result($resultado);
    
    // Retornar o array de clientes
    return $clientes;
}
?>