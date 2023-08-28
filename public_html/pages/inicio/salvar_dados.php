<?php
session_start();
include_once('../../service/config.php');

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verifica a conexão
if ($conexao->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
}

// Obter os dados do formulário
$titulo = $_POST['titulo'];
$image = '';
if (!empty($titulo)) {
    $autor = $_SESSION['nome_user'];
    $texto = $_POST['texto'];
    $sql = "SELECT id FROM user WHERE nome_user = '$autor'";
    $resultado = $conexao->query($sql);
    $row = $resultado->fetch_row();
    $idUser = $row[0];
    $idUser = intval($idUser);
    
    $tmpName = $_FILES['image']['tmp_name'];
    $imageName = $_FILES['image']['name'];
    $imageSize = $_FILES['image']['size'];
    // Validações da imagem
    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        
    if (!in_array($imageExtension, $validImageExtension)) {
        echo "<script>alert('Extensão de imagem inválida')</script>";
        header('Location: index.php');
        return;
    } elseif ($imageSize > 1200000) {
        echo "<script>alert('Tamanho da imagem é muito grande')</script>";
        header('Location: index.php');
        return;
    }
    $newImageName = $autor . "-" . date("Y.m.d") . "-" . date("h.i.sa") . '.' . $imageExtension;
    move_uploaded_file($tmpName, 'imgs/' . $newImageName);
    $image = $newImageName;
    
    // Escapar caracteres especiais
    $titulo = $conexao->real_escape_string($titulo);
    $texto = $conexao->real_escape_string($texto);
    
    // Obter o ID do fórum
        $forumId = $_GET['forum_id'] ?? 0; // Substitua 0 pelo ID correto para cada fórum

        // Inserir os dados no banco de dados
        $sql = "INSERT INTO publi (titulo, texto, image, fk_id_user, autor, forum_id) VALUES ('$titulo', '$texto', '$image', $idUser, '$autor', $forumId)";

        if ($conexao->query($sql) === TRUE) {
    // Redirecionar para a página de visualização dos dados
    if ($forumId == 1) {
        header("Location: forum.php");
        exit();
    } elseif ($forumId == 2) {
        header("Location: forum2.php");
        exit();
    }
    elseif ($forumId == 3) {
        header("Location: forum3.php");
        exit();
    }
    elseif ($forumId == 4) {
        header("Location: forum4.php");
        exit();
    }
    elseif ($forumId == 5) {
        header("Location: forum5.php");
        exit();
    } else {
        echo "Fórum inválido.";
    }
} else {
    echo "Erro ao salvar os dados: " . $conexao->error;
}

} else {
    echo "<script>alert('Título não pode ser vazio')</script>";
    echo "<script>window.location.href = 'publicar.php';</script>";
    exit();
}
$conexao->close();
?>
