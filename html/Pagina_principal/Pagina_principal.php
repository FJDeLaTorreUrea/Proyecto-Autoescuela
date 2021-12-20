<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../scss/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="icon" href="../../recursos/imagenes/favicon.ico">
    
    <title>Inicio</title>
</head>
<body>
    <?php
        require("../../php/Sesiones/Sesiones.php");
        abreSesion();
        
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
        <nav id="Admin">
            <ul>
                <li class="categoria">
                    <a href="../usuarios/Registros_usuarios.php"><i class="fas fa-address-card"></i> Usuarios</a>
                    
                    <ul class="submenu">
                        <li><a href="../alta_usuario/alta_usuario/alta_usuario_index.php">Alta de usuario</a></li>
                        <li><a href="">Alta masiva de usuario</a></li>
                    </ul>
                </li>
                <li class="categoria">
                    <a href="../tematicas/Registros_tematicas.php"><i class="fab fa-black-tie"></i>Temáticas</a> 
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
                    <a href="../Examenes_predefinidos/Examenes_predefinidos.php"><i class="fas fa-archive"></i>Exámenes</a>
                    <ul class="submenu">
                        <li><a href="../alta_examenes/alta_examenes.php">Alta de Exámen</a></li>
                        <li><a href="">Historial de exámenes</a></li>
                    </ul>
                </li>
            </ul>
            
        </nav>
        <nav id="usuario">
            <ul>
                <li><a href="../historial_examenes/usuarios/historial_alumno.php">Historial de examenes</a></li>
                <li><a href="../Examenes_predefinidos/Examenes_predefinidos.php">Examen predefinido</a></li>
                <li><a href="">Examen aleatorio</a></li>
            </ul>

            <?php
                if($_SESSION["Rol"]=="Usuario")
                {
                    echo "<script>document.getElementById('Admin').style.display='none'</script>";
                }
                else 
                {
                    echo "<script>document.getElementById('usuario').style.display='none'</script>";
                }
            
            
            ?>



        </nav>
    












    
</body>
</html>