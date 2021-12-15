<?php
    require_once("../cargadores/cargaBD.php");

    $id=$_GET["id"];
    var_dump($_GET);
    if(isset($_POST["Contrasena"]) && 
        isset($_POST["Repite_contrasena"]))
    {
        $contrasena=$_POST["Contrasena"];
        Conexion::conectar();
        Conexion::cambiaPassword($id,$contrasena);
        Conexion::BorraUsuarioTemporal($id);


    }


















?>