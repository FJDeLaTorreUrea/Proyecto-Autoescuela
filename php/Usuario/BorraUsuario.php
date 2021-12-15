<?php

require("../../B_D/Conexion.php");

$id=$_POST["Id"];

Conexion::conectar();
echo Conexion::BorraUsuario($id);













?>