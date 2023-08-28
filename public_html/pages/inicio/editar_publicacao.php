<?php
session_start();
include_once('../../service/config.php');

// Verificar se o usuário está logado
if (!isset($_SESSION['nome_user'])) {
    // Redirecionar o usuário para a página de login se não estiver logado
    header("Location: login.php");
    exit();
}

// Verificar se o ID da publicação está presente na URL
if (!isset($_GET['id'])) {
    // Redirecionar o usuário de volta para a página de detalhes da publicação ou exibir uma mensagem de erro
    header("Location: detalhes_publicacao.php?id=" . $_GET['id']);
    exit();
}

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

if ($result->num_rows <= 0) {
    // O usuário não é o autor da publicação
    // Redirecionar o usuário de volta para a página de detalhes da publicação ou exibir uma mensagem de erro
    header("Location: detalhes_publicacao.php?id=" . $id);
    exit();
}

// O usuário é o autor da publicação
// Obter os detalhes da publicação
$row = $result->fetch_assoc();
$titulo = $row['titulo'];
$texto = $row['texto'];

$conexao->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Editar Publicação</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <h1>Editar Publicação</h1>

    <form action="processar_edicao.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="<?php echo $titulo; ?>"><br><br>
        <label for="texto">Texto:</label>
        <textarea name="texto" id="texto"><?php echo $texto; ?></textarea><br><br>
        <input type="submit" value="Salvar">
    </form>

    <br>
    <a href="detalhes_publicacao.php?id=<?php echo $id; ?>">Voltar</a>

</body>
</html>
