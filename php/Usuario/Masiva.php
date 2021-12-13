<?php
$nombre_archivo=$_FILES["fichero"]["name"];
$tipo_archivo=$_FILES["fichero"]["type"];
$tamano_archivo=$_FILES["fichero"]["size"];

if(!(strpos($tipo_archivo,"csv")))
{
    echo "<script>alert('El archivo insertado no es válido');<script>";
}
else 
{
    
}














?>