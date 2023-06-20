<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Esqueceu sua Senha</title>
</head>
<body>
    <main>
        <div class="mold">
            <div class="titulo">
                <h1>Encontre sua Conta</h1>
                <h4>Informe o e-mail associado à sua conta para alterar sua senha.</h4>
            </div>

            <form action="esqSenha.php" method="POST">
                    <label>Email:</label>
                    <input type="email" name="email">
                    <input type="submit" value="Enviar" id="btnMud" name="submit">
            </form>
        </div>
    </main>
</body>
</html>
