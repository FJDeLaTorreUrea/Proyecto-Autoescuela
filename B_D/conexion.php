<?php
    class Conexion{
        private $usuario="root";
        private $password="";

        public static function conectar()
        {
            try {
                $conexion = new PDO('mysql:host=localhost;dbname=autoescuela', "root","");
                echo "Conexion correcta";
            } catch (PDOException $error) {
                echo "Conexion fallida" . $error->getMessage();
            }
            return $conexion;
        }

        //Metodos usuario
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
            $Activo=$usuario->getActivo();


            $consulta="INSERT INTO usuarios(Id,Email,Nombre,Ap1,Ap2,Passw,FechaNac,Rol,Recurso,Activo) VALUES(default,'$email','$nombre','$Ap1','$Ap2','$Pass','$Fecha','$Rol','$Recurso','$Activo');";
            $resultado=self::conectar()->exec($consulta);
            if ($resultado) 
            {
                echo "Consulta realizada";
                return true;
            }
            else
            {
                echo "Consulta no realizada";
                return false;
            }
        }

    }
?>