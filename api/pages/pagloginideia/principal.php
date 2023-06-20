<?php
    session_start();

    if (!isset($_SESSION["usuario"]) || $_SESSION["usuario"] == "") {
        header("Location: index.php?msg=Usuário não logado");
        return;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Estou logado!!!
    <?php
        echo "<h1>Olá " . $_SESSION["usuario"] . "</h1>";
    ?>
    <a href="processa_sair.php">Sair</a>
</body>
</html>