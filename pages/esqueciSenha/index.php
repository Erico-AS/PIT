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