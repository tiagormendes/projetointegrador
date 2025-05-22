<?php
    // Inicialize a sessão
    session_start();
    include 'auth.php';
    
    logout();
    header("location:login.php");
    exit;
?>