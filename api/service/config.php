<?php 

$dbHost = 'LocalHost';
$dbUsername = 'id20789971_root';
$dbPassword = 'Formap0606@';
$dbName = 'id20789971_usuario';

$conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);


function validaLogin() {
    return isset($_SESSION['nome_user']) && $_SESSION['nome_user'] != "";
}


?>