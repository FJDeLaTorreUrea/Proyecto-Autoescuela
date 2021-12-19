<?php
    require("../cargadores/cargaBD.php");
    $correctas=$_POST["correctas"];
    $total=$_POST["total"];
    session_start();
    $usuario=$_SESSION["usuario"];


    Conexion::conectar();
    $Id_usuario=Conexion::buscaIdUsuarioConEmail($usuario);
    $Id_examen=$_GET["id"];
    
    Conexion::InsertaExamenUsuario($Id_usuario,$Id_examen,$correctas,$total);

?>