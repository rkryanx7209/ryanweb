<?php
// Proteção de Sessão Inteligente
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica se está logada
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../acesso/login.php");
    exit();
}

require_once '../conexão/conexao.php';

// Busca os agendamentos
// Ordena pela data mais próxima (ASC) e pelo horário mais cedo
$sql = "SELECT * FROM agenda ORDER BY data_agendamento ASC, horario ASC";
$stmt = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamentos - Nutricionista</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>

    <div class="container-painel">
        <h2>Próximos Agendamentos</h2>

        <div class="lista-scroll">
            <?php 
            $tem_agenda = false;
            while ($a = $stmt->fetch()): 
                $tem_agenda = true;
            ?>
                <div class="card-agendamento">
                    <div class="agenda-info">
                        <strong><?= htmlspecialchars($a['nome']); ?></strong>
                        <span class="servico-tag"><?= htmlspecialchars($a['nome_servico']); ?></span>
                    </div>
                    
                    <div class="agenda-detalhes">
                        <span> <?= date('d/m/Y', strtotime($a['data_agendamento'])); ?></span>
                        <span> <?= $a['horario']; ?></span>
                    </div>
                </div>
            <?php endwhile; ?>

            <?php if (!$tem_agenda): ?>
                <p >Nenhum agendamento encontrado.</p>
            <?php endif; ?>
        </div>

        <div>
            <a href="painel.php" class="btn-menu">Voltar ao Painel</a>
        </div>
    </div>

</body>
</html>