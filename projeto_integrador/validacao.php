<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "monitoramento_e_rastreamento_de_carga";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
$username = $_POST['nome']; // Recebe o nome de usuário do formulário
$password = $_POST['senha']; // Recebe a senha do formulário

$sql = "SELECT * FROM clientes WHERE nome_completo = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Se o usuário for encontrado
    $row = $result->fetch_assoc();
    // Verifica a senha (usando um hash seguro, como bcrypt)
    if (password_verify($password, $row['senha'])) {
        // Login válido
        header("Location: index.html"); // Redireciona para a página inicial
        session_start();
        exit();
        // ...
    } else {
        // Senha incorreta
        header("Location: login.html"); // Redireciona para a página de login
        // ...
    }
} else {
    // Usuário não encontrado
    echo("Usuário não encontrado.");
    // ...
}
 ?>
  
  