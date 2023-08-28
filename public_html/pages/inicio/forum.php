<?php
session_start();
include_once('../../service/config.php');

// Verifica a conexão
if ($conexao->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
}

// Função para obter as publicações ordenadas por curtidas
function getPublicacoesOrdenadas($conexao, $order, $forumId) {
    $sql = "SELECT publi.id, publi.titulo, COUNT(curtidas.id_publicacao) AS total_curtidas 
            FROM publi 
            LEFT JOIN curtidas ON publi.id = curtidas.id_publicacao 
            WHERE publi.forum_id = $forumId
            GROUP BY publi.id 
            ORDER BY total_curtidas $order";

    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        $publicacoes = array();
        while ($row = $result->fetch_assoc()) {
            $publicacoes[] = $row;
        }
        return $publicacoes;
    } else {
        return array();
    }
}

function getPublicacoesPorForum($conexao, $forumId) {
    $sql = "SELECT id, titulo FROM publi WHERE forum_id = $forumId";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        $publicacoes = array();
        while ($row = $result->fetch_assoc()) {
            $publicacoes[] = $row;
        }
        return $publicacoes;
    } else {
        return array();
    }
}

// Verificar se o usuário clicou em algum botão de filtro
$forumId = 1; // Defina o ID do fórum específico
$publicacoes = getPublicacoesPorForum($conexao, $forumId);

// Verificar se o usuário clicou em algum botão de filtro
$order = "";
if (isset($_GET['filter'])) {
    if ($_GET['filter'] === "mais_curtidos") {
        $order = "DESC";
    } elseif ($_GET['filter'] === "menos_curtidos") {
        $order = "ASC";
    }
}

// Obter as publicações de acordo com o filtro selecionado
$publicacoes = getPublicacoesOrdenadas($conexao, $order, $forumId);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Fórum 1</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
</head>
<body>
    <header>
        <nav class="navigation">
            <img src="../../images/material-logodeitada-semfundo.png" alt="logodeitada">
            <ul class="nav-menu">
                <li class="nav-item"><a href="../../index.html">Home</a></li>
                <li class="nav-item"><a href="index.php">Forums</a></li>
                <li class="nav-item"><a href="../../index.html#about-us">About</a></li>
                <li class="nav-item"><a href="../../pages/suporte/index.php">Support</a></li>
                <li class="nav-item"><a href="../../pages/login/index.php">Login</a></li>
            </ul>
            <div class="menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>
    <main>
        <div class="voltar"><a href="../../pages/inicio/index.php">Voltar</a> </div>
        <div class="titulocontainer">
            <h1>Fórum 1</h1>
            <button class="add-button">
                <?php
                // Verificar se o usuário está logado antes de exibir o botão de publicação
                if (isset($_SESSION['nome_user']) && !empty($_SESSION['nome_user'])) {
                    echo "<a href='publicar.php?forum_id=1'>Adicionar uma publicação</a>";
                } else {
                    echo "<a href='../login'>Logar</a>";
                }
                ?>
            </button>
            <a href="?filter=mais_curtidos" class="filter-button">Mais Curtidos</a>
            <a href="?filter=menos_curtidos" class="filter-button">Menos Curtidos</a>
        </div>
        <div class="forumcontainer">
            <div class="buttons">
            </div>
            <div class="cards">
                <?php
                if (!empty($publicacoes)) {
                    foreach ($publicacoes as $publicacao) {
                        $id = $publicacao["id"];
                        $titulo = $publicacao["titulo"];
                        ?>
                        <div class="card">
                            <div class="card-content">
                                <h2><?php echo $titulo; ?></h2>
                                <a href="detalhes_publicacao.php?id=<?php echo $id; ?>" class="btn-acessar">Detalhe publicação</a>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "Nenhum fórum encontrado.";
                }
                ?>
            </div>
            <br>
            <div class="sticker-button">
                <?php
                // Verificar se o usuário está logado antes de exibir o botão de publicação
                if (isset($_SESSION['nome_user']) && !empty($_SESSION['nome_user'])) {
                    echo "<button onclick=\"window.location.href = 'publicar.php?forum_id=1';\"><img src=\"../../images/escrevericon.png\" alt=\"Sticker\"></button>";
                } else {
                    echo "<button onclick=\"window.location.href = '../login';\"><img src=\"../../images/escrevericon.png\" alt=\"Sticker\"></button>";
                }
                ?>
            </div>
        </div>
    </main>
    <script src='main.js'></script>
</body>
</html>

<?php
$conexao->close();
?>
