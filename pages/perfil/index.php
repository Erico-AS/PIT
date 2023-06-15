<?php 
    session_start();
    include_once('../../service/config.php');
    
    if(!validaLogin())
    {
       header('Location: ../login');
       return;
    }
        
    if(isset($_GET['id'])) {
        
        include_once('../../service/config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM user WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0){
            while($user_data = mysqli_fetch_assoc($result)){
                $id = $user_data['id'];
                $nome = $user_data['nome_user'];
                $about = $user_data['About you'];
                $profile = $user_data['Profile'];
            }
                
            $_SESSION['nameuser'] = $nome;
        }
        else {
            header('Location: ../home');
        } 
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <div class="formBx">
        <div class="signinForm" id="dFantasma">
            <form class="teste" action="saveEdit.php" method="POST">
                <div class="logo1">
                    <img class="logo" src="../../assets/images/material-logo.png">
                </div>

                <h3>Editar</h3>

                <div id="formulario">
                    <input type="text" placeholder="Nome de Usuário" name="nameuser" value="<?php echo $nome?>">
                    <input type="email" placeholder="Email" name="About you" value="<?php echo $about?>">
                    <input type="file" name="Profile" id = "image" accept=".jpg, .jpeg, .png">
                </div>

                <input type="hidden" name="id" value="<?php echo $id?>">
                <input type="submit" class="submit" value="Alterar" id="submit" name="update">
                
                <a href="../home">
                    Voltar
                </a>
            </form>
        </div>
    </div>
    <script src="script.js">
    </script>


</body>
</html>