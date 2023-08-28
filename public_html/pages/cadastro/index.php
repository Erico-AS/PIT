<?php 
    if(isset($_POST['submit'])) {

        include_once('../../service/config.php');

        $nome = $_POST['nameuser'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confirma_senha = $_POST['confirmaSenha'];

        if (!empty($_POST['nameuser']) && !empty($_POST['senha']) && !empty($_POST['email']) && strlen($senha) >= 8 && $senha == $confirma_senha) 
        {
            $consulta_email = mysqli_query($conexao, "SELECT * from user WHERE email = '$email'");
            
            if(mysqli_num_rows($consulta_email) == NULL) {
                $insercaoSql = "INSERT INTO user (nome_user, email, senha) VALUES ('$nome', '$email', '$senha')";
                $result = $conexao->query($insercaoSql);
                header('Location: ../login/index.php');
            } else {
                echo "<script>alert('Email já cadastrado')</script>";
            }
        } else {
            echo "<script>alert('Campos vazios, senha menor que 8 caractéres ou campos de confirmação diferentes. Verifique estes critérios')</script>";
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
            <form class="teste" action="index.php" method="POST">
                <div class="logo1">
                    <img class="logo" src="../../assets/images/material-logo.png">
                </div>

                <h3>Cadastro</h3>

                <div id="formulario">
                    <input type="text" placeholder="Nome de Usuário" name="nameuser">
                    <input type="email" placeholder="Email" name="email">
                    <input type="password" placeholder="Senha" name="senha">
                    <input type="password" placeholder="Confirme sua senha" name="confirmaSenha">
                </div>

                <input type="submit" value="Cadastro" id="btnMud" name="submit">
                <a href="../login/index.php">Já Possui Conta?</a>
                <a href="../../index.html">Home</a>
                            
                <div class="log">
                </div>
            </form>
        </div>
    </div>
    <script src="script.js">
    </script>


</body>
</html>