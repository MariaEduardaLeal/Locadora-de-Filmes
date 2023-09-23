<?php
$conexao = mysqli_connect('localhost', 'root', '', 'locadorafilmes');
if (!$conexao) {
    echo "Não é possível conectar";
}
?>