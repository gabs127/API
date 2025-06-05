
<?php
include("../conexao.php"); // Inclui a conexão

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Filtra o email
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $senha = $_POST['senha']; // A senha será verificada depois

    if (!$email || empty($senha)) {
        die('Email ou senha inválidos.');
    }

    // Busca o usuário no banco de forma segura
$stmt = $conn->prepare('SELECT id, nome, senha, tipo_usuario FROM usuarios WHERE email = ?');
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $usuario = $result->fetch_assoc(); // Aqui vem como array associativo
    if (password_verify($senha, $usuario['senha'])) {
        session_start();
        $_SESSION['usuarios'] = $usuario['tipo_usuario'];
        header('Location: ../salas.php'); // Redireciona para a página de salas
        exit;
    }
}

header('Location: ../index.php?erro=1');
exit;

} else {
    echo 'Método de requisição inválido.';
}
?>