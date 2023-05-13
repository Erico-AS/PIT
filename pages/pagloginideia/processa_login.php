<?php


    $login = $_POST["login"];
    $senha = $_POST["senha"];

    if ($login == "admin" && $senha == "123") {

        session_start();
        $_SESSION["usuario"] = $login;
        header("Location: principal.php");

    } else {
        header("Location: index.php?msg=Usuario ou senha invalido!");
    }

?>