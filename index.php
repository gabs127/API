<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <div class="login-container">
        <h2>LOGIN</h2>
        <form action="sistema_login/processa_login.php" method="POST">
            <label for="email">EMAIL</label>
            <input type="email" name="email" required>

            <label for="senha">SENHA</label>
            <input type="password" name="senha" required>

            <a href="sistema_login/recuperar_senha.php" class="esqueceu"> Esqueceu a senha? </a>

            <button type="submit">ACESSAR</button>
        </form>
    </div>

 <?php if (isset($_GET['erro'])): ?>
    <script>
        window.onload = function() {
            alert("Usuário ou senha incorretos.");
        }
    </script>

<?php endif; ?>

</body>
</html>
