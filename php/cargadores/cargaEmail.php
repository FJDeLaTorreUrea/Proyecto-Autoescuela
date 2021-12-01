<?php
spl_autoload_register(function($clase)
{
    $fichero=$_SERVER['DOCUMENT_ROOT']."/Proyecto-Autoescuela/php/mandarEmail/".$clase.".php";
    echo $fichero;
    if(file_exists($fichero))
    {
        require_once $fichero;
    }
});