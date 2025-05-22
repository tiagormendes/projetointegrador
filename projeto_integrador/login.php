<?php
session_start();
include 'config.php';
include 'auth.php';

if (isLoggedIn()) {
    header('Location: dashboard.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    
    if (login($email, $senha)) {
        header('Location: dashboard.php');
        exit;
    } else {
        $erro = "Email ou senha incorretos!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
   <div class="login-container">
        <h1>Login</h1>
        
        <?php if (isset($erro)): ?>
            <div class="alert alert-danger"><?php echo $erro; ?></div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            
            <button type="submit" class="btn">Entrar</button>
        </form>
        
        <p>Não tem uma conta? <button id="btnCadastrar">Cadastre-se</button></p>

        <script>
            document.getElementById('btnCadastrar').addEventListener('click', function() {
            fetch('http://localhost:3306/telaCadastroCliente', {
                method: 'POST'
            })
            .then(response => response.text())
            .then(data => console.log(data))
            .catch(error => console.error('Erro:', error));
        });
        </script>
    </div>
</body>
</html>