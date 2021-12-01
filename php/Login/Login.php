<?php
    require "../cargadores/cargaBD.php";
    $usuario=$_POST["InId"];
    $contrasena=$_POST["InPassw"];
    Conexion::conectar();
    if(filter_var($usuario, FILTER_VALIDATE_EMAIL))
    {
        if(Conexion::Login($usuario,$contrasena)==true)
        {
            echo"<script>alert('Usuario encontrado');</script>";
            header("Location:../../html/Pagina_principal/Pagina_principaal.html");
        }
        else
        {
            echo "<script>alert('Usuario no encontrado');
            window.history.go(-1)</script>";
        }
    }
    else
    {
        echo "Email no valido";    
    }

    

?>