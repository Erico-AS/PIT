<?php
// Verifica se o parâmetro "id" está presente na URL
if (isset($_GET['id'])) {
    // Obter o ID da publicação selecionada
    $id = $_GET['id'];

    session_start();
    include_once('../../service/config.php');

    // Verifica a conexão
    if ($conexao->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
    }

    // Obter os detalhes do título e do texto da publicação
    $sql = "SELECT titulo, texto, autor, image FROM publi WHERE id = '$id'";
    $result = $conexao->query($sql);
    
    $sqlPic = "SELECT image FROM publi WHERE id = '$id'";
    $resultPic = $conexao->query($sql);

    if ($result !== false && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $titulo = isset($row["titulo"]) ? $row["titulo"] : "";
        $texto = isset($row["texto"]) ? $row["texto"] : "";
        $autor = isset($row["autor"]) ? $row["autor"] : "";
        $image = isset($row["image"]) ? $row["image"] : "";

        echo "<h1>" . $titulo . "</h1>";
        echo "<p>" . $texto . "</p>";
        echo "<p>" . $autor . "</p>";

        if (isset($_SESSION['nome_user'])) {
            $usuarioLogado = $_SESSION['nome_user'];

            $sqlCurtida = "SELECT id FROM curtidas WHERE id_publicacao = '$id' AND id_usuario = '$usuarioLogado'";
            $resultCurtida = $conexao->query($sqlCurtida);

             if ($resultCurtida !== false && $resultCurtida->num_rows > 0) {
                echo "<p>Você já curtiu esta publicação.</p>";
            } else {
                echo "<a href='curtir_publicacao.php?id=" . $id . "'>Curtir</a>";
            }

            if ($_SESSION['nome_user'] == $autor) {
                echo '<a href="editar_publicacao.php?id=' . $id . '"><img src="o pedra.png" alt="Editar"></a>';
            }

            // Formulário para adicionar um novo comentário
            echo '<form method="POST" action="">
                    <textarea name="comentario" placeholder="Escreva seu comentário aqui"></textarea>
                    <button type="submit">Comentar</button>
                  </form>';
            
            // Inserir novo comentário se o formulário for submetido
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comentario'])) {
                $comentario = $_POST['comentario'];
                $nome_user = $_SESSION['nome_user'];
                $sql_usuario = "SELECT id FROM user WHERE nome_user = '$nome_user'";
                $result_usuario = $conexao->query($sql_usuario);

            if ($result_usuario !== false && $result_usuario->num_rows > 0) {
                $row_usuario = $result_usuario->fetch_assoc();
                $id_usuario = $row_usuario['id'];
            } else {
                 echo "Erro ao obter o ID do usuário.";
            }
    
                $sqlInserirComentario = "INSERT INTO comentarios (id_publicacao, id_usuario, comentario) VALUES ('$id', '$id_usuario', '$comentario')";
                if ($conexao->query($sqlInserirComentario) === TRUE) {
                    echo "Comentário inserido com sucesso!";
                } else {
                    echo "Erro ao inserir o comentário: " . $conexao->error;
                }
            }
        }
    } else {
        echo "Nenhum dado encontrado.";
    }

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
    <style>
        .img {
            background-image: url("imgs/<?php echo $image !== NULL ? $image : NULL ?>");
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
            height: 48vh;
            margin-top: -50px;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navigation">
            <img src="../../images/material-logodeitada-semfundo.png" alt="logodeitada">
            <ul class="nav-menu">
                <li class="nav-item"><a href="../../index.html">Home</a></li>
                <li class="nav-item"><a href="index.php">Forums</a></li>
                <li class="nav-item"><a href="../../index.html#about-us">About</a></li>
                <li class="nav-item"><a href="../../pages/suporte/index.html">Support</a></li>
                <li class="nav-item"><a href="../../pages/login/index.php">Login</a></li>
            </ul>
            <div class="menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>

    <main class="main-detalhes">
        <div class="container-detalhes">
    <?php
    if ($result !== false && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $titulo = isset($row["titulo"]) ? $row["titulo"] : "";
        $texto = isset($row["texto"]) ? $row["texto"] : "";
        $autor = isset($row["autor"]) ? $row["autor"] : "";
        $image = isset($row["image"]) ? $row["image"] : "";

        echo "<h1>" . $titulo . "</h1>";
        echo "<p>" . $texto . "</p>";
        echo "<p>" . $autor . "</p>";
        echo "<a href='index.php' class='btn-acessar'>Voltar</a>";
        if ($image !== NULL) {
            echo "<div class='img'></div>";
        }
        
    } else {
        echo "Nenhum dado encontrado.";
    }
    ?>
    <div class="comments">
        <?php
        // Código para buscar e exibir comentários
        $sqlComentarios = "SELECT c.comentario, u.nome_user
                           FROM comentarios c
                           INNER JOIN user u ON c.id_usuario = u.id
                           WHERE c.id_publicacao = '$id'";
        $resultComentarios = $conexao->query($sqlComentarios);

        if ($resultComentarios !== false && $resultComentarios->num_rows > 0) {
            echo "<h2>Comentários</h2>";
            while ($rowComentario = $resultComentarios->fetch_assoc()) {
                $comentario = $rowComentario['comentario'];
                $nome_user = $rowComentario['nome_user'];
                echo "<p><strong>$nome_user:</strong> $comentario</p>";
            }
        } else {
            echo "<p>Nenhum comentário ainda.</p>";
        }
        $conexao->close();
        ?>
    </div>
    </div>
    </main>
</body>
</html>
