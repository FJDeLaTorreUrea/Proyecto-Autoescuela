<?php
    require("../cargadores/cargaBD.php");
    require_once("MandaEmail.php");
    $correo=$_POST["InCorreo"];
    Conexion::conectar();
    if(Conexion::buscaEmail($correo)==true)
    {
        MandaEmail($correo,"<a href='localhost/Proyecto-Autoescuela/password_olvidada/cambia_password/cambiar_password.html?id=${correo}'>Haga click para cambiar su contrase&ntilde;a</a>","Cambiar contraseña");
    }




















?>