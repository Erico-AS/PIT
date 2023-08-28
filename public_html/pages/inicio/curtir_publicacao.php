<?php
session_start();
include_once('../../service/config.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['nome_user']) || empty($_SESSION['nome_user'])) {
    // Redireciona para a página de login caso o usuário não esteja logado
    header("Location: ../login/index.php");
    exit();
}

// Verifica se o parâmetro "id" está presente na URL
if (isset($_GET['id'])) {
    // Obter o ID da publicação selecionada
    $id_publicacao = $_GET['id'];

    // Obter o ID do usuário logado
    $nome_user = $_SESSION['nome_user'];
    $sql_usuario = "SELECT id FROM user WHERE nome_user = '$nome_user'";
    $result_usuario = $conexao->query($sql_usuario);

    if ($result_usuario !== false && $result_usuario->num_rows > 0) {
        $row_usuario = $result_usuario->fetch_assoc();
        $id_usuario = $row_usuario['id'];

        // Verificar se o usuário já curtiu a publicação
        $sql_verificar_curtida = "SELECT id FROM curtidas WHERE id_publicacao = '$id_publicacao' AND id_usuario = '$id_usuario'";
        $result_verificar_curtida = $conexao->query($sql_verificar_curtida);

        if ($result_verificar_curtida !== false && $result_verificar_curtida->num_rows > 0) {
            echo "Curtiu.";
        } else {
            // Inserir a curtida na tabela 'curtidas'
            $sql_curtir = "INSERT INTO curtidas (id_publicacao, id_usuario) VALUES ('$id_publicacao', '$id_usuario')";
            if ($conexao->query($sql_curtir) === true) {
                echo "Curtida registrada com sucesso.";
            } else {
                echo "Erro ao registrar a curtida: " . $conexao->error;
            }
        }
    } else {
        echo "Usuário não encontrado.";
    }

    $conexao->close();
} else {
    echo "ID não fornecido na URL.";
}
?>
