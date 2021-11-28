<?php
spl_autoload_register(function($clase)
{
    $fichero=$_SERVER['DOCUMENT_ROOT']."/Proyecto-Autoescuela/B_D/".$clase.".php";
    echo $fichero;
    if(file_exists($fichero))
    {
        require_once $fichero;
    }
});