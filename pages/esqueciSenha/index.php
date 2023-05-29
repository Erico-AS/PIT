<?php
    session_start();
    include_once('../../service/config.php');


    if(!validaLogin())
    {
        header('Location: ../login');
        return;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];

        $sql = "SELECT * FROM usuario WHERE email = '$email'";
        $result = $conexao->query($sqlSelect);
        if ($result->num_rows > 0) {
            if ($conn->query($updateSql) === TRUE) {
                $assunto = "Recuperação de Senha";
                $mensagem .= "Por favor, acesse o link abaixo para alterar sua senha:\n";
                $mensagem .= "http://seusite.com/recuperaSenha.php?email=$email";

                mail($email, $assunto, $mensagem);

                echo "Um email foi enviado com as instruções para recuperar sua senha.";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Formap</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <div id="tudo">
    <div class="container-fundo">
        
        <main>
        <div class="container-login">
            
            <form action="">
                <h1>Encontre sua Conta</h1>
                <h3>Informe o e-mail associado à sua conta para alterar sua senha.</h3>
                <input type="email" placeholder="Email">
                <button>AVANÇAR</button>
        </form>
        </div>
    
    </div>

</div>
</main>
</body>
</html>
