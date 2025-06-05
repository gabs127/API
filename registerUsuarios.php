 <?php
include 'conexao.php';
$nome = "Tiago Araújo";
$email = "tiagoaraujo@gmail.com";
$senha = password_hash("654321", PASSWORD_DEFAULT);
$tipo_usuario = 1; // 0 para administrador, 1 para usuário comum

$sql = "INSERT INTO usuarios (nome, email, senha, tipo_usuario) VALUES ('$nome', '$email', '$senha', '$tipo_usuario')";
$conn->query($sql);
echo "Usuário registrado com sucesso!";
?> 