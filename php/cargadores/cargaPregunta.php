<?php
spl_autoload_register(function($clase)
{
    $fichero=$_SERVER['DOCUMENT_ROOT']."/Proyecto-Autoescuela/php/Preguntas/".$clase.".php";
    if(file_exists($fichero))
    {
        require_once $fichero;
    }
});