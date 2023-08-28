<?php
session_start();
include_once('../../service/config.php');

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verifica se o usuário está logado
    if (isset($_SESSION["nome_user"])) {
        // Obtém os dados do formulário
        $id = $_POST["id"];
        $titulo = $_POST["titulo"];
        $texto = $_POST["texto"];

        // Verifica a conexão
        if ($conexao->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
        }

        // Verifica se o usuário é o autor da publicação
        $sql_autor = "SELECT autor FROM publi WHERE id = '$id'";
        $result_autor = $conexao->query($sql_autor);

        if ($result_autor !== false && $result_autor->num_rows > 0) {
            $row_autor = $result_autor->fetch_assoc();
            $autor = $row_autor["autor"];

            if ($_SESSION["nome_user"] === $autor) {
                // Atualiza os dados da publicação no banco de dados
                $sql_update = "UPDATE publi SET titulo = '$titulo', texto = '$texto' WHERE id = '$id'";

                if ($conexao->query($sql_update) === TRUE) {
                    // Redireciona o usuário para a página de detalhes da publicação
                    header("Location: detalhes_publicacao.php?id=$id");
                    exit();
                } else {
                    echo "Erro ao atualizar a publicação: " . $conexao->error;
                }
            } else {
                echo "Você não tem permissão para editar esta publicação.";
            }
        } else {
            echo "Publicação não encontrada.";
        }

        $conexao->close();
    }
}

// Redireciona o usuário em caso de falha ou acesso inválido
header("Location: index.php");
exit();
?>
