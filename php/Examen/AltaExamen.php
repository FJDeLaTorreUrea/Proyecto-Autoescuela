<?php
    require("../cargadores/cargaBD.php");
    require("Examen.php");


    $nombre=$_POST["Nombre"];
    $duracion="00:".$_POST["Duracion"].":00";
    $n_preguntas=$_POST["N_preguntas"];
    $Preguntas=(array) json_decode($_POST["preguntas"]);


    $examen= new Examen($nombre,$duracion,$n_preguntas,$Preguntas);





    Conexion::conectar();
    Conexion::InsertaExamen($examen);
    $id_examen=Conexion::BuscaIdExamen($nombre);

    for ($i=1; $i <=$n_preguntas ; $i++) 
    { 
        Conexion::InsertaExamenPreguntas($id_examen,$Preguntas[$i]);
    }

    echo "1";

    








    

    








?>