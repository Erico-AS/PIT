<?php
// Verifica se o parâmetro "id" está presente na URL
if (isset($_GET['id'])) {
    // Obter o ID da publicação selecionada
    $id = $_GET['id'];

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

    // Obter os detalhes do título e do texto da publicação
    $sql = "SELECT titulo, texto FROM publi WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $titulo = $row["titulo"];
        $texto = $row["texto"];

        echo "<h1>" . $titulo . "</h1>";
        echo "<p>" . $texto . "</p>";
        echo "<a href='forum.php'>Voltar</a>";
    } else {
        echo "Nenhum dado encontrado.";
    }

    $conn->close();
} else {
    echo "ID não fornecido na URL.";
}
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
</body>
</html>