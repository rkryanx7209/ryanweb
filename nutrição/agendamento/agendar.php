<?php
// 1. Configurações Iniciais e Conexão
require_once '../conexão/conexao.php';

if (session_status() === PHP_SESSION_NONE) { 
    session_start(); 
}

// Página para onde o usuário volta após o processo
$feedback_page = '../paginas/pagina.html'; 

// 2. Verifica se o acesso veio pelo formulário (POST)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: $feedback_page");
    exit;
}

// 3. Recebimento e Limpeza dos Dados
$nome         = trim($_POST['nome'] ?? '');
$data         = $_POST['data_agendamento'] ?? '';
$horario      = $_POST['horario'] ?? '';
$servico      = trim($_POST['nome_servico'] ?? '');
$telefone     = trim($_POST['telefone'] ?? '');
$idade        = (int)($_POST['idade'] ?? 0);
$genero       = trim($_POST['genero'] ?? '');
$fk_cliente   = null;

// 4. VALIDAÇÃO: Impedir agendamento em data retroativa
$hoje = date('Y-m-d'); 

if ($data < $hoje) {
    echo "<script>
            alert('Você não pode agendar para uma data que já passou!');
            window.location.href = '$feedback_page';
          </script>";
    exit;
}

// 5. Tentativa de Inserção no Banco de Dados
try {
    $sql_insert = "INSERT INTO agenda 
        (nome, data_agendamento, horario, nome_servico, telefone, idade, genero, fk_id_cliente)
        VALUES
        (:nome, :data, :horario, :servico, :telefone, :idade, :genero, :cliente)";

    $stmt = $pdo->prepare($sql_insert);
    
    $stmt->execute([
        ':nome'     => $nome,
        ':data'     => $data,
        ':horario'  => $horario,
        ':servico'  => $servico,
        ':telefone' => $telefone,
        ':idade'    => $idade,
        ':genero'   => $genero,
        ':cliente'  => $fk_cliente
    ]);

    // Define mensagem de sucesso na sessão
    $_SESSION['agendamento_sucesso'] = "Agendamento confirmado com sucesso!";

} catch (PDOException $e) {
    // Caso ocorra erro técnico no banco
    die("Erro crítico ao salvar no banco de dados: " . $e->getMessage());
}

// 6. Redirecionamento Final
header("Location: $feedback_page");
exit;