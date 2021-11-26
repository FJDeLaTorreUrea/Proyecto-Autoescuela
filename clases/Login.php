<?php
require_once("../B_D/conexion.php");
    $usuario=$_POST["InId"];
    $contrasena=$_POST["InPassw"];
    if(Conexion::Login($usuario,$contrasena)==true)
    {
        echo"<script>alert('Usuario encontrado');</script>";
        header("Location:../Pagina_principal/Pagina_principaal.html");
    }

?>