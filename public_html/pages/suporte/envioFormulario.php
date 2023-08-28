<?php
    $name = $_POST["name"];
    $email_formu = $_POST["email"];
    $email = "formapit02@gmail.com";
    $mensagem = $email_formu . " " . $_POST["message"];
        
    mail($email, $name, $mensagem);
    echo "<script>alert('Enviado, obrigado!')</script>";
    echo "<script>window.location.href = 'index.php';</script>";
?>