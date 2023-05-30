<?php
    session_start();

    if (isset($_POST['submit'])) {
        
        include_once('../../service/config.php');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $_SESSION['email'] = $_POST['email'];

            $sql = "SELECT * FROM usuario WHERE email = '$email'";
            $result = $conexao->query($sql);

            if ($result == false) {
                $assunto = "Recuperação de Senha";
                $mensagem = "Por favor, acesse o link abaixo para alterar sua senha:\n";
                $mensagem .= "https://frmp.000webhostapp.com/pages/esqueciSenha/recuperaSenha.php?email=$email";

                mail($email, $assunto, $mensagem);

                header('Location: enviado.php');
            }
        }
    }
?>
