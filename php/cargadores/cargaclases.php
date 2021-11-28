<?php
spl_autoload_register(function($clase)
{
    echo "a";
    $fichero=$_SERVER['DOCUMENT_ROOT'].substr($_SERVER['PHP_SELF'],0,strrpos($_SERVER['PHP_SELF'],'/')).'/'.$clase.'.php';
    echo $fichero;
    if(file_exists($fichero))
    {
        echo "s";
        require_once $fichero;
    }
});