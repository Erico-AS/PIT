<?php 
session_start();
    if(isset($_POST['submit']) && !empty($_POST['titulo']) && !empty($_POST['mensagem'])){
        include_once('../../service/config.php');
        $titulo = $_POST['titulo'];
        $mensagem = $_POST['mensagem'];

        $sql = "SELECT * FROM publi WHERE titulo = '$titulo' and mensagem = '$mensagem'";

        $result = $conexao->query($sql);


        if(mysqli_num_rows($result) <= 0){
           echo "<script>alert('Dados não foram registrados'); window.location.href = 'index.php';</script>";
        }
        else{
            $_SESSION['titulo'] = $titulo;
            $_SESSION['mensagem'] = $mensagem;
            header('Location: botão+.php');
        }
    }
    else{
        echo "<script>alert('Campos vazios'); window.location.href = 'publicar.php';</script>";
    }

?>