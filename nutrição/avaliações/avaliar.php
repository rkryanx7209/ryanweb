<?php
require_once '../conexão/conexao.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$feedback_page = '../paginas/pagina.html';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = trim($_POST['nome'] ?? '');
    $comentario = trim($_POST['comentario'] ?? '');
    $nota = (int)($_POST['nota'] ?? 0);

    if (empty($nome) || empty($comentario) || $nota < 1 || $nota > 5) {
        $_SESSION['avaliacao_erro'] = "Preencha todos os campos corretamente.";
        header("Location: $feedback_page");
        exit();
    }

    try {
        $sql = "INSERT INTO avaliacoes (nome, comentario, nota)
                VALUES (:nome, :comentario, :nota)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':comentario', $comentario);
        $stmt->bindParam(':nota', $nota);

        if ($stmt->execute()) {
            $_SESSION['avaliacao_sucesso'] = "Avaliação enviada com sucesso! Obrigada pelo seu feedback.";
        } else {
            $_SESSION['avaliacao_erro'] = "Erro ao salvar avaliação.";
        }

    } catch (PDOException $e) {
        $_SESSION['avaliacao_erro'] = "Erro no sistema. Tente novamente.";
    }

} else {
    $_SESSION['avaliacao_erro'] = "Acesso inválido.";
}

header("Location: $feedback_page");
exit();
