<?php


    function abreSesion()
    {   
        if(!isset($_SESSION))
        {
            session_start();
        }
        
    }

    function creaSesion($nombre,$valor)
    {
        $_SESSION[$nombre]=$valor;
    }

    function borraSesion($nombre)
    {
        unset($_SESSION[$nombre]);
    }




















?>