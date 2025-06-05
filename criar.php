<?php 
include ("../conexao.php");
session_start();
if (!isset($_SESSION['usuarios'])) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Registro</title>
    <link rel="stylesheet" href="../CSS/style.css">
 
</head>

<body>
    
    <div class="login-container">
        <h2>Criar Registro</h2>
        <form action="processa_criar.php" method="POST">
            <label for="num_sala"> Número da sala: </label>
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

            <button type="submit">Criar</button>
        </form>
        
        <br> <br> <a href="../salas.php" class = "botao"> Voltar </a> </p>
    </div>
    