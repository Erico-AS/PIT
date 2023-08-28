<?php 
 session_start();
 include_once('../../service/config.php');

 /*if(!validaLogin())
 {
    header('Location: ../login');
    return;
 }*/

    $logado = isset($_SESSION['nome_user']) ? $_SESSION['nome_user'] : '';

    $sql = "SELECT id FROM user WHERE nome_user = '$logado'"; 
    
    $result = $conexao->query($sql);

 /*$logado = $_SESSION['nome_user'];

 $sql = "SELECT id FROM user WHERE nome_user = '$logado'"; 
 
 $result = $conexao->query($sql);*/

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Formap</title>
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
        <div class="voltarp"><a href="../../index.html" id="backk">Voltar</a></a> </div>
<div class="container">

    <div class="ladoesquerdo">
    <div class="bem-vindo">
    <?php 
            echo"<h1>Bem-vindo! <u>$logado</u><br> Acesse os fóruns ou edite seu perfil</h1>";
        
    ?>
    <tbody>
    <?php
        if(validaLogin()){
            while($user_data = mysqli_fetch_assoc($result)) {
                echo "<a href='../perfil?id=$user_data[id]' class='editar'>Editar</a>";
            }
        }
    ?>
    </tbody>
    </div>
    </div>
    <img src="../../images/undraw_lightbulb_moment_re_ulyo.png">
</div>
<div class="containercards">
<h1>Selecione um fórum abaixo</h1>
<div class="cards">
<div class="cards">
    <div class="card">
            <img src="../../images/undraw_Questions_re_1fy7.png" alt="Imagem do Fórum">
            <div class="card-content">
                <h2>Dúvidas</h2>
                <p>Fórum Exemplo</p>
                <a href="forum.php" class="btn-acessar">Acesse o fórum</a>
            </div>
        </div>
    </div>
    <div class="card">
        <img src="../../images/undraw_Questions_re_1fy7.png" alt="Imagem do Fórum">
        <div class="card-content">
            <h2>Dicas</h2>
            <p>Procure dicas para as suas próximas viagens</p>
            <a href="forum2.php" class="btn-acessar">Acesse o fórum</a>
        </div>
    </div>
    <div class="cards">
    <div class="card">
        <img src="../../images/undraw_Questions_re_1fy7.png" alt="Imagem do Fórum">
        <div class="card-content">
            <h2>Preços</h2>
            <p>Fórum Exemplo</p>
            <a href="forum3.php" class="btn-acessar">Acesse o fórum</a>
        </div>
    </div>
</div>
<div class="cards">
    <div class="card">
        <img src="../../images/undraw_Questions_re_1fy7.png" alt="Imagem do Fórum">
        <div class="card-content">
            <h2>Roteiros</h2>
            <p>Fórum Exemplo</p>
            <a href="forum4.php" class="btn-acessar">Acesse o fórum</a>
        </div>
    </div>
</div>
<div class="cards">
    <div class="card">
        <img src="../../images/undraw_Questions_re_1fy7.png" alt="Imagem do Fórum">
        <div class="card-content">
            <h2>Histórias</h2>
            <p>Fórum Exemplo</p>
            <a href="forum5.php" class="btn-acessar">Acesse o fórum</a>
        </div>
    </div>
</div>
</div>
</div>
</main>
<script src='main.js'></script>
</body>
</html>