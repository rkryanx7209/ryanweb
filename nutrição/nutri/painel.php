<?php
// Proteção da sessão: só inicia se não houver uma ativa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica se a nutricionista está logada
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../acesso/login.php");
    exit();
}

// Opcional: Incluir conexão se precisar buscar o nome do banco
// require_once '../conexão/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel da Nutricionista</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>

    <div class="container-painel">
        <h2>Bem-vinda, Daniele </h2>
        
        <p>
            O que você deseja gerenciar hoje?
        </p>

        <ul class="menu-painel">
            <li>
                <a href="agendamentos.php" class="btn-menu">Ir para agendamentos</a>
            </li>
            <li>
                <a href="avaliacoes.php" class="btn-menu">Ir para avaliações</a>
            </li>
            </ul>

        <div>
            <a href="../paginas/pagina.html" class="link-sair">Sair do Sistema e voltar ao site</a>
        </div>
    </div>

</body>
</html>