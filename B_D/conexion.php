<?php
    class Conexion{
        private $usuario="root";
        private $password="";
        protected static $conn;

        public static function conectar()
        {
            try {
                self::$conn = new PDO('mysql:host=localhost;dbname=autoescuela', "root","");
                echo "Conexion correcta";
            } catch (PDOException $error) {
                echo "Conexion fallida" . $error->getMessage();
            }
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
            $resultado=self::$conn->exec($consulta);
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
            $resultado=self::$conn->query($consulta);
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
            $resultado=self::$conn->query($consulta);
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
                
            $email=$_GET["id"];
            $consulta="UPDATE usuarios SET Passw='${nuevaPassw}' WHERE Email='${email}'";
            $resultado=self::$conn->exec($consulta);

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




        
        public static function ConsultaSQL($consulta)
        {
            $resultado=self::$conn->exec($consulta);
            $registro=$resultado->fetch(PDO::FETCH_ASSOC);
            return $registro;
        }

    }
?>