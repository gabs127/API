
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <div class="login-container">
        <h2></h2>
        <form action="processa_recuperacao.php" method="POST">
           
            <label for="email">EMAIL</label>
            <input type="email" name="email" required>

    
            <button type="submit">ACESSAR</button>
        </form>
    </div>
    <?php if (isset($_GET['erro'])): ?>
        <script>
            window.onload = function() {
                alert("Email não encontrado.");
            }
        </script>
    <?php endif; ?>
    </script>
</body>
</html>
