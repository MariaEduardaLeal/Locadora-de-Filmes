<<<<<<< HEAD
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

function confirmBack() {
    if (
        confirm("As informações não foram salvas. Deseja voltar sem salvar?")
    ) {
        return true;
    }
    return false;
}
=======
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

>>>>>>> 94185440072ad572c2b6e0722bea741df58e08e0
