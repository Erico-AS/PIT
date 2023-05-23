<?php 

session_start();
include_once('../../service/config.php');

if(!validaLogin())
{
   header('Location: ../login');
   return;
}

if(isset($_GET['id'])) {

    include_once('../../service/config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM user WHERE id=$id";

    $result = $conexao->query($sqlSelect);

    if($result->num_rows > 0){

        while($user_data = mysqli_fetch_assoc($result)){
            $id = $user_data['id'];
            $nome = $user_data['nome_user'];
            $email = $user_data['email'];
            $senha = $user_data['senha'];

        }
        //print_r($nome);
    }
    else {
        header('Location: ../home');
    } 
}

?>

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
            <form class="teste" action="saveEdit.php" method="POST">
                <div class="logo1">
                    <img class="logo" src="../../assets/images/material-logo.png">
                </div>

                <h3>Editar</h3>

                <div id="formulario">
                    <input type="text" placeholder="Nome de Usuário" name="nameuser" value="<?php echo $nome?>">
                    <input type="text" placeholder="Email" name="email" value="<?php echo $email?>">
                    <input type="text" placeholder="Senha" name="senha" value="<?php echo $senha?>">
                </div>

                <input type="hidden" name="id" value="<?php echo $id?>">
                <input type="submit" value="Alterar" id="submit" name="update">
                
                <a href="../home">
                    Voltar
                </a>
                            
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