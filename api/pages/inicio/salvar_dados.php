<?php
// Conexão com o banco de dados
$servername = "Localhost";
$username = "root";
$password = "";
$dbname = "usuario";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Obter os dados do formulário
$titulo = $_POST['titulo'];
$texto = $_POST['texto'];

// Inserir os dados no banco de dados
$sql = "INSERT INTO publi (titulo, texto) VALUES ('$titulo', '$texto')";

if ($conn->query($sql) === TRUE) {
    // Redirecionar para a página de visualização dos dados
    header("Location: forum.php");
    exit();
} else {
    echo "Erro ao salvar os dados: " . $conn->error;
}

$conn->close();
?>