<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost/API/api.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$response = curl_exec($ch);
curl_close($ch);

echo "<pre>";
print_r($response);
echo "</pre>";
$bloco_b = json_decode($response, true);


if (is_array($bloco_b)) {
    foreach ($bloco_b as $item) {
        echo "ID: " . $item['id'] . " - Número sala: " . $item['num_sala'] . " - Andar: " . $item['andar'] . 
        " - Quadro Branco: " . $item['quadro_branco'] . " - Projetor: " . $item['projetor'] . 
        " - Tela Interativa: " . $item['tela_interativa'] . " - Capacidade média: " . $item['cap_media'] . "<br>";
    }
} else {
    echo "Nenhum dado encontrado ou resposta inválida da API.";
}
?>