<?php
function login($email, $senha) {
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT id_cliente, nome_completo, senha FROM clientes WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();
    
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario_id'] = $usuario['id_cliente'];
        $_SESSION['usuario_nome'] = $usuario['nome_completo'];
        return true;
    }
    
    return false;
}

function isLoggedIn() {
    return isset($_SESSION['usuario_id']);
}

function logout() {
    session_unset();
    session_destroy();
}

function registrar($nome, $email, $senha) {
    global $pdo;
    
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    
    try {
        $stmt = $pdo->prepare("INSERT INTO clientes (nome_completo, email, senha) VALUES (?, ?, ?)");
        $stmt->execute([$nome, $email, $senhaHash]);
        return true;
    } catch (PDOException $e) {
        // Email já cadastrado
        return false;
    }
}
?>