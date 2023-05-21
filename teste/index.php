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
    <?php 
        include('conexao.php');
        
        if(isset($_POST['nome_user']) || isset($_POST['senha'])) {

            if(strlen($_POST['email']) == 0) {
                echo "Preencha seu e-mail";
            } else if(strlen($_POST['senha']) == 0) {
                echo "Preencha sua senha";
            } else {
        
                $nome_user = $con->real_escape_string($_POST['nome_user']);
                $senha = $con->real_escape_string($_POST['senha']);
        
                $sql_code = "SELECT * FROM usuario WHERE nome_user = '$nome_user' AND senha = '$senha'";
                $sql_query = $con->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
        
                $quantidade = $sql_query->num_rows;
        
                if($quantidade == 1) {
                    
                    $usuario = $sql_query->fetch_assoc();
        
                    if(!isset($_SESSION)) {
                        session_start();
                    }
        
                    $_SESSION['id'] = $usuario['id'];
                    $_SESSION['nome_user'] = $usuario['nome_user'];
        
                    header("Location: painel.php");
        
                } else {
                    echo "Falha ao logar! E-mail ou senha incorretos";
                }
        
            }
        
        }
    ?>
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
                <form class="teste" action="processa_login.php" method="POST">
                    <div class="logo1">
                        <img class="logo" src="assets/images/material-logo.png">
                    </div>

                    <h3>Login - Formap</h3>

                    <div id="formulario">
                        <input type="text" placeholder="Nome de Usuário" name="usuario">
                        <input type="password" placeholder="Senha" name="senha">
                    </div>

                    <input type="submit" value="Login" id="btnMud">

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
