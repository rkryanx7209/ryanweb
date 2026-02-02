<?php
$host = "localhost";
$db   = "daniele"; 
$user = "root";    
$pass = "";        

try {
    // Verifique se o nome das variáveis dentro do parênteses está exatamente assim
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>