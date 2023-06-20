<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuario";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Obter os títulos das publicações existentes
$sql = "SELECT id, titulo FROM publi";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Fóruns</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <h1>Fóruns</h1>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $titulo = $row["titulo"];
            echo "<h2>" . $titulo . "</h2>";
            echo "<a href='detalhes_publicacao.php?id=" . $id . "'>Visualizar Detalhes</a><br><br>";
        }
    } else {
        echo "Nenhum fórum encontrado.";
    }
    ?>
    <br>
    <a href="publicar.php">+</a>
    <a href="index.php">Voltar</a>
</body>
</html>

<?php
$conn->close();
?>
