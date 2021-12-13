<?php

    require("../cargadores/cargaBD.php");
    require("../cargadores/cargaTematica.php");

    if(isset($_POST["NombreTematica"]))
    {
        $nombre_tematica=$_POST["NombreTematica"];

        $Tematica=new Tematica($nombre_tematica);

        Conexion::conectar();
        if(Conexion::buscaTematica($Tematica))
        {
            echo ("La tematica ya está introducida");
        }
        else 
        {
            Conexion::InsertarTematica($Tematica); 
            echo "1";               
        }


    }
    else 
    {
        echo "Introduzca el nombre";
    }






?>