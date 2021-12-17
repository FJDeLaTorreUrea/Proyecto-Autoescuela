<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../scss/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="../../../Js/AjaxInsertaUsuario.js"></script>
    <title>Crear nuevo usuario</title>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION["usuario"]))
        {
            header("Location:../../index/Index.html");
        }
    ?>
    <header>
        <img class="izquierda" src="../../../recursos/imagenes/Imagen_header.png" height="200px">
        <h1 class="titulo">Autoescuela Los Monos</h1>
        <br>
    </header>
    <nav>
        <ul>
            <li class="categoria">
                <a href="../../usuarios/Registros_usuarios.html"><i class="fas fa-address-card"></i>Usuarios</a>
                <ul class="submenu">
                    <li><a href="../alta_usuario/alta_usuario/alta_usuario_index.html">Alta de usuario</a></li>
                    <li><a href="">Alta masiva de usuario</a></li>
                </ul>
            </li>
            <li class="categoria">
                <a href="../../tematicas/Registros_tematicas.php"><i class="fab fa-black-tie"></i> Temáticas</a> 
                <ul class="submenu">
                    <li><a href="../../alta_tematica/tematica.php">Alta de temática</a></li>
                </ul>
            </li>
            <li class="categoria">
                <a href=""><i class="fas fa-book"></i>Preguntas</a>
                <ul class="submenu">
                    <li><a href="../../alta_pregunta/Alta_preguntas.php">Alta de pregunta</a></li>
                    <li><a href="">Alta masiva de usuario</a></li>
                </ul>
            </li>
            <li class="categoria">
                <a href=""><i class="fas fa-archive"></i>Exámenes</a>
                <ul class="submenu">
                    <li><a href="../../alta_examenes/alta_examenes.php">Alta de Exámen</a></li>
                    <li><a href="">Historial de exámenes</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <form action="" method="post" id="form1">
        <span id="notificacion"></span><br>
        <p> </p>
        <label for="html">Email</label><br>
        <input type="text" name="IEmail" id="IEmail">
        <p> </p>
        <label for="html">Nombre</label><br>
        <input type="text" name="INombre" id="INombre"><br>
        <p> </p>
        <label for="html">Primer apellido</label><br>
        <input type="text" name="IAp1" id="IAp1"><br>
        <p> </p>
        <label for="html">Segundo apellido</label><br>
        <input type="text" name="IAp2" id="IAp2"><br>
        <p> </p>
        <label for="html">Fecha de Nacimiento</label><br>
        <input type="date" name="IFecha" id="IFecha"><br>
        <p> </p>
        <label for="html">Rol</label><br>
        <select name="SRol" id="SRol">
            <option value="1">Admin</option>
            <option value="2" >Usuario</option>
        </select>
        <br>

        <input type="submit" name="IAceptar" id="IAceptar">




    </form>
</body>
</html>