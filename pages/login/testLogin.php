<?php 
session_start();
    if(isset($_POST['submit']) && !empty($_POST['nameuser']) && !empty($_POST['senha'])){
        include_once('../../service/config.php');
        $nameuser = $_POST['nameuser'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM user WHERE nome_user = '$nameuser' and senha = '$senha'";

        $result = $conexao->query($sql);


        if(mysqli_num_rows($result) <= 0){
           echo "<script>alert('Usuário ou senha incorretos'); window.location.href = 'index.php';</script>";
        }
        else{
            $_SESSION['nome_user'] = $nameuser;
            $_SESSION['senha'] = $senha;
            header('Location: ../home');
        }
    }
    else{
        echo "<script>alert('Campos vazios'); window.location.href = 'index.php';</script>";
    }

?>