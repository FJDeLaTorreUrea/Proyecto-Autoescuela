<?php
    require_once("../cargadores/cargaBD.php");
    $Nueva_passw=$_POST["InNueva"];
    $Confirmar_passw=$_POST["InConfirmar"];

    if($Nueva_passw==$Confirmar_passw)
    {
        if(Conexion::cambiaPassword($Nueva_passw,$Confirmar_passw)==true)
        {
            echo "<script>alert('Contraseña cambiada');</script>";
        }
    }



















?>