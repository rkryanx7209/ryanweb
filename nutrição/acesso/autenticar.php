<?php
session_start();
require_once __DIR__ . '/../conexão/conexao.php';

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

$sql = "SELECT id_admin, nome, senha FROM admin WHERE email = :email LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();

$admin = $stmt->fetch(PDO::FETCH_ASSOC);

if ($admin && $senha === $admin['senha']) {

    $_SESSION['admin_id'] = $admin['id_admin'];
    $_SESSION['admin_nome'] = $admin['nome'];

    header("Location: ../nutri/painel.php");
    exit();

} else {
    $_SESSION['erro'] = "E-mail ou senha inválidos";
    header("Location: login.php");
    exit();
}
