$(document).ready(function() {
    $('#formulario').validate({
        rules: {
            nome: "required",
            telefone: { required: true, minlength: 10, maxlength: 11 },
            email: { required: true, email: true },
            mensagem: "required"
        },
        messages: {
            nome: "Por favor, insira seu nome.",
            telefone: {
                required: "Por favor, insira seu telefone",
                minlength: "Telefone deve ter no mínimo 10 dígitos",
                maxlength: "Telefone deve ter no máximo 11 dígitos"
            },
            email: {
                required: "Por favor, insira seu e-mail",
                email: "Por favor, insira um e-mail válido"
            },
            mensagem: "Por favor, digite a mensagem que deseja enviar."
        }
    });
});
