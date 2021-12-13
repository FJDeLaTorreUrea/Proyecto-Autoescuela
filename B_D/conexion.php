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

    
        public static function Login($Email,$contrasena)
        {
            $consulta="SELECT * FROM usuarios WHERE Email='${Email}' AND Passw='${contrasena}';";
            $resultado=self::$conn->query($consulta);
            while($registro=$resultado->fetch(PDO::FETCH_ASSOC))
            {
                if($registro["Email"]==$Email && $registro["Passw"]==$contrasena)
                {
                    return true;
                }
                
            }
            
            
            // while($registro = $resultado->fetch(PDO::FETCH_OBJ)){
                
            // }
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
            var_dump(self::$conn->errorInfo());
            if($resultado)
            {
                return true;
            }
            else
            {
                return false;
            }

            var_dump(self::$conn->errorInfo());
        }


        public static function buscaID($usuario)
        {
            $password=$usuario->getPassword();
            $consulta="SELECT Id FROM usuarios WHERE Passw='${password}'";
            $resultado=self::$conn->query($consulta);
            $registro=$resultado->fetch(PDO::FETCH_ASSOC);
            return $registro["Id"];
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

        




        
      

    }
?>