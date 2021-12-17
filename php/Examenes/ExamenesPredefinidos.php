<?php
        require("../../php/cargadores/cargaBD.php");
        Conexion::conectar();
        $paginas_totales=Conexion::cuentaPaginasExamenes();
        $pagina;
        
        if(isset($_GET["pagina"]))
        {
            $pagina=$_GET["pagina"];
        }
        else {
            $pagina=1;
        }
        $examenes=Conexion::DevuelveExamenes($pagina);

        

        $respuesta= new stdclass;

        $respuesta->datos=$examenes;
        $respuesta->paginas_totales=$paginas_totales;
        echo json_encode($respuesta);