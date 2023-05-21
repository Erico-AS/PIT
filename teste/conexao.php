<?php 

$con = new mysqli("localhost", "root", "", "usuario");

if ($con->error) {
    die("Falha ao conectar ao banco de dados: " . $con->error);
}

?>