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
                $mensagem .= "https://frmp.000webhostapp.com/recuperaSenha.php?email=$email";

                mail($email, $assunto, $mensagem);

                echo "Um email foi enviado com as instruções para recuperar sua senha.";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Esqueceu sua Senha</title>
</head>
<body>
    <main>
        <div class="mold">
            <div class="titulo">
                <h1>Encontre sua Conta</h1>
                <h4>Informe o e-mail associado à sua conta para alterar sua senha.</h4>
            </div>

            <form action="esqueceuSenha.php" method="POST">
                    <label>Email:</label>
                    <input type="email" name="email">
            </form>
        </div>

        <button>Avançar</button>
    </main>
</body>
</html>
