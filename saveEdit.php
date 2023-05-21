<?php 

    include_once('config.php');

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $nome = $_POST['nameuser'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sqlInsert = "UPDATE user SET nome='$nome',email='$email',senha='$senha' WHERE id='$id'";

        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: sistema.php');

?>