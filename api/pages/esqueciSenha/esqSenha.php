<?php
    session_start();

    if (isset($_POST['submit'])) {
        
        include_once('../../service/config.php');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            
            if ($email != '') {
                $_SESSION['email'] = $_POST['email'];
            
                $result = mysqli_query($conexao, "SELECT * FROM user WHERE email = '$email'");
                
                if (mysqli_num_rows($result) > 0) {
                    $assunto = "Recuperação de Senha";
                    $mensagem = "Por favor, acesse o link abaixo para alterar sua senha:\n";
                    $mensagem .= "https://frmp.000webhostapp.com/pages/esqueciSenha/recuperaSenha.php?email=$email";
    
                    mail($email, $assunto, $mensagem);
    
                    header('Location: enviado.php');
                }
            }
        }
    }
?>