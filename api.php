<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include ("../conexao.php");;

function resposta($mensagem, $codigo = 200) {
    http_response_code($codigo);
    echo json_encode($mensagem);
    exit;
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $sql = "SELECT * FROM bloco_b";
        $result = $conn->query($sql);
        $bloco_b = [];
        while ($row = $result->fetch_assoc()) {
            $bloco_b[] = $row;
        }
        resposta($bloco_b);
        break;

    case 'POST':
        $dados = json_decode(file_get_contents("php://input"), true);

        if (!isset($dados['num_sala'], $dados['andar'], $dados['quadro_branco'], $dados['projetor'], $dados['tela_interativa'], $dados['cap_media'])) {
            resposta(["error" => "Dados inválidos."], 400);
        }

        $stmt = $conn->prepare("INSERT INTO bloco_b (num_sala, andar, quadro_branco, projetor, tela_interativa, cap_media) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("siiiii", $dados['num_sala'], $dados['andar'], $dados['quadro_branco'], $dados['projetor'], $dados['tela_interativa'], $dados['cap_media']);
        if ($stmt->execute()) {
            resposta(["message" => "Sala adicionada com sucesso."]);
        } else {
            resposta(["error" => "Erro ao adicionar sala: " . $conn->error], 500);
        }
        break;

    case 'PUT':
        $dados = json_decode(file_get_contents("php://input"), true);
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            resposta(["error" => "ID inválido."], 400);
        }
        if (!isset($dados['num_sala'], $dados['andar'], $dados['quadro_branco'], $dados['projetor'], $dados['tela_interativa'], $dados['cap_media'])) {
            resposta(["error" => "Dados inválidos."], 400);
        }

        $stmt = $conn->prepare("UPDATE bloco_b SET num_sala=?, andar=?, quadro_branco=?, projetor=?, tela_interativa=?, cap_media=? WHERE id=?");
        $stmt->bind_param("siiiiii", $dados['num_sala'], $dados['andar'], $dados['quadro_branco'], $dados['projetor'], $dados['tela_interativa'], $dados['cap_media'], $_GET['id']);
        if ($stmt->execute()) {
            resposta(["message" => "Sala atualizada com sucesso."]);
        } else {
            resposta(["error" => "Erro ao atualizar sala: " . $conn->error], 500);
        }
        break;

    case 'DELETE':
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            resposta(["error" => "ID inválido."], 400);
        }

        $stmt = $conn->prepare("DELETE FROM bloco_b WHERE id=?");
        $stmt->bind_param("i", $_GET['id']);
        if ($stmt->execute()) {
            resposta(["message" => "Sala excluída com sucesso."]);
        } else {
            resposta(["error" => "Erro ao excluir sala: " . $conn->error], 500);
        }
        break;

    default:
        resposta(["error" => "Método não suportado."], 405);
}

$conn->close();
?>
