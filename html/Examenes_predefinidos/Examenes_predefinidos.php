<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../scss/main.css">
    <link rel="icon" href="../../recursos/imagenes/favicon.ico">
    <script src="../../Js/AjaxExamenPredefinido.js"></script>
    <title>Realizar Examen predefinido</title>
</head>
<body>
    <?php
        require("../../php/Sesiones/Sesiones.php");
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
    <nav id="usuario">
        <ul>
            <li><a href="">Historial de examenes</a></li>
            <li><a href="">Examen predefinido</a></li>
            <li><a href="">Examen aleatorio</a></li>
        </ul>
    </nav>
    
    <table id="tabla_registro">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Duracion</th>
                    <th>Numero de preguntas</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody id="datos">



            </tbody>




        </table>

        <span id="paginas"></span>





</body>
</html>