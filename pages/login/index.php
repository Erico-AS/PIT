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
    
    <div class="formBx">
        <div class="signinForm" id="dFantasma">
            <form class="teste" action="testLogin.php" method="POST">
                <div class="logo1">
                    <img class="logo" src="../../assets/images/material-logo.png">
                </div>

                <h3>Login</h3>

                <div id="formulario">
                    <input type="text" placeholder="Nome de Usuário" name="nameuser">
                    <input type="password" placeholder="Senha" name="senha">
                </div>

                <input type="submit" value="Login" id="btnMud" name="submit">

                <a href="#" class="forgot">Esqueceu a senha?</a>
                <a href="../../index.php">Voltar</a>
                            
                <!--<div class="log">
                    <img class="login-g" src="assets/images/google.png">
                    <img class="login-g" src="assets/images/facebook.png">
                </div>-->
            </form>
        </div>
    </div>
    <script src="script.js">
    </script>


</body>
</html>