function mostrarOcultarSenha() {
    var senhaInput = document.getElementById("senha");
    if (senhaInput.type === "password") {
        senhaInput.type = "text";
    } else {
        senhaInput.type = "password";
    }
}

 //Verifica se o login tem espaços entre os caracteres e os remove
 function validateLogin() {
    var loginInput = document.getElementById("login");
    var loginFeedback = document.getElementById("login-feedback");
    var login = loginInput.value;

    if (login.includes(" ")) {
        loginInput.value = login.replace(/\s/g, ""); // Remover espaços
        loginFeedback.textContent = "O login não pode conter espaços. Espaços removidos automaticamente.";
        loginInput.style.backgroundColor = "lightcoral";

    } else {
        loginFeedback.textContent = "";
        loginInput.style.backgroundColor = "lightgreen";
    }
}

 //Verifica se o campo nome está em branco ou preenchido
 function validateNome() {
    var nomeInput = document.getElementById("nome");
    var nomeFeedback = document.getElementById("nome-feedback");
    var nome = nomeInput.value;

    if (nome.trim() === "") {
        nomeFeedback.textContent = "O campo de nome não pode estar em branco.";
        nomeInput.style.backgroundColor = "lightcoral";
    } else {
        nomeFeedback.textContent = "";
        nomeInput.style.backgroundColor = "lightgreen";
    }
}
 //Quando selecionado mostra a senha que o usuário digitou
 function mostrarOcultarSenha() {
    let senha = document.getElementById("senha");
    if (senha.type == "password") {
        senha.type = "text";
    } else {
        senha.type = "password";
    }
}

//Valida a senha se ela é igual a confirmar senha 
function validatePassword() {
    var senhaInput = document.getElementById("senha");
    var confirmaInput = document.getElementById("confirma");
    var senhaFeedback = document.getElementById("senha-feedback");
    var confirmaFeedback = document.getElementById("confirma-feedback");

    var senha = senhaInput.value;
    var confirmaSenha = confirmaInput.value;

    if (senha === confirmaSenha) {
        senhaInput.style.backgroundColor = "lightgreen";
        confirmaInput.style.backgroundColor = "lightgreen";
        senhaFeedback.textContent = "";
        confirmaFeedback.textContent = "";
    } else {
        senhaInput.style.backgroundColor = "lightcoral";
        confirmaInput.style.backgroundColor = "lightcoral";
        senhaFeedback.textContent = "As senhas não coincidem. Por favor, verifique novamente.";
        confirmaFeedback.textContent = "As senhas não coincidem. Por favor, verifique novamente.";
    }
}

function validateForm() {
    var inputs = document.querySelectorAll("input");
    var invalidFields = false;

    inputs.forEach(function (input) {
        if (input.style.backgroundColor === "lightcoral") {
            invalidFields = true;
        }
    });

    if (invalidFields) {
        return false; // Cancela o envio do formulário
    }

    return true; // Permite o envio do formulário
}

function confirmEdit(){
    if (
        confirm("Ao alterar os dados você não terá mais acesso aos dados antigos. Deseja mesmo continuar com a exclusão?")
    ) {
        return true;
    }
    return false;
}

function confirmBack() {
    if (
        confirm("As informações não foram salvas. Deseja voltar sem salvar?")
    ) {
        return true;
    }
    return false;
}

function confirmaExclusao() {
    var confirmacao = confirm("As informações excluídas serão apagadas do banco de dados e não poderão ser recuperadas. Deseja mesmo excluir esses dados?");

    if (confirmacao) {
        return true;
    } else {
        return false;
    }
}

function formatarData() {
    const dataInput = document.getElementById('data');
    const inputData = dataInput.value.trim();

    // Expressão regular para verificar o formato da data
    const regexData = /^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/;

    if (regexData.test(inputData)) {
        // A data já está no formato esperado, não é necessário fazer nada
    } else {
        alert('Formato de data inválido. Use o formato "YYYY-MM-DD HH:MM:SS".');
        event.preventDefault(); // Impede o envio do formulário
    }
}

function editarComConfirmacao() {
    formatarData(); // Chama a primeira função
    return confirmEdit(); // Chama a segunda função e retorna o resultado
}

function goBack() {
    window.history.back();
}