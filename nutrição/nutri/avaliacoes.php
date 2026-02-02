<?php
// Organização da Sessão
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Proteção de Acesso
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../acesso/login.php");
    exit();
}

// Conexão e Busca de Dados
require_once '../conexão/conexao.php';

// SQL simples para evitar erros de coluna inexistente
$sql = "SELECT * FROM avaliacoes";
$stmt = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliações - Área Restrita</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>

    <div class="container-painel">
        <h2>Avaliações Recebidas</h2>

        <div class="lista-avaliacoes">
            <?php 
            $count = 0;
            while ($v = $stmt->fetch()): 
                $count++;
            ?>
                <div class="card-comentario">
                    <div class="card-header">
                        <strong><?= htmlspecialchars($v['nome']); ?></strong>
                        <span class="nota-tag"> <?= $v['nota']; ?>/5</span>
                    </div>
                    <p class="texto-comentario"><?= htmlspecialchars($v['comentario']); ?></p>
                </div>
            <?php endwhile; ?>

            <?php if ($count === 0): ?>
                <p style="opacity: 0.6;">Nenhuma avaliação disponível.</p>
            <?php endif; ?>
        </div>

        <div class="footer-avaliacoes">
            <a href="painel.php" class="btn-menu">Voltar ao Painel</a>
        </div>
    </div>

</body>
</html>