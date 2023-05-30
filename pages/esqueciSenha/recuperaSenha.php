<?php
    if (isset($_POST['submit'])) {
        session_start();
        include_once('../../service/config.php');
        $novaSenha = $_POST['novaSenha'];
        $email = $_SESSION['email'];
    
        if (strlen($novaSenha) >= 8) {
            $updateSql = "UPDATE user SET senha = '$novaSenha' WHERE email = '$email'";
            $result = mysqli_query($conexao, $updateSql);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="recuperaSenha.css">
    <title>Recupere sua Senha</title>
</head>
<body>
    <main>
        <div class="mold">
            <div class="titulo">
                <h1>Recupere sua Senha</h1>
                <h4>Escreva sua nova Senha</h4>
            </div>

            <form action="recuperaSenha.php" method="POST">
                    <label>Senha:</label>
                    <input type="text" name="novaSenha">
                    <input type="submit" value="Enviar" id="btnMud" name="submit">
            </form>
        </div>
    </main>
</body>
</html>