<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../recursos/imagenes/favicon.ico">
    <link rel="stylesheet" href="../../scss/main.css">
    <script src="../../Js/AjaxLogin.js"></script>
    <title>Autoescuela los monos</title>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION["usuario"]))
        {
            session_destroy();
        }
    
    ?>
    <img src="../../recursos/imagenes/Imagen_login.png" alt="Imagen de presentacion">

    <form action="" method="post" id="formLogin">
        

        <span id="nada" ></span><br>
        
        <label for="html">Usuario/email</label><br>
        <input type="text" id="InId" name="InId" required=""><br>
        

        <label for="html">Contraseña</label><br>
        <input type="password" id="InPassw" name="InPassw" required=""><br>
        

        <input type="submit" value="aceptar" id="BotonAceptar" name="BotonAceptar">
    </form>

    <footer>
        <a href="../password_olvidada/recupera_passsw.html">¿Has olvidado tu constraseña?</a>
    </footer>
</body>
</html>