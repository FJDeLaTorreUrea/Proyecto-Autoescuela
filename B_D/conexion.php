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
            


            $consulta="INSERT INTO usuarios(Id,Email,Nombre,Ap1,Ap2,Passw,FechaNac,Rol,Recurso) VALUES(default,'$email','$nombre','$Ap1','$Ap2','$Pass','$Fecha','$Rol','$Recurso');";
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

        public static function Login($Email,$contrasena)
        {
            $consulta="SELECT * FROM usuarios WHERE Email='${Email}' AND Passw='${contrasena}';";
            $resultado=self::conectar()->query($consulta);
            $registro=$resultado->fetch(PDO::FETCH_ASSOC);
            if($registro["Email"]==$Email && $registro["Passw"]==$contrasena)
            {
                return true;
            }
            else
            {
                return false;
            }
            // while($registro = $resultado->fetch(PDO::FETCH_OBJ)){
                
            // }
        }

        public static function buscaEmail($Email)
        {
            $consulta="SELECT * FROM usuarios WHERE Email='${Email}';";
            $resultado=self::conectar()->query($consulta);
            $registro=$resultado->fetch(PDO::FETCH_ASSOC);

            if($registro["Email"]==$Email)
            {
                echo "Email encontrado";
                return true;
            }
            else
            {
                echo "Email no encontrado";
                return false;
            }
        }

        public static function cambiaPassword($nuevaPassw,$Confirmar)
        {
                error_reporting(error_reporting() & ~E_NOTICE);
                $email=$_GET["id"];
                $consulta="UPDATE usuarios SET Passw='${nuevaPassw}' WHERE Email='${email}';";
                $resultado=self::conectar()->exec($consulta);

                if($resultado)
                {
                    return true;
                }
                else
                {
                    return false;
                }
        }

    }
?>