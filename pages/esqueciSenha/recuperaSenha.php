<?php
    session_start();
    include_once('../../service/config.php');
    include_once('index.php');
    $novaSenha = $_POST['novaSenha'];
    $email = $_SESSION['email'];

    if(!validaLogin())
    {
        header('Location: ../login');
        return;
    }

    if (strlen($novaSenha) >= 8) {
        $updateSql = "UPDATE usuario SET senha = '$novaSenha' WHERE email = '$email'";
        $result = $conexao->query($sqlSelect);
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
            </form>
        </div>

        <input type="submit" value="Enviar" id="btnMud" name="submit">
    </main>
</body>
</html>