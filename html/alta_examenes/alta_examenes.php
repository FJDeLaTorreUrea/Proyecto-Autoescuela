<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../scss/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="icon" href="../../recursos/imagenes/favicon.ico">
    <script src="../../Js/AltaExamen.js"></script>
    <title>Alta de examen</title>
</head>
<body>
    <?php
    //Codigo para comprobar que el usuario ha pasado por el login
        session_start();
        if(!isset($_SESSION["usuario"]))
        {
            header("Location:../index/Index.php");
        }
    ?>

    <header>
        <img class="izquierda" src="../../recursos/imagenes/Imagen_header.png" height="200px">
        <h1 class="titulo">Autoescuela Los Monos</h1><br>
        <a href="../index/Index.php">Cerrar Sesión</a>
        <br>
    </header>
        <nav>
            <ul>
                <li class="categoria">
                    <a href="../usuarios/Registros_usuarios.php"><i class="fas fa-address-card"></i> Usuarios</a>
                    <ul class="submenu">
                        <li><a href="../alta_usuario/alta_usuario/alta_usuario_index.php">Alta de usuario</a></li>
                        <li><a href="">Alta masiva de usuario</a></li>
                    </ul>
                </li>
                <li class="categoria">
                    <a href="../tematicas/Registros_tematicas.php"><i class="fab fa-black-tie"></i> Temáticas</a> 
                    <ul class="submenu">
                        <li><a href="../alta_tematica/tematica.php">Alta de temática</a></li>
                    </ul>
                </li>
                <li class="categoria">
                    <a href=""><i class="fas fa-book"></i>Preguntas</a>
                    <ul class="submenu">
                        <li><a href="../alta_pregunta/Alta_preguntas.php">Alta de pregunta</a></li>
                        <li><a href="">Alta masiva de preguntas</a></li>
                    </ul>
                </li>
                <li class="categoria">
                    <a href=""><i class="fas fa-archive"></i>Exámenes</a>
                    <ul class="submenu">
                        <li><a href="">Alta de Exámen</a></li>
                        <li><a href="">Historial de exámenes</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <br>
        <span id="notificador"></span>
        <br>
        <form>
            <label for="nombre">Nombre de examen:</label><br>
            <input type="text" id="nombre"><br>

            <label for="duracion">Duracion(min):</label><br>
            <input type="number" id="duracion"><br>

            <br>
        <input type="submit" value="Confirmar" id="confirmar">


        </form>





        <br><br>
        <div id="contenedor1">
            <h2>Preguntas</h2>
            <?php
            //codigo que pasa las preguntas de la base de datos al contenedor
                require("../../B_D/Conexion.php");
                Conexion::conectar();
                Conexion::devuelvePreguntasEnDiv();
            ?>


        </div>
        <br><br>
        <span id="n_preguntas"></span>
        <br>
        <div id="contenedor2">
        <h2>Examen</h2>
        </div>
        
        
</body>
</html>