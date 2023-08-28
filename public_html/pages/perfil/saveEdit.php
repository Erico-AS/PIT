<?php
session_start();
include_once('../../service/config.php');

if (!validaLogin()) {
    header('Location: ../login');
    return;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $nome = $_POST['nameuser'];
    $about = $_POST['about'];
    $image = null;

    // Verifica se uma nova imagem foi enviada
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
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

        $newImageName = $nome . " - " . date("Y.m.d") . " - " . date("h.i.sa") . '.' . $imageExtension;
        move_uploaded_file($tmpName, 'imgs/' . $newImageName);
        $image = $newImageName;
    } else {
        // Mantém a imagem anterior
        $sqlSelectImage = "SELECT image FROM user WHERE id = $id";
        $result = $conexao->query($sqlSelectImage);
        if ($result->num_rows > 0) {
            $user_data = mysqli_fetch_assoc($result);
            $image = $user_data['image'];
        }
    }

    // Atualiza as informações do usuário
    $sqlUpdate = "UPDATE user SET nome_user = ?, about = ?, image = ? WHERE id = ?";
    $stmt = $conexao->prepare($sqlUpdate);
    $stmt->bind_param("sssi", $nome, $about, $image, $id);
    $stmt->execute();
    $stmt->close();

    // Verifica se o nome de usuário foi alterado
    $nomeAntigo = $_SESSION['nameuser'];
    if ($nome !== $nomeAntigo) {
        // Nome de usuário foi alterado, atualiza o nome na sessão
        $_SESSION['nameuser'] = $nome;
        header('Location: ../login'); // Redireciona para a página de login
        return;
    } else {
        header('Location: ../inicio'); // Redireciona para a página de início
        return;
    }
} else {
    // Método não permitido
    echo "<script>alert('Método não permitido')</script>";
    header('Location: ../inicio');
    return;
}
?>

