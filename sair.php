<?php
    session_start();
    unset($_SESSION['nome_user']);
    unset($_SESSION['senha']);
    header('Location: login.php');
?>