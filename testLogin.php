<?php 
session_start();
    //print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['nameuser']) && !empty($_POST['senha'])){
        //Acessa
        include_once('config.php');
        $nameuser = $_POST['nameuser'];
        $senha = $_POST['senha'];

        //print_r('Usuário: ' . $nameuser);
        //print_r('<br>');
        //print_r('Senha: ' . $senha);

        $sql = "SELECT * FROM user WHERE nome_user = '$nameuser' and senha = '$senha'";

        $result = $conexao->query($sql);

        //print_r($sql);
        //print_r($result);

        if(mysqli_num_rows($result) < 1){
            unset($_SESSION['nome_user']);
            unset($_SESSION['senha']);
           header('Location: login.php');
        }
        else{
            $_SESSION['nome_user'] = $nameuser;
            $_SESSION['senha'] = $senha;
            header('Location: sistema.php');
        }
    }
    else{

        // Não acessa
        header('Location: login.php');
    }

?>