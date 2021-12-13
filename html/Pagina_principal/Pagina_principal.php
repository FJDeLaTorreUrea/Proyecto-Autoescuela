<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../scss/main.css">
    <link rel="icon" href="../../recursos/imagenes/favicon.ico">
    
    <title>Inicio</title>
</head>
<body>
    <?php
        session_start();
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
        <nav>
            <ul>
                <li class="categoria">
                    <a href="../usuarios/Registros_usuarios.html">Usuarios</a>
                    <ul class="submenu">
                        <li><a href="../alta_usuario/alta_usuario/alta_usuario_index.html">Alta de usuario</a></li>
                        <li><a href="">Alta masiva de usuario</a></li>
                    </ul>
                </li>
                <li class="categoria">
                    <a href="">Temáticas</a> 
                    <ul class="submenu">
                        <li><a href="../alta_tematica/tematica.html">Alta de temática</a></li>
                    </ul>
                </li>
                <li class="categoria">
                    <a href="">Preguntas</a>
                    <ul class="submenu">
                        <li><a href="">Alta de pregunta</a></li>
                        <li><a href="">Alta masiva de usuario</a></li>
                    </ul>
                </li>
                <li class="categoria">
                    <a href="">Exámenes</a>
                    <ul class="submenu">
                        <li><a href="">Alta de Exámen</a></li>
                        <li><a href="">Historial de exámenes</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    












    
</body>
</html>