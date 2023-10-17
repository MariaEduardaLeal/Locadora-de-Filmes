<?php

function verificarSeUsuarioExiste($conexao, $login){
    $verifica_login_existe = "SELECT login FROM login WHERE login = '$login'";
    $query_verificar = mysqli_query($conexao, $verifica_login_existe);
    
    if ($query_verificar->num_rows>0) {
        $dado_login = mysqli_fetch_assoc($query_verificar);
        return $dado_login['login'];
    }else {
        echo "<script>alert('Login não encontrado')</script>";
        echo "<script>window.location.href='mudar_senha.php'</script>";
    }

}

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

// Função para obter locações com base no tipo de usuário
function getLocacoes($conexao, $login, $id_tipo_usuario) {
    $sql = "SELECT al.idaluguel, cl.nomecliente, f.nomefilme, al.dataaluguel, s.status AS status_entrega, al.prazo_de_entrega, f.idfilme 
            FROM aluguel AS al
            INNER JOIN cliente AS cl ON al.idcliente = cl.idcliente
            INNER JOIN filme AS f ON al.idfilme = f.idfilme
            INNER JOIN status AS s ON al.status_de_entrega = s.id";

    // Verifique o tipo de usuário e ajuste a consulta SQL conforme necessário
    if ($id_tipo_usuario == 2) {
        // Se o usuário for do tipo 2, ajuste a consulta para mostrar apenas suas locações
        $sql .= " WHERE al.idcliente = (SELECT idcliente FROM login WHERE login = '$login')";
    }

    $resultado = mysqli_query($conexao, $sql);

    return $resultado;
}

// Função para obter os valores da tabela 'status'
function getStatus($conexao) {
    $sqlStatus = "SELECT id, status FROM status";
    $resultadoStatus = mysqli_query($conexao, $sqlStatus);

    return $resultadoStatus;
}

function verificarStatusPendenteData($prazo_de_entrega) {
    // Calcula a diferença entre o prazo de entrega e a data atual
    $data_atual = date('Y-m-d H:i:s');
    $diferenca = strtotime($prazo_de_entrega) - strtotime($data_atual);
    $calculoDiasFaltam = ceil($diferenca / (60 * 60 * 24)); // Calcula o número de dias faltantes

    if ($calculoDiasFaltam > 0) {
        echo "<script>alert('Você não pode mudar o status do cliente para pendente, ele ainda tem $calculoDiasFaltam dia(s) para poder realizar a entrega')</script>";
        echo "<script>window.location.href='lista_locacao.php'</script>";
        exit;
    }
}

function verificarStatusPrazo($prazo_de_entrega)
{
    // Verifique se a data atual é posterior ao prazo de entrega
    $data_atual = date('Y-m-d');
    
    if ($data_atual > $prazo_de_entrega) {
        echo "<script>alert('O prazo de entrega já passou')</script>";
        echo "<script>window.location.href='lista_locacao.php'</script>";
        exit; // Saia do script se o prazo já passou
    }
}

function verificarLocacaoPendenteEExibirAlerta($conexao, $login) {
    // Consulta SQL para verificar se o usuário tem uma locação pendente
    $query = "SELECT aluguel.status_de_entrega
              FROM login
              INNER JOIN aluguel ON login.idcliente = aluguel.idcliente
              WHERE login.login = '$login'
              AND aluguel.status_de_entrega = 2";

    $resultado = mysqli_query($conexao, $query);

    if (mysqli_num_rows($resultado) > 0) {
        // O usuário tem uma locação pendente, exibir alerta e redirecionar
        echo "<script>alert('Você tem uma locação pendente, portanto você não tem mais acesso ao sistema. Devolva o filme na locadora e seu acesso será permitido novamente.')</script>";
        echo "<script>window.location.href='sair.php'</script>";
        exit; // Saia da função após exibir o alerta
    }
}

function verificarEAtualizarStatusPendente($conexao, $login){
    // Obtém a data atual
    $dataAtual = date('Y-m-d');

    // Consulta para obter todos os aluguéis do usuário com status "Dentro do Prazo"
    $query = "SELECT idaluguel, prazo_de_entrega FROM aluguel
              INNER JOIN login ON aluguel.idcliente = login.idcliente
              WHERE login.login = '$login'
              AND status_de_entrega = 1"; // Status "Dentro do Prazo"

    $resultado = mysqli_query($conexao, $query);

    while ($row = mysqli_fetch_assoc($resultado)) {
        $idaluguel = $row['idaluguel'];
        $prazoDeEntrega = $row['prazo_de_entrega'];

        // Verifica se a data atual é um dia após o prazo de entrega
        $umDiaDepoisPrazo = date('Y-m-d', strtotime($prazoDeEntrega . ' + 1 day'));

        if ($dataAtual > $umDiaDepoisPrazo) {
            // Atualiza o status para "Pendente" (status 2)
            $atualizarStatus = "UPDATE aluguel SET status_de_entrega = 2 WHERE idaluguel = '$idaluguel'";
            mysqli_query($conexao, $atualizarStatus);
        }
    }
}
function verificarPermissaoParaEditar($id_tipo_usuario, $tipo_usuario_tabela) {
    // Se o id_tipo_usuario for 1 (adm), ele pode editar qualquer tipo de usuário (2 ou 3)
    if ($id_tipo_usuario == 1) {
        return true;
    }
    
    // Se o id_tipo_usuario for 3 (funcionario), ele só pode editar se o tipo_usuario_tabela for 2 (cliente)
    if ($id_tipo_usuario == 3 && $tipo_usuario_tabela == 'cliente') {
        return true;
    }
    
    // Caso contrário, não tem permissão para editar
    return false;
}

function verificarStatusUsuario($conexao, $login)
{
    // Consulta SQL para obter o status do usuário com base no login
    $consultaStatus = "SELECT c.status
                       FROM cliente c
                       INNER JOIN login l ON c.idcliente = l.idcliente
                       WHERE l.login = '$login'";

    $resultado = mysqli_query($conexao, $consultaStatus);

    if ($resultado && $resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $status = $row['status'];

        if ($status === 'inativo') {
            // Se o status for "inativo", redirecione o usuário ou execute a lógica desejada.
            echo "<script>alert('Sua conta está inativa. Entre em contato com o suporte.')</script>";
            echo "<script>window.location.href='sair.php'</script>"; // Redireciona o usuário para a página de logout ou outra página adequada.
            exit;
        }
    }
}


?>