<?php
    class Conexion{
        private $usuario="root";
        private $password="";
        protected static $conn;

        public static function conectar()
        {
            try {
                self::$conn = new PDO('mysql:host=localhost;dbname=autoescuela', "root","");
                
            } catch (PDOException $error) {
                echo "Conexion fallida" . $error->getMessage();
            }
        }

        //Metodos para INSERTAR
        public static function InsertarUsuario($usuario)
        {
            $email=$usuario->getEmail();
            $nombre=$usuario->getNombre();
            $Ap1=$usuario->getAp1();
            $Ap2=$usuario->getAp2();
            $Pass=$usuario->getPassword();
            $Fecha=$usuario->getFecha();
            $Rol=$usuario->getRol();
            $Recurso=$usuario->getRecurso();
            


            $consulta="INSERT INTO usuarios(Id,Email,Nombre,Ap1,Ap2,Passw,FechaNac,Rol,Recurso) VALUES(default,'${email}','${nombre}','${Ap1}','${Ap2}','${Pass}','${Fecha}','${Rol}','${Recurso}');";
            $resultado=self::$conn->exec($consulta);
            return self::$conn->errorInfo();
        }

        public static function InsertarUsuario_Temporal($usuario_temporal)
        {
            $password_temporal=$usuario_temporal->getPassword_temporal();
            $id_usuario=$usuario_temporal->getId_usuario();
            $Fecha_exp=$usuario_temporal->getFecha_expiracion();

            $consulta="INSERT INTO alumno_sin_confirmar(Id_usuario,password,Fecha_expiracion) VALUES ('${id_usuario}','${password_temporal}','${Fecha_exp}');";
            $resultado=self::$conn->exec($consulta);
            return self::$conn->errorInfo();
           

        }

        public static function InsertarTematica($tematica)
        {
            $Nombre_tematica=$tematica->getTematica();

            $consulta="INSERT INTO tematica(Id,Tema) VALUES (default,'${Nombre_tematica}')";
            $resultado=self::$conn->exec($consulta);
            return self::$conn->errorInfo();
        }

        public static function InsertarPregunta($pregunta)
        {
            $enunciado=$pregunta->getEnunciado();
            $recurso=$pregunta->getRecurso();
            $Id_respuesta=$pregunta->getId_repuesta();
            $id_tematica=$pregunta->getId_tematica();
            $id_propio=$pregunta->getId_propio();




            $consulta="INSERT INTO pregunta(Id,Enunciado,Recurso,Id_respuesta,Id_tematica,Id_propio) VALUES (default,'${enunciado}','${recurso}',null,'${id_tematica}','${id_propio}');";
            $resultado=self::$conn->exec($consulta);
            
        
        }

        public static function InsertaRespuestas($array_preguntas,$Id_pregunta,$correcta)
        {
            for ($i=0; $i<4 ; $i++) 
            { 
                
                $pregunta=$array_preguntas[$i];
                
                if($i==$correcta-1)
                {
                    $consulta="INSERT INTO respuesta(Id,Enunciado,Id_pregunta,correcta) VALUES (default,'${pregunta}','${Id_pregunta}','1')";
                    $resultado=self::$conn->exec($consulta);
                
                    
                }
                else 
                {
                    $consulta="INSERT INTO respuesta(Id,Enunciado,Id_pregunta,correcta) VALUES (default,'${pregunta}','${Id_pregunta}','0')";
                    $resultado=self::$conn->exec($consulta);
                    
                }
                
                
            }
        }

        public static function InsertaExamen($Examen)
        {
            $descripcion=$Examen->getDescripcion();
            $duracion=$Examen->getDuracion();
            $N_pregunta=$Examen->getN_preguntas();

            $consulta="INSERT INTO examen(Id,Descripcion,Duracion,NPreguntas) VALUES (default,'${descripcion}','${duracion}','${N_pregunta}');";
            $resultado=self::$conn->exec($consulta);
            return self::$conn->errorInfo();
        }

        public static function BuscaIdExamen($descripcion)
        {
            $consulta="SELECT Id FROM examen WHERE Descripcion='${descripcion}'";
            $resultado=self::$conn->query($consulta);
            $registro=$resultado->fetch(PDO::FETCH_ASSOC);
            return $registro["Id"];
        }




        public static function InsertaExamenPreguntas($id_examen,$id_pregunta)
        {
            $consulta="INSERT INTO examen_pregunta(Id_examen,Id_Pregunta) VALUES('${id_examen}','${id_pregunta}')";
            $resultado=self::$conn->exec($consulta);
            return self::$conn->errorInfo();
        }



        public static function InsertaExamenUsuario($id_usuario,$id_examen,$aciertos,$total)
        {
            $aprobado=0;
            if(($total-$aciertos)<=3)
            {
                $aprobado=1;
            }

            $aciertos_total=$aciertos."/".$total;
            $consulta="INSERT INTO examenes_hechos(Id,Id_examen,Id_alumno,Fecha,Aprobado,Aciertos) VALUES (default,'${id_examen}','${id_usuario}',NOW(),'${aprobado}','${aciertos_total}');";
            $resultado=self::$conn->exec($consulta);
            var_dump(self::$conn->errorInfo());
            

        }












    
        public static function Login($Email,$contrasena)
        {
            $consulta="SELECT * FROM usuarios WHERE Email='${Email}' AND Passw='${contrasena}';";
            $resultado=self::$conn->query($consulta);
            while($registro=$resultado->fetch(PDO::FETCH_ASSOC))
            {
                if($registro["Email"]==$Email && $registro["Passw"]==$contrasena)
                {
                    return $registro["Rol"];
                }
                
            }
            
            
            // while($registro = $resultado->fetch(PDO::FETCH_OBJ)){
                
            // }
        }

        public static function buscaIdUsuarioConEmail($Email)
        {
            $consulta="SELECT Id FROM usuarios WHERE Email='${Email}';";
            $resultado=self::$conn->query($consulta);
            $registro=$resultado->fetch(PDO::FETCH_ASSOC);
            return $registro["Id"];
        }




        public static function buscaRol($Email)
        {
            $consulta="SELECT * FROM usuarios WHERE Email='${Email}';";
            $resultado=self::$conn->query($consulta);
            while($registro=$resultado->fetch(PDO::FETCH_ASSOC))
            {
                if($registro["Email"]==$Email )
                {
                    return $registro["Rol"];
                }
                else 
                {
                    //var_dump(self::$conn->errorInfo());    
                }
                
            }
            
            
            
        }



        public static function buscaEmail($Email)
        {
            $consulta="SELECT * FROM usuarios WHERE Email='${Email}';";
            $resultado=self::$conn->query($consulta);
            $registro=$resultado->fetch(PDO::FETCH_ASSOC);

            if($registro["Email"]==$Email)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public static function cambiaPassword($id,$nuevaPassw)
        {
            $consulta="UPDATE usuarios SET Passw='${nuevaPassw}' WHERE Passw='${id}'";
            $resultado=self::$conn->exec($consulta);
            if($resultado)
            {
                return true;
            }
            else
            {
                return false;
            }

            
        }

        public static function ponIdRespuesta($Id_respuesta_correcta,$Id_pregunta)
        {
            $consulta="UPDATE pregunta SET Id_respuesta='${Id_respuesta_correcta}' WHERE Id='${Id_pregunta}'";
            $resultado=self::$conn->exec($consulta);
            if($resultado)
            {
                return true;
            }
            
        
        
        }


        public static function buscaID($usuario)
        {
            $password=$usuario->getPassword();
            $consulta="SELECT Id FROM usuarios WHERE Passw='${password}'";
            $resultado=self::$conn->query($consulta);
            $registro=$resultado->fetch(PDO::FETCH_ASSOC);
            return $registro["Id"];
        }

        public static function buscaIDPregunta($codigo_propio)
        {
            
            $consulta="SELECT Id FROM pregunta WHERE Id_propio='${codigo_propio}';";
            $resultado=self::$conn->query($consulta);
            $registro=$resultado->fetch(PDO::FETCH_ASSOC);
            
            return $registro["Id"];
        }



        public static function buscaRespuestaCorrecta($Id_pregunta)
        {
            $consulta="SELECT Id FROM respuesta WHERE Id_pregunta='${Id_pregunta}' AND Correcta='1'";
            $resultado=self::$conn->query($consulta);
            $registro=$resultado->fetch(PDO::FETCH_ASSOC);
            return $registro["Id"];
        }


        public static function buscaRespuestas($id_pregunta)
        {
            $a=new stdClass;
            $a->respuestas=array();
            $consulta="SELECT * FROM respuesta WHERE Id_pregunta='${id_pregunta}'";
            $resultado=self::$conn->query($consulta);
            while($registro=$resultado->fetch(PDO::FETCH_ASSOC))
            {
                $valores= new stdClass;
                $valores->Enunciado=$registro["Enunciado"];
                $valores->Correcta=$registro["Correcta"];
                array_push($a->respuestas,$valores);
            }
            return $a;
            
        }







        public static function devuelvePregunta($array)
        {
            $a= new stdClass;
            $a->pregunta=array();
            for($i=0;$i<count($array);$i++)
            {
                $id=$array[$i];
                $consulta="SELECT * FROM pregunta WHERE Id='${id}';";
                $resultado=self::$conn->query($consulta);
                while($registro=$resultado->fetch(PDO::FETCH_ASSOC))
                {
                    $valores= new stdClass;
                    $valores->Enunciado=$registro["Enunciado"];
                    $valores->Recurso=$registro["Recurso"];
                    $valores->Id_respuesta=$registro["Id_respuesta"];
                    
                array_push($a->pregunta,$valores);
                }
            }
                

                return $a;
                
            }






            
            
        













        public static function devuelveIdPreguntasDeExamen($id_examen)
        {
            $consulta="SELECT * FROM examen_pregunta WHERE Id_examen='${id_examen}';";
            $preguntas=array();
            $resultado=self::$conn->query($consulta);
            while($registro=$resultado->fetch(PDO::FETCH_ASSOC))
            {
                array_push($preguntas,$registro["Id_Pregunta"]);
            }
            return $preguntas;
        }










        public static function devuelveNumeroDePreguntas($id)
        {
            $consulta="SELECT NPreguntas FROM examen WHERE Id='${id}';";
            $resultado=self::$conn->query($consulta);
            $registro=$resultado->fetch(PDO::FETCH_ASSOC);
            
                return $registro["NPreguntas"];
            
        }

        public static function devuelveDuracionExamen($id)
        {
            $consulta="SELECT Duracion FROM examen WHERE Id='${id}';";
            $resultado=self::$conn->query($consulta);
            $registro=$resultado->fetch(PDO::FETCH_ASSOC);
            
                return $registro["Duracion"];
        }



































        public static function buscaTematica($tematica)
        {
            $nombre_tematica=$tematica->getTematica();
            $consulta="SELECT * FROM tematica;";
            $resultado=self::$conn->query($consulta);
            
           
            while($registro = $resultado->fetch(PDO::FETCH_ASSOC))
            {
                if($registro["Tema"]==$nombre_tematica)
                {
                    return true;
                }
                else 
                {
                    return false;
                }
            }
        }


        public static function devuelveTematicasEnSelect()
        {
            $consulta="SELECT * FROM tematica;";
            $resultado=self::$conn->query($consulta);
            while($registro=$resultado->fetch(PDO::FETCH_ASSOC))
            {
                echo "<option value=".$registro["Id"].">".$registro["Tema"]."</option>";
            }
        }

        public static function devuelvePreguntasEnDiv()
        {
            $consulta="SELECT * FROM pregunta";
            $resultado=self::$conn->query($consulta);
            $contador=0;
            while($registro=$resultado->fetch(PDO::FETCH_ASSOC))
            {
                echo "<div id='preguntas".$contador."' class='preguntas' id_pregunta='".$registro["Id"]."' draggable='true'><img src'../recursos/imagenes_preguntas/".$registro["Recurso"]."'>".$registro["Enunciado"]."</div>";
                $contador++;
            }
        }


        public static function cuentaPaginasExamenes()
        {
            $consulta="SELECT * FROM examen;";
            $resultado=self::$conn->prepare($consulta);
            $resultado->execute(array());

            $tamano=4;
            $numero_filas=$resultado->rowCount();


            $total_paginas=ceil($numero_filas/$tamano);
            
            return $total_paginas;
        }



        public static function devuelveExamenes($pagina)
        {
            $consulta="SELECT * FROM examen";
            $resultado=self::$conn->query($consulta);

            $tamano=4;

            $comienzo=($pagina-1)*$tamano;

            
            
            



            $resultado=self::$conn->prepare($consulta);
            $resultado->execute(array());

            

            

        

            

            $resultado->closeCursor();

            $consulta_con_limite="SELECT * FROM examen LIMIT $comienzo,$tamano";

            
            $resultado=self::$conn->prepare($consulta_con_limite);
            $resultado->execute(array());

           
           
            $a= new stdClass;
            $a->examenes=array();
            while($registro=$resultado->fetch(PDO::FETCH_ASSOC))
            {

                

                $valores= new stdClass;
                $valores->Id=$registro["Id"];
                $valores->Enunciado=$registro["Descripcion"];
                $valores->Duracion=$registro["Duracion"];
                $valores->N_preguntas=$registro["NPreguntas"];
                

                
                array_push($a->examenes,$valores);
                
            
            
            }
            
            $JSON=json_encode($a);
            return $a;
            

        }





        public static function cuentaPaginasUsuario()
        {
            $consulta="SELECT * FROM usuarios ;";
            $resultado=self::$conn->prepare($consulta);
            $resultado->execute(array());

            $tamano=4;
            $numero_filas=$resultado->rowCount();


            $total_paginas=ceil($numero_filas/$tamano);
            return $total_paginas;
        }


        public static function cuentaPaginasTematicas()
        {
            $consulta="SELECT * FROM tematica;";
            $resultado=self::$conn->prepare($consulta);
            $resultado->execute(array());

            $tamano=4;
            $numero_filas=$resultado->rowCount();
            $total_paginas=ceil($numero_filas/$tamano);
            return $total_paginas;
        }






        public static function DevuelveUsuarios($pagina)
        {
            
            $consulta="SELECT * FROM usuarios ;";

            $tamano=4;
            
            
            
            $comienzo=($pagina-1)*$tamano;

            
            
            



            $resultado=self::$conn->prepare($consulta);
            $resultado->execute(array());

            

            

        

            

            $resultado->closeCursor();

            $consulta_con_limite="SELECT * FROM usuarios LIMIT $comienzo,$tamano";

            
            $resultado=self::$conn->prepare($consulta_con_limite);
            $resultado->execute(array());

           
           
            $a= new stdClass;
            $a->usuarios=array();
            while($registro=$resultado->fetch(PDO::FETCH_ASSOC))
            {

                

                $valores= new stdClass;
                $valores->Id=$registro["Id"];
                $valores->Email=$registro["Email"];
                $valores->Nombre=$registro["Nombre"];
                $valores->Ap1=$registro["Ap1"];
                $valores->Ap2=$registro["Ap2"];
                $valores->Fecha_nac=$registro["FechaNac"];
                $valores->Rol=$registro["Rol"];

                
                array_push($a->usuarios,$valores);
                
            
            
            }
            
            $JSON=json_encode($a);
            return $a;
            

        }

        public static function DevuelveTematicas($pagina)
        {
            $consulta="SELECT * FROM tematica";

            $tamano=4;

            $comienzo=($pagina-1)*$tamano;

            
            
            



            $resultado=self::$conn->prepare($consulta);
            $resultado->execute(array());

            

            

        

            

            $resultado->closeCursor();

            $consulta_con_limite="SELECT * FROM tematica LIMIT $comienzo,$tamano";

            
            $resultado=self::$conn->prepare($consulta_con_limite);
            $resultado->execute(array());

            $a= new stdClass;
            $a->tematicas=array();
            while($registro=$resultado->fetch(PDO::FETCH_ASSOC))
            {
                

                

                $valores= new stdClass;
                $valores->Id=$registro["Id"];
                $valores->Tema=$registro["Tema"];
                

                
                array_push($a->tematicas,$valores);
                
            
            
            }
            $JSON=json_encode($a);
            return $a;


        }



        public static function BorraUsuario($Id)
        {
            $consulta="DELETE FROM usuarios WHERE Id=${Id}";
            $resultado=self::$conn->exec($consulta);
            if($resultado)
            {
                return true;
            }
            else 
            {
                
                var_dump(self::$conn->errorInfo());
            }

        }

        public static function BorraUsuarioTemporal($id)
        {
            $consulta="DELETE FROM alumno_sin_confirmar WHERE passw=${id}";
            $resultado=self::$conn->exec($consulta);
            if($resultado==1)
            {
                return true;
            }
            else 
            {
                var_dump(self::$conn->errorInfo());
            }
        }

        public static function BorraTematica($id)
        {
            $consulta="DELETE FROM tematica WHERE Id='${id}';";
            $resultado=self::$conn->exec($consulta);
            if($resultado==1)
            {
                return true;
            }
            else {
                var_dump(self::$conn->errorInfo());
            }
        }

        




        
      

    }
?>