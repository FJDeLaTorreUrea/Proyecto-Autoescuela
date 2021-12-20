<?php
        require("../../php/cargadores/cargaBD.php");
        Conexion::conectar();

        session_start();
        $email=$_SESSION["usuario"];
        $id=Conexion::buscaIdUsuarioConEmail($email);
        $paginas_totales=Conexion::cuentaPaginasExamenesUsuario($id);
        
        
        if(isset($_GET["pagina"]))
        {
            $pagina=$_GET["pagina"];
        }
        else {
            $pagina=1;
        }
        $examenes=Conexion::devuelveExamenesHechosUsuario($pagina,$id);

        

        $respuesta= new stdclass;

        $respuesta->datos=$examenes;
        $respuesta->paginas_totales=$paginas_totales;
        echo json_encode($respuesta);
        
    
    
    ?>