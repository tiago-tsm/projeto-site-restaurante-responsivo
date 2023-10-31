$('#telefone').mask('(00)00000-0000', {
    placeholder: '(00)00000-0000'
});

$('form').validate({
    rules:{
        nome:{
            required:true
        },
        email:{
            required:true,
            email: true
        },
        telefone:{
            required:true
        },
        mensagem:{
            required:true,
        }

    }, messages:{
        nome: 'Por favor, insira o seu nome',
        email:'Por favor, insira seu email',
        telefone:'Por favor, insira  seu telefone'
       }, 
       SubmitHandler: function(form) {
        console.log(form);
       },
       invalidHandler: function(evento, validador){
        let camposIncorretos = validador.numberOfInvalids();
        if(camposIncorretos){
            alert(`Existem ${camposIncorretos} campos incorretos`)

        }
   
     }
})

document.addEventListener("DOMContentLoaded", function() {
    const urlParams = new URLSearchParams(window.location.search);
    const success = urlParams.get("success");
    const error = urlParams.get("error");

    if (success === "1") {
        // Exibe um alerta para o usuário
        alert("Cadastro realizado com sucesso!");
    }

    if (error === "email_exists") {
// Exibe um alerta para o usuário se o e-mail já existir
alert("Já existe um cliente com esse e-mail.");
} else if (error === "other_error") {
// Exibe um alerta para o usuário se ocorrer outro erro
alert("Ocorreu um erro ao cadastrar. Por favor, tente novamente.");
}
});