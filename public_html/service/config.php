<?php 
    $dbHost = 'localhost';
    $dbUsername = 'id20955657_adm';
    $dbPassword = 'Formap02@';
    $dbName = 'id20955657_formap';

    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
    
    if ($conexao->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
    }

    function validaLogin() {
        return isset($_SESSION['nome_user']) && $_SESSION['nome_user'] != "";
    }
?>