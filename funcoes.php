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

?>