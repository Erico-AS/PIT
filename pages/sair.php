<?php
    session_start();
    unset($_SESSION['nome_user']);
    unset($_SESSION['senha']);
    session_destroy();
    header('Location: login');
?>