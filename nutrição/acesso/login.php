<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Área Restrita</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>

<div class="login-box">
    <h2>Área da Nutricionista</h2>

    <form action="autenticar.php" method="POST">
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="senha" placeholder="Senha" required>

        <?php 
        // Verifica se existe erro na sessão 'erro_login' ou apenas 'erro'
        if (!empty($_SESSION['erro_login'])): ?>
            <div class="erro-login">
                <?= $_SESSION['erro_login']; ?>
            </div>
        <?php unset($_SESSION['erro_login']); endif; ?>

        <?php if (!empty($_SESSION['erro'])): ?>
            <div class="erro-login">
                <?= $_SESSION['erro']; ?>
            </div>
        <?php unset($_SESSION['erro']); endif; ?>

        <div class="botoes-login">
            <button type="submit" class="btn-entrar">Entrar</button>
            <a href="../paginas/pagina.html" class="btn-voltar">Voltar ao site</a>
        </div>
    </form>
</div>

</body>
</html>