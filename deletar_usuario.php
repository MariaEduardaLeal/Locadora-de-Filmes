<?php
include('conexao.php');
include('verificacao.php');

$id_cliente = $_POST['idcliente'];
$id_tipo_usuario_logado = $_POST['id_tipo_usuario'];
$nome_tipo_usuario = $_POST['tipo_usuario_tabela'];

$login_usuario_logado = $_SESSION['login']; // Obtém o login do usuário logado

switch ($id_tipo_usuario_logado) {
    case 1:
        //Verifique se o usuário que está sendo excluído é o mesmo que está logado
        $verificar_usuario_logado = "SELECT idcliente FROM login WHERE login = '$login_usuario_logado'";
        $resultado_verificacao = mysqli_query($conexao, $verificar_usuario_logado);

        if (!$resultado_verificacao) {
            echo "<script>alert('Erro ao verificar usuário logado')</script>";
            echo "<script>window.location.href='lista_clientes.php'</script>";
            exit;
        }

        $row_verificacao = mysqli_fetch_assoc($resultado_verificacao);
        $id_cliente_logado = $row_verificacao['idcliente'];

        if ($id_cliente == $id_cliente_logado) {
            echo "<script>alert('Você não pode se auto excluir.')</script>";
            echo "<script>window.location.href='lista_clientes.php'</script>";
            exit;
        }

        // Se não for o mesmo usuário, continue com a exclusão
        $excluir_locacoes = "DELETE FROM aluguel WHERE idcliente = $id_cliente";
        $query_excluir_locacoes = mysqli_query($conexao, $excluir_locacoes);

        $deletar_usuario = "DELETE FROM login WHERE idcliente = $id_cliente";
        $query_deletar = mysqli_query($conexao, $deletar_usuario);

        $retirar_verificacao_de_FK = "SET FOREIGN_KEY_CHECKS = 0";
        $query_FK = mysqli_query($conexao, $retirar_verificacao_de_FK);

        $deletar_cliente = "DELETE FROM cliente WHERE idcliente = $id_cliente";
        $query_deletar_cliente = mysqli_query($conexao, $deletar_cliente);

        if ($query_deletar_cliente) {
            echo "<script>alert('Usuário deletado')</script>";
            echo "<script>window.location.href='lista_clientes.php'</script>";
        } else {
            echo "<script>alert('Algo deu errado')</script>";
            echo "<script>window.location.href='lista_clientes.php'</script>";
        }
        break;

        case 3:
            if ($nome_tipo_usuario == 'adm' || $nome_tipo_usuario == 'funcionario') {
                echo "<script>alert('Você não tem permissão para deletar outros usuários')</script>";
                echo "<script>window.location.href='lista_clientes.php'</script>";
            }
            break;
    
    default:
        echo "<script>alert('Você não tem permissão para deletar outros usuários')</script>";
        echo "<script>window.location.href='lista_clientes.php'</script>";
        break;
}


?>
