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
                $about = $user_data['about'];
                $image = $user_data['image'];
            }
                
            $_SESSION['nameuser'] = $nome;
        }
        else {
            header('Location: ../login');
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
    <style>
        .profile {
            background-image: url("imgs/<?php echo $image != "" ? $image : "noprofile.png" ?>");
            background-position: center;
            background-size: cover;
        }
    </style>
    <script src='main.js'></script>
</head>
<body>
    <div class="formBx">
        <div class="signinForm" id="dFantasma">
            <form class="teste" action="saveEdit.php" method="POST" enctype="multipart/form-data">
                <div class="profile">
                </div>

                <h3>Editar</h3>

                <div id="formulario">
                    <input type="text" placeholder="Nome de Usuário" name="nameuser" value="<?php echo $nome?>">
                    <input type="text" placeholder="About you" name="about" value="<?php echo $about?>">
                    <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png">
                </div>

                <input type="hidden" name="id" value="<?php echo $id?>">
                <input type="submit" class="submit" value="Alterar" id="submit" name="update">
                
                <a href="../inicio">
                    Voltar
                </a>
            </form>
        </div>
    </div>
    <script src="script.js">
    </script>


</body>
</html>