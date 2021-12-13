<?php
        require("../../php/cargadores/cargaBD.php");
        Conexion::conectar();
        $paginas_totales=Conexion::cuentaPaginasUsuario();
        
        
        if(isset($_GET["pagina"]))
        {
            $pagina=$_GET["pagina"];
        }
        else {
            $pagina=1;
        }
        $usuarios=Conexion::DevuelveUsuarios($pagina);

        

        $respuesta= new stdclass;

        $respuesta->datos=$usuarios;
        $respuesta->paginas_totales=$paginas_totales;
        echo json_encode($respuesta);
        
        


        // for ($i=1; $i<=$paginas_totales ; $i++) 
        // { 
        //     echo "<a href='?pagina=". $i ."'>". $i . "</a>  ";    
        // }
    
    
    
    ?>