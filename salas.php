
<?php
// Conexão com o banco
include("conexao.php");

// Consulta ao banco
$sql = "SELECT * FROM bloco_b"; 
$result = $conn->query($sql);

session_start();
if (!isset($_SESSION['usuarios'])) {
    header("Location: index.php");
    exit();
}
$tipo_usuario = $_SESSION['usuarios'];

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">  
<link rel="stylesheet" type="text/css" href="../CSS/style2.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">

</head>

<title> Salas </title>

<!-- MENU--> 
<body>
  <nav>
    <div class="logo">
      <img src="IMAGENS/unesc.png" alt="Logo">
    </div>
    <ul class="menu">
      <li><a href="lab_aud.html">Auditorios</a></li>
      <li><a href="lab_aud.html">Laboratorios</a></li>
      <li><a href="salas.html">Salas</a></li>
      </ul>
    
    <div class="menu-right">
    <a href="index.php" class="logout-btn">Logout</a>
  </div>

  </nav>

<header>
  <div class="header-container">
    <div class="header-logo">
      <img src="IMAGENS/Banner pro Site.png" alt="Header">
    </div>
</div>
</header>
  
<!--Tabela das salas -->
  <div class="espaco"> <h1> Orientação das Salas - Bloco B </h1> </div>

  <table>
    <thead>
      <tr>
        <th> Número da Sala </th>
        <th> Andar </th>
        <th> Quadro Branco </th>
        <th> Projetores </th>
        <th> Televisão Interativa </th>
        <th> Capacidade Média </th>
      </tr>
    </thead>
    <tbody> 
     
      <?php
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . htmlspecialchars($row["num_sala"]) . "</td>";
              echo "<td>" . htmlspecialchars($row["andar"]) . "</td>";
              echo "<td>" . htmlspecialchars($row["quadro_branco"]) . "</td>";
              echo "<td>" . htmlspecialchars($row["projetor"]) . "</td>";
              echo "<td>" . htmlspecialchars($row["tela_interativa"]) . "</td>";
              echo "<td>" . htmlspecialchars($row["cap_media"]) . "</td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='6'>Nenhuma sala encontrada.</td></tr>";
      }
      $conn->close();
      ?>
    
    </tbody>
  </table>

<?php if ($tipo_usuario == 0 ) { ?>
    <center>
    <h2> Painel do Administrador </h2>
    <br> <br> <a href="CUD/criar.php" class = "botao">Criar Novo Registro</a> |
    <a href="CUD/editar.php" class = "botao">Editar Registro</a> |
    <a href="CUD/deletar.php" class = "botao">Deletar Registro</a> 
    <br><br>
  </center>
  <?php } ?>

</body>
</html>
