<?php
    require("../../php/cargadores/cargaBD.php");
    Conexion::conectar();
    $paginas_totales=Conexion::cuentaPaginasTematicas();

    if(isset($_GET["pagina"]))
        {
            $pagina=$_GET["pagina"];
        }
        else {
            $pagina=1;
        }
        $usuarios=Conexion::DevuelveTematicas($pagina);

        

        $respuesta= new stdclass;

        $respuesta->datos=$usuarios;
        $respuesta->paginas_totales=$paginas_totales;
        echo json_encode($respuesta);























?>