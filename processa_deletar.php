<?php
include("../conexao.php");
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuarios'])) {
    header("Location: ../index.php");
    exit();
}

// Verifica se recebeu o parâmetro num_sala pela URL (via GET)
if (isset($_POST['num_sala'])) {
    $num_sala = $_POST['num_sala'];

    // Verifica se a sala existe
    $verifica_sql = "SELECT * FROM bloco_b WHERE num_sala = ?";
    $verifica_stmt = $conn->prepare($verifica_sql);
    $verifica_stmt->bind_param("s", $num_sala);
    $verifica_stmt->execute();
    $result = $verifica_stmt->get_result();

    if ($result->num_rows > 0) {
        // Sala existe, então exclui
        $delete_sql = "DELETE FROM bloco_b WHERE num_sala = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("s", $num_sala);

        if ($delete_stmt->execute()) {
            echo "
            <script>
                alert('Sala excluída com sucesso!');
                window.location.href = '../salas.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Erro ao excluir: " . $conn->error . "');
                window.location.href = 'deletar.php';
            </script>";
        }

        $delete_stmt->close();
    } else {
        echo "
        <script>
            alert('Sala não encontrada!');
            window.location.href = 'deletar.php';
        </script>";
    }

    $verifica_stmt->close();
    $conn->close();
} else {
    echo "
    <script>
        alert('Número da sala não especificado!');
        window.location.href = 'deletar.php';
    </script>";
}
?>