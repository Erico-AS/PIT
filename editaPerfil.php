<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Formap</title>
        <link rel="icon" type="image/png" href="assets/images/material-logo.png"/>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    </head>

    <body>
        <div>
            <img class="logo-g" src="assets/images/material-logo.png" alt="Logo Formap" style="width: auto;
            height: auto; margin-left: 93%; margin-top: -5%">
        </div>

        <div class="formBx">
            <div class="signinForm">
                <form class="teste" action="signup.php" method="POST">
                    <div class="logo1">
                        <img class="logo" src="assets/images/material-logo.png" alt="Logo Formap">
                    </div>
                    <h3>Alterar Perfil</h3>

                    <div class="profile" style="display: flex; justify-content: center; margin-bottom: 30px">
                        <img src="assets/images/placeholder.png" class="pfp" alt="Foto de Perfil" style="width: 200px; height: 200px;">
                    </div>

                    <div id="formulario">
                        <input type="text" placeholder="Usuário">
                        <input type="text" placeholder="Bio">
                        <input type="text" placeholder="Localização">
                        <input type="date" value="" id="btnDate">
                        <input type="submit" value="SALVAR" id="enviar">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>