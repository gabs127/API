<?php
include ("../conexao.php");
session_start();
if (!isset($_SESSION['usuarios'])) {
    header("Location: ../index.php");
    exit();
}

// Recebe os dados do formulário
$num_sala = $_POST['num_sala'];
$andar = $_POST['andar'];
$quadro_branco = $_POST['quadro_branco'];
$projetor = $_POST['projetor'];
$tela_interativa = $_POST['tela_interativa'];
$cap_media = $_POST['cap_media'];

// Verifica se a sala existe para decidir se faz o UPDATE
$verifica_sql = "SELECT * FROM bloco_b WHERE num_sala = ?";
$stmt = $conn->prepare($verifica_sql);
$stmt->bind_param("s", $num_sala);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Sala já existe: faz o UPDATE
    $sql = "UPDATE bloco_b 
            SET andar = ?, quadro_branco = ?, projetor = ?, tela_interativa = ?, cap_media = ? 
            WHERE num_sala = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $andar, $quadro_branco, $projetor, $tela_interativa, $cap_media, $num_sala);

    if ($stmt->execute()) {
        echo "
        <script>
            alert('Registro alterado com sucesso!');
            window.location.href = 'criar.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Erro ao alterar o registro: " . $conn->error . "');
            window.location.href = 'criar.php';
        </script>";
    }
} else {
    // Sala não existe, não pode atualizar
    echo "
    <script>
        alert('Não existe uma sala com essa numeração.');
        window.location.href = 'criar.php';
    </script>";
}

$conn->close();
?>