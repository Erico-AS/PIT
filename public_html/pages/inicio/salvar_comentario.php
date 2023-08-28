<?php
session_start();
include_once('../../service/config.php');

if (isset($_SESSION['nome_user']) && !empty($_SESSION['nome_user'])) {
    $comentario = $_POST['comentario'];
    $publicacao_id = $_POST['publicacao_id'];
    $usuario_id = $_SESSION['id']; // ajuste isso conforme o nome da coluna que armazena o ID do usuário na tabela 'user'

    // Escapar caracteres especiais
    $comentario = $conexao->real_escape_string($comentario);

    $sql = "INSERT INTO comentarios (id_publicacao, id_usuario, comentario) VALUES ('$publicacao_id', '$usuario_id', '$comentario')";

    if ($conexao->query($sql) === TRUE) {
        // Comentário adicionado com sucesso
        header("Location: detalhes_publicacao.php?id=$publicacao_id");
        exit();
    } else {
        echo "Erro ao salvar o comentário: " . $conexao->error;
    }
} else {
    // Usuário não está logado, redirecione para a página de login
    header("Location: ../login");
    exit();
}

$conexao->close();
?>
