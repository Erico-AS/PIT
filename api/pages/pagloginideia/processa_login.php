<?php
    $login = $_POST["login"];
    $senha = $_POST["senha"];

    if ($login == "admin" && $senha == "123") {

        session_start();
        $_SESSION["usuario"] = $login;
        header("Location: principal.php");

    } else {
        header("Location: index.php?msg=Usuario ou senha invalido!");
    }

?>

if (!empty($login) && !empty($senha)) {
    include_once('config.php');

    $query = "SELECT * FROM users WHERE username = '$login' AND password = '$senha'";
    $result = mysqli_query($conexao, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Autenticação bem-sucedida
        $_SESSION["usuario"] = $login;
        header("Location: principal.php");
    } else {
        // Usuário ou senha inválido
        header("Location: index.php?msg=Usuário ou senha inválido!");
    }
} else {
    // Usuário ou senha não foram fornecidos
    header("Location: index.php?msg=Por favor, preencha todos os campos!");
}