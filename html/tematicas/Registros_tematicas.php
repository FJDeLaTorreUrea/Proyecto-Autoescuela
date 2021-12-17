<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../scss/main.css">
    <link rel="icon" href="../../recursos/imagenes/favicon.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="../../Js/AjaxRegistroTematica.js"></script>
    <title>Registros Tematicas</title>
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
                <a href="../usuarios/Registros_usuarios.php"><i class="fas fa-address-card"></i>Usuarios</a>
                    <ul class="submenu">
                        <li><a href="../alta_usuario/alta_usuario/alta_usuario_index.php">Alta de usuario</a></li>
                        <li><a href="">Alta masiva de usuario</a></li>
                    </ul>
            </li>
            <li class="categoria">
                <a href=""><i class="fab fa-black-tie"></i>Temáticas</a> 
                <ul class="submenu">
                    <li><a href="../alta_tematica/tematica.php">Alta de temática</a></li>
                </ul>
            </li>
            <li class="categoria">
                <a href=""><i class="fas fa-book"></i>Preguntas</a>
                <ul class="submenu">
                    <li><a href="../alta_pregunta/Alta_preguntas.php">Alta de pregunta</a></li>
                    <li><a href="">Alta masiva de usuario</a></li>
                </ul>
            </li>
            <li class="categoria">
                <a href=""><i class="fas fa-archive"></i>Exámenes</a>
                <ul class="submenu">
                    <li><a href="../alta_examenes/alta_examenes.php">Alta de Exámen</a></li>
                    <li><a href="">Historial de exámenes</a></li>
                </ul>
            </li>
            </ul>
        </nav>
        <br>
        

        <table id="tabla_registro">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tema</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody id="datos">



            </tbody>




        </table>

        <span id="paginas"></span>
</body>
</html>