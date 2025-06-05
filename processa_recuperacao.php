<?php
include("../conexao.php");

$email = $_POST['email'];
$sql = "SELECT * FROM usuarios WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Gera uma senha aleatória de 6 caracteres
    $nova_senha = substr(md5(time()), 0, 6);
    $senha_criptografada = password_hash($nova_senha, PASSWORD_DEFAULT);
    
    $sql_update = "UPDATE usuarios SET senha='$senha_criptografada' WHERE email='$email'";
    
    if ($conn->query($sql_update) === TRUE) {
        echo "
        <!DOCTYPE html>
        <html lang='pt-br'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Recuperação de Senha</title>
            <link rel='stylesheet' href='../CSS/style.css'>
        </head>
        <body>
            <div class='login-container'>
                <h2>Senha provisória gerada com sucesso!</h2>
                <p class='nova-senha'>$nova_senha</p>
                <p> Utilize esta senha para acessar o sistema e alterá-la posteriormente.</p>
                <a class='botao' href='../index.php'>Voltar para Login</a>
            </div>
        </body>
        </html>";
    } else {
        
        echo "Erro ao atualizar a senha.";
    }
} else {
    // Se o email não for encontrado
    header('Location: recuperar_senha.php?erro=1');
    exit;
}
$conn->close();
?>