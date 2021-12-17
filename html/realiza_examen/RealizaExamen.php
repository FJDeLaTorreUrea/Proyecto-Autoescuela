<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../scss/main.css">
    <link rel="icon" href="../../recursos/imagenes/favicon.ico">
    <script src="../../Js/AjaxRealizaExamen.js"></script>
    <title>Realiza Examen</title>
</head>
<body id="Examen">
<?php
        require("../../php/Sesiones/Sesiones.php");
        require("../../B_D/Conexion.php");
        abreSesion();
        
        if(!isset($_SESSION["usuario"]))
        {
            header("Location:../index/Index.html");
        }
    ?>
    <header>
        <img class="izquierda" src="../../recursos/imagenes/Imagen_header.png" height="200px">
        <h1 class="titulo">Autoescuela Los Monos</h1>
        <br>
    </header>
    <section id="pregunta">
        
    </section>

    <span id="menu"></span>
    



    


</body>
</html>