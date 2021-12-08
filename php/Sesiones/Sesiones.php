<?php


    function abreSesion()
    {
        session_start();
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