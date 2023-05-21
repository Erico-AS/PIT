<?php 
 session_start();
 include_once('config.php');
 //print_r($_SESSION); 
 if((!isset($_SESSION['nome_user']) == true) and (!isset($_SESSION['senha']) == true))
 {
    unset($_SESSION['nome_user']);
    unset($_SESSION['senha']);
    header('Location: login.php');
 }

 $logado = $_SESSION['nome_user'];

 $sql = "SELECT * FROM user ORDER BY id DESC"; 
 
 $result = $conexao->query($sql);

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
    <?php 
        echo"<h1>Bem-Vindo <u>$logado</u></h1>";
    ?>
    <div>
        <table>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
            <?php
                while($user_data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$user_data['id']."</td>";
                    echo "<td>".$user_data['nome_user']."</td>";
                    echo "<td>".$user_data['email']."</td>";
                    echo "<td>".$user_data['senha']."</td>";
                    echo "<td><a href='edita.php?id=$user_data[id]' class='editar'>Editar</a></td>";
                    echo "</tr>";
                    }
                    ?>
            </tbody>
        </table>
    </div>
        <a href="login.php" class="sair">Sair</a>
</body>
</html>