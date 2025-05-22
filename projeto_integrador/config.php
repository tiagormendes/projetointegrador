<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "monitoramento_e_rastreamento_de_carga";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
 ?>
  
  