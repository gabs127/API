<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Registro</title>
    <link rel="stylesheet" href="../CSS/style.css">
 
</head>

<body>
    
    <div class="login-container">
        <form action="processa_deletar.php" method="POST">
        <h2> Excluir </h2>
            <label for="num_sala"> Número da sala a ser excluída: </label>
            <input type="text" name="num_sala" required>

        

            <button type="submit"> Excluir </button>
        </form>
        
        <br> <br> <a href="../salas.php" class = "botao"> Voltar </a> </p>
    </div>