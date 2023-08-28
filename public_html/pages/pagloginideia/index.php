<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Tela de Login
    <form action="processa_login.php" method="post">
        <p>
            Usuario: <input type="text" name="login">
        </p>
        <p>
            Senha: <input type="password" name="senha">
        </p>        
        <button>Logar</button>
    </form>
    <script>
        <?php
            if (isset($_GET["msg"]) && $_GET["msg"] != "") {
        ?>
            alert("<?php echo $_GET["msg"]; ?>");
        <?php
            }
        ?>
    </script>
</body>
</html>