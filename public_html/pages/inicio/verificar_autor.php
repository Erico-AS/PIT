<?php
session_start();
include_once('../../service/config.php');

// Verificar se o usuário está logado
if (!isset($_SESSION['nome_user'])) {
    // Redirecionar o usuário para a página de login se não estiver logado
    header("Location: login.php");
    exit();
}

// Verificar se o ID da publicação foi fornecido na URL
if (!isset($_GET['id'])) {
    // Redirecionar o usuário para a página de detalhes da publicação se o ID não estiver presente
    header("Location: detalhes_publicacao.php");
    exit();
}

$conexao = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conexao->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
}

// Obter o ID da publicação
$id = $_GET['id'];

// Obter o nome do usuário logado
$nome_user = $_SESSION['nome_user'];

// Verificar se o usuário é o autor da publicação
$sql = "SELECT * FROM publi WHERE id = '$id' AND autor = '$nome_user'";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    // O usuário é o autor da publicação
    // Exibir o formulário de edição da publicação
    // ...
} else {
    // O usuário não é o autor da publicação
    // Redirecionar o usuário para a página de detalhes da publicação
    header("Location: detalhes_publicacao.php?id=" . $id);
    exit();
}

$conexao->close();
?>
