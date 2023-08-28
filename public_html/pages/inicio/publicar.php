<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
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

<main class="mainpostagem">
    <div class="containerform">
        <form class="form" action="salvar_dados.php?forum_id=<?php echo $_GET['forum_id']; ?>" method="POST" enctype="multipart/form-data">
            <div class="logo1">
                <img class="logo" src="../../assets/images/material-logo.png">
            </div>

            <h3 class="np">Nova postagem</h3>

            <div id="form">
                <input type="text" class="inputpostagem" id="titulo" placeholder="Título" name="titulo" maxlength="15" required><br><br>
                <textarea id="texto" class="inputpostagem" name="texto" placeholder="Mensagem" maxlength="2999"></textarea><br><br>
                <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png">
            </div>

            <input id="salvar" type="submit" value="Salvar" name="submit">
            <a href="index.php">Voltar</a>
        </form>
    </div>
</main>

</body>
</html>
