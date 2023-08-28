<!DOCTYPE html>
<html lang="Pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="main.css">
    <title>Formap</title>
</head>
<body>
    <header>
        <nav class="navigation">
            <img class="logo-img" src="../../images/material-logodeitada-semfundo.png" alt="logodeitada" style="
            width: 160px;">
            <ul class="nav-menu">
                <li class="nav-item"><a href="../../index.html">Home</a></li>
                <li class="nav-item"><a href="../inicio/index.php">Forums</a></li>
                <li class="nav-item"><a href="../../index.html#about-us">About</a></li>
                <li class="nav-item"><a href="index.php">Support</a></li>
                <li class="nav-item"><a href="/pages/login/index.php">Login</a></li>
            </ul>
            <div class="menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>
    <main>
        <section class="home">
            <div class="home-text">
                <h4 class="text-h4">Bem vindo ao Suporte!</h4>
                <h1 class="text-h1">Encontre respostas para suas perguntas aqui</h1>
                <p>Consulte as perguntas frequentes (FAQs)!</p>
                <button onclick="scrollToBottom()" class="home-btn">Fale Conosco!</button>
                
            </div>
            <div class="home-img">
                <img src=../../images/undraw_Travel_plans_re_103r.png>
            </div>
        </section>
        
        <section class="form" id="contact">
            <h2 class="sup">Contate-nos</h2>
            <form id="content" action="envioFormulario.php" method="POST">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="message">Mensagem:</label>
                <textarea id="message" name="message" required></textarea>
                
                <input type="submit" value="Enviar">
            </form>
        </section>
        
        <section class="faq">
            <h2 class="hh2">Perguntas frequentes</h2>
            <div class="faq-item">
                <h3>Lorem ipsum</h3>
                <p>dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut.</p>
            </div>
            <div class="faq-item">
                <h3>Lorem ipsum</h3>
                <p>labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
            </div>
            <div class="faq-item">
                <h3>Lorem ipsum</h3>
                <p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex.</p>
            </div>
            <div class="faq-item">
                <h3>Lorem ipsum</h3>
                <p>ea commodo consequat. Duis aute irure dolor in reprehenderit in.</p>
            </div>
            <div class="faq-item">
                <h3>Lorem ipsum</h3>
                <p>voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>
            <div class="faq-item">
                <h3>Lorem ipsum</h3>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in.</p>
            </div>
            <div class="faq-item">
                <h3>Lorem ipsum</h3>
                <p>culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="faq-item">
                <h3>Lorem ipsum</h3>
                <p>dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut.</p>
            </div>
            <div class="faq-item">
                <h3>Lorem ipsum</h3>
                <p>culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="faq-item">
                <h3>Lorem ipsum</h3>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in..</p>
            </div>
            
        </section>
    </main>
    
    <script src="script.js"></script>
</body>
</html>