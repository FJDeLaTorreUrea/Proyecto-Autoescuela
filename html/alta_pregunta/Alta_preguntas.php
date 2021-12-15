<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../recursos/imagenes/favicon.ico">
    <link rel="stylesheet" href="../../scss/main.css">
    <script src="../../Js/AjaxAltaPregunta.js"></script>
    <title>Alta de preguntas</title>
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
                    <a href="../usuarios/Registros_usuarios.php">Usuarios</a>
                    <ul class="submenu">
                        <li><a href="../alta_usuario/alta_usuario/alta_usuario_index.php">Alta de usuario</a></li>
                        <li><a href="">Alta masiva de usuario</a></li>
                    </ul>
                </li>
                <li class="categoria">
                    <a href="">Temáticas</a> 
                    <ul class="submenu">
                        <li><a href="../alta_tematica/tematica.php">Alta de temática</a></li>
                    </ul>
                </li>
                <li class="categoria">
                    <a href="">Preguntas</a>
                    <ul class="submenu">
                        <li><a href="">Alta de pregunta</a></li>
                        <li><a href="">Alta masiva de preguntas</a></li>
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

        <form >
            <br>
            <span id="notificador"></span>
            <br>
            <label for="html">Tematica</label><br>
            <select id="selecciona_tematica">
                <?php
                    require("../../B_D/Conexion.php");
                    Conexion::conectar();
                    Conexion::devuelveTematicasEnSelect();
                ?>
            </select>
            <br>
            <label for="html">Enunciado</label><br>
            <textarea name="Enunciado_pregunta" id="Enunciado" cols="30" rows="10"></textarea><br>
            <br><br>
            
            <label for="html">Opcion 1</label><br>
            <input type="text" id="Op1"><input type="radio" name="Op_correcta" id="Op1_correcta" value="1" checked> Correcta<br>

            <label for="html">Opcion 2</label><br>
            <input type="text" id="Op2"><input type="radio" name="Op_correcta" id="Op2_correcta" value="2"> Correcta <br>

            <label for="html">Opcion 3</label><br>
            <input type="text" id="Op3"><input type="radio" name="Op_correcta" id="Op3_correcta" value="3"> Correcta <br>

            <label for="html">Opcion 4</label><br>
            <input type="text" id="Op4"><input type="radio" name="Op_correcta" id="Op4_correcta" value="4"> Correcta 
            <br><br>

            
            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen" size="20">
            <br><br>
               



            <input type="submit" id="Aceptar" value="Aceptar">

        </form>








    












    
</body>
</html>