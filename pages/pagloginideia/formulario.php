<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Formap - Log</title>
        <link rel="icon" type="image/png" href="assets/images/material-logo.png">
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    </head>

    <body>
        <div class="container">
            <div class="purpleBg">
                <div class="box signin">
                    <h2>Possui uma Conta ?</h2>
                    <button class="signinBtn">Logar</button>
                </div>
                <div class="box signup">
                    <h2>Não possui uma Conta ?</h2>
                    <button class="signupBtn">Criar Conta</button>
                </div>
            </div>
        </div>

        <div class="formBx">
            <div class="signinForm" id="dFantasma">
                <form class="teste" action="formulario.php" method="POST">
                    <div class="logo1">
                        <img class="logo" src="assets/images/material-logo.png">
                    </div>

                    <h3>Login - Formap</h3>

                    <div id="formulario">
                        <input type="text" placeholder="Nome de Usuário" name="nameuser">
                        <input type="password" placeholder="Senha" name="senha">
                    </div>

                    <input type="submit" value="Login" id="btnMud" name="submit">

                    <a href="#" class="forgot">Esqueceu a senha?</a>
                                
                    <div class="log">
                        <img class="login-g" src="assets/images/google.png">
                        <img class="login-g" src="assets/images/facebook.png">
                    </div>
                </form>
            </div>
        </div>
        <script src="script.js">
        </script>
    </body>
</html>
