<?php 

    session_start();
    include_once('../../service/config.php');

    if(!validaLogin())
    {
    header('Location: ../login');
    return;
    }

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $id = intval($_POST['id']);
        $nome = $_POST['nameuser'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sqlInsert = "UPDATE user SET nome_user=?, email=?, senha=? WHERE id=?";
        $stmt = $conexao->prepare($sqlInsert);
        $stmt->bind_param("sssi", $nome, $email, $senha, $id);
        $stmt->execute();
        header('Location: ../home');    
        
    } else {
        echo "Método não permitido!";
    }
    

?>