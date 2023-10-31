<?php
// Inicie a sessão aqui, se necessário
session_start();

// Dados de conexão
$host = 'localhost';
$user = 'tsmdeb72_cadastro';
$password = '120756@Ti';
$database = 'tsmdeb72_clientes';

// Conectando ao banco de dados
$conexao = mysqli_connect($host, $user, $password, $database);

if (!$conexao) {
    die("Erro de conexão com o banco de dados: " . mysqli_connect_error());
}

// Definindo o charset
mysqli_set_charset($conexao, 'utf8');

// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO
$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$mensagem = $_POST["mensagem"];

// Gravando no banco de dados
$verificaEmail = "SELECT * FROM cliente WHERE email = '$email'";
$result = mysqli_query($conexao, $verificaEmail);

if (mysqli_num_rows($result) > 0) {
    header("Location: index.html?error=email_exists");
} else {
    // Gravar no banco de dados
    $query = "INSERT INTO `cliente` (`nome`, `email`, `telefone`, `mensagem`) VALUES ('$nome', '$email', '$telefone', '$mensagem')";

    if (mysqli_query($conexao, $query)) {
        // Redireciona para index.html
        header("Location: index.html?success=1");
        exit; // Encerra a execução do script após o redirecionamento
    } else {
        header("Location: index.html?error=other_error");
    }
}

// Feche a conexão
mysqli_close($conexao);
?>