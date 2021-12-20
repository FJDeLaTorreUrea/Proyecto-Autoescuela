<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="favicon" href="../../../recursos/imagenes/favicon.ico">
    <link rel="stylesheet" href="../../../scss/main.css">
    <script src="../../../Js/AjaxMasivaUsuario.js"></script>
    <title>Alta masiva de usuarios</title>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION["usuario"]))
        {
            header("Location:../../index/Index.php");
        }
    ?>
    <form enctype="multipart/form-data" action="../../../php/Usuario/Masiva.php" method="POST">
        <input type="hidden" name="TAMANO_MAXIMO" value="300000"><br>
        Añada el fichero aqui:<input type="file" name="fichero"><br>
        <input type="submit" id="enviar" value="enviar">


    </form>
</body>
</html>