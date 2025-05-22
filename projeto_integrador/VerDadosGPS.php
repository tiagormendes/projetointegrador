<?php
session_start();
include 'config.php';
include 'auth.php';

if (!isLoggedIn()) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="restrito.css">
</head>
<body>
    <header>
        <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>!</h1>
        <a href="logout.php" class="btn">Sair</a>
    </header>
    
    <div class="dashboard-container">
        <h2>Conteúdo Restrito</h2>
        <p>Esta página só pode ser acessada por usuários autenticados.</p>
    </div>
</body>
</html>