
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro</title>
    <link rel="stylesheet" href="../CSS/style.css">
 
</head>

<body>
    
    <div class="login-container">
        <form action="processa_editar.php" method="POST">
        <h2> Editar </h2>
            <label for="num_sala"> Número da sala a ser editada: </label>
            <input type="text" name="num_sala" required>

            <label for="andar">Andar</label>
            <input type="number" name="andar" required>

            <label for="quadro_branco"> Quadro branco: </label>
            <input type="number" name="quadro_branco" required>

             <label for="projetor"> Projetor: </label>
            <input type="number" name="projetor" required>

             <label for="tela_interativa"> Tela Interativa: </label>
            <input type="number" name="tela_interativa" required>

            <label for="cap_media"> Capacidade Média: </label>
            <input type="number" name="cap_media" required>

            <button type="submit"> Editar</button>
        </form>
        
        <br> <br> <a href="../salas.php" class = "botao"> Voltar </a> </p>
    </div>