<?php 

$dbHost = 'LocalHost';
$dbUsername = 'id20789971_root';
$dbPassword = 'Formap0606@';
$dbName = 'id20789971_usuario';

$conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

//if ($conexao->connect_errno) {
//    echo "Erro";
//}
//else {
//    echo "Conexão efetuada com sucesso";
//}

function validaLogin() {
    return isset($_SESSION['nome_user']) && $_SESSION['nome_user'] != "";
}


?>