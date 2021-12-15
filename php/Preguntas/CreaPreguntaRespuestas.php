<?php
    require("../cargadores/cargaPregunta.php");
    require("../cargadores/cargaBD.php");
    
    



    if(isset($_POST["Enunciado"]) && isset($_POST["Op1"]) && isset($_POST["Op2"]) && isset($_POST["Op3"]) && isset($_POST["Op4"]))
    {
        $seleccionador=$_POST["selecciona_tematica"];
        $Enunciado=$_POST["Enunciado"];
        $Op1=$_POST["Op1"];
        $Op2=$_POST["Op2"];
        $Op3=$_POST["Op3"];
        $Op4=$_POST["Op4"];

        $Op_correcta=$_GET["correcta"];
        $directorio=$_SERVER["DOCUMENT_ROOT"]."/Proyecto_Autoescuela/recursos/imagenes_preguntas/";


        $array_preguntas=array($Op1,$Op2,$Op3,$Op4);


        $nombre_img = $_FILES['imagen']['name'];
        $directorio=$_SERVER["DOCUMENT_ROOT"]."/Proyecto-Autoescuela/recursos/imagenes_preguntas/";
        $tipo = $_FILES['imagen']['type'];
        $tamano = $_FILES['imagen']['size'];
        if(!empty($nombre_img) && ($_FILES['imagen']['size'] <= 2000000))
        {
            if (($_FILES["imagen"]["type"] == "image/gif")
            || ($_FILES["imagen"]["type"] == "image/jpeg")
            || ($_FILES["imagen"]["type"] == "image/jpg")
            || ($_FILES["imagen"]["type"] == "image/png"))
            {
                

                move_uploaded_file($_FILES["imagen"]["tmp_name"],$directorio.$nombre_img);
            }
            else {
                echo "El formato de imagen no es valido";
            }
        }
        else {
            echo "La imagen es demasiado grande";
        }

        
        
        
        

        $pregunta = new Pregunta($Enunciado,$nombre_img,null,$seleccionador,$array_preguntas);

        Conexion::conectar();

        Conexion::InsertarPregunta($pregunta);

        $id=Conexion::buscaIDPregunta($pregunta->getId_propio());
        
        

        $correcta=$_GET["correcta"];

        Conexion::InsertaRespuestas($array_preguntas,$id,$correcta);

        $id_respuesta_correcta=Conexion::buscaRespuestaCorrecta($id);

        Conexion::ponIdRespuesta($id_respuesta_correcta,$id);

        echo "1";


    }

    
    else 
    {
        echo "Introduzca todos los campos";
    }











?>