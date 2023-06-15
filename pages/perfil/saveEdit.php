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
        $about = $_POST['About you'];
        $profile = $_POST['Profile'];
        
        if (!empty($nome) && !empty($about)) {
            $sqlInsert = "UPDATE user SET nome_user = ?, About you = ?, Profile = ? WHERE id=?";
            $stmt = $conexao->prepare($sqlInsert);
            $stmt->bind_param("sssi", $nome, $about, $profile, $id);
            $stmt->execute();
            header('Location: ../home');    
        } else {
            echo "<h2>Campo vazio. Volte a página anterior e recarregue</h2>";
        }
        
    } else {
        echo "Método não permitido!";
    }
    

?>