function validateForm() {
    var nome = document.getElementById('nome').value;
    var email = document.getElementById('email').value;
    var telefone = document.getElementById('telefone').value;
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var telefonePattern = /^\d+$/;

    if (nome == "" || email == "" || telefone == "") {
        alert("Todos os campos devem ser preenchidos");
        return false;
    }

    if (!emailPattern.test(email)) {
        alert("Por favor, insira um endereço de email válido");
        return false;
    }

    if (!telefonePattern.test(telefone)) {
        alert("Por favor, insira um número de telefone válido");
        return false;
    }

    return true;
}
