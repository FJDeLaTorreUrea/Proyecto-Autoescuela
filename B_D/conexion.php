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

        




        
      

    }
?>