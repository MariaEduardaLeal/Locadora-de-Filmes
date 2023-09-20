<?php
//Pega o tipo de usuário
function getTipoUsuario($conexao, $login) {
    $select_tipo_usuario = "SELECT id_tipo_usuario FROM login WHERE login = '$login'";
    $query_tipo_usuario = mysqli_query($conexao, $select_tipo_usuario);
    $dado_tipo_usuario = mysqli_fetch_assoc($query_tipo_usuario);
    return $dado_tipo_usuario['id_tipo_usuario'];
}

?>