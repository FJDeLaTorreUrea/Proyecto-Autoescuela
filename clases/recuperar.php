<?php
    require_once("../B_D/conexion.php");
    require_once("MandaEmail.php");
    $correo=$_POST["InCorreo"];
    if(Conexion::buscaEmail($correo)==true)
    {
        mandaCorreo($correo,"<a href='localhost/Proyecto-Autoescuela/password_olvidada/cambia_password/cambiar_password.html?id=${correo}'>Haga click para cambiar su contrase&ntilde;a</a>","Cambiar contraseña");
    }




















?>