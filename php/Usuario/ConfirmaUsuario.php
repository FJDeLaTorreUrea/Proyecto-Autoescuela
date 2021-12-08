<?php
    require_once("../cargadores/cargaBD.php");

    $id=$_GET["id"];
    echo $id;
    if(isset($_POST["Contrasena"]) && 
        isset($_POST["Repite_contrasena"]))
    {
        $contrasena=$_POST["Contrasena"];
        Conexion::conectar();
        Conexion::cambiaPassword($id,$contrasena);


    }


















?>