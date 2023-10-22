<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar cliente</title>
    <script type="text/javascript" src="funcoes.js"></script>
    <link rel="stylesheet" href="style/cadastrarCliente.css">

</head>

<body>
    <div class="container">

        <div class="box-one">

            <div id="formulario_de_cadastro">
                

                <form action="cadastrar_cliente_scriptign.php" method="post" onclick="return validateForm()">
                    <h1>Cadastro</h1><br>

                    <div class="form-control">
                        <label for="nome">Nome do usuário</label>
                        <input type="text" name="nome" id="nome" required>
                    </div>

                    <div class="form-control">
                        <label for="login">Login</label>
                        <input type="text" name="login" id="login" required oninput="validateLogin()">
                    </div>

                    <div class="form-control">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" required onkeyup="validatePassword()">
                    </div>

                    <div class="form-control">
                        <label for="confirmarSenha">Confirmar Senha</label>
                        <input type="password" name="confirma" id="confirma" required onkeyup="validatePassword()">
                        <div id="senha-feedback" style="color: red;"></div> <!-- Mensagem de erro -->
                    </div>

                    <div class="form-control">
                        <label for="estado">Estado</label>
                        <input type="text" name="estado" id="estado" required>
                    </div>

                    <div class="form-control">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" id="cidade" required>
                    </div>

                    <div class="form-control">
                        <label for="logradouro">Logradouro</label>
                        <input type="text" name="logradouro" id="logradouro" required>
                    </div>

                    <div class="form-control">
                        <label for="numero">Número</label>
                        <input type="number" name="numero" id="numero" required>
                    </div>

                    <div class="form-control">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" id="bairro" required>
                    </div><br>

                    <div class="button-container">
                        <button type="submit">Cadastrar</button><br>

                    </div>

                </form>

                <div class="button-container">
                    <a href="index.php" onclick="return confirmBack()"><button>Voltar</button></a>
                </div>
            </div>
        </div>
    </div>
    <script src="funcoes.js"></script>
</body>

</html>