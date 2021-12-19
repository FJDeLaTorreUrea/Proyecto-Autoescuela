<?php
    require("../cargadores/cargaBD.php");



    $id=$_GET["id"];
    Conexion::conectar();
    $n_preguntas=Conexion::devuelveNumeroDePreguntas($id);

    $id_pregunta=Conexion::devuelveIdPreguntasDeExamen($id);
    
    $pregunta_devuelta=Conexion::devuelvePregunta($id_pregunta);

    $duracion=Conexion::devuelveDuracionExamen($id);
    


    for($i=0;$i<$n_preguntas;$i++)
    {
        $respuesta[$i]=Conexion::buscaRespuestas($id_pregunta[$i]);
        
    }

    



    
    
    //var_dump($respuestas);
    







    $pregunta= new stdclass;
    $pregunta->n_preguntas=$n_preguntas;
    $pregunta->datos_unicos=$pregunta_devuelta;
    $pregunta->respuestas=$respuesta;
    $pregunta->duracion=$duracion;
    echo json_encode($pregunta);
















?>