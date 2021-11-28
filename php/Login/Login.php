<?php
    require "../cargadores/cargaBD.php";
    $usuario=$_POST["InId"];
    $contrasena=$_POST["InPassw"];
    Conexion::conectar();
    if(Conexion::Login($usuario,$contrasena)==true)
    {
        echo"<script>alert('Usuario encontrado');</script>";
        header("Location:../../html/Pagina_principal/Pagina_principaal.html");
        
    }

?>