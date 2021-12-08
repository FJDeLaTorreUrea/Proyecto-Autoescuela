<?php
    require_once("../cargadores/cargaBD.php");
    require_once("../cargadores/cargaUsuario.php");
    require_once("../mandarEmail/MandaEmail.php");
    global $Email;
    global $Apellido2;

    




    if(isset($_POST["IEmail"]) && 
        isset($_POST["INombre"]) && 
        isset($_POST["IAp1"]) && 
        isset($_POST["IFecha"]) &&
        isset($_POST["SRol"]))
    {
        if(filter_var($_POST["IEmail"],FILTER_VALIDATE_EMAIL))
        {
           $Email=$_POST["IEmail"];
           if(isset($_POST["IAp2"]))
            {
                $Apellido2=$_POST["IAp2"];
            }
            $Nombre=$_POST["INombre"];
            $Apellido1=$_POST["IAp1"];
            $Fecha_nac=$_POST["IFecha"];
            $Rol=$_POST["SRol"];
            
        }
        





        $Usuario=new Usuario($Email,$Nombre,$Apellido1,$Apellido2,$Fecha_nac,$Rol,null);
        

        Conexion::conectar();

        if(Conexion::buscaEmail($Email))
        {
            echo "El Email ya está en uso";
        }
        else
        {
            Conexion::InsertarUsuario($Usuario);
            $clave=Conexion::buscaID($Usuario);
            $clave_temporal=$Usuario->getPassword();
            $Usuario_temporal=new Usuario_temporal($clave,$clave_temporal,5);
            Conexion::InsertarUsuario_Temporal($Usuario_temporal);
            MandaEmail($Usuario->getEmail(),"<a href='localhost/Proyecto-Autoescuela/html/confirmar_usuario/confirmar_usuario.html?id=${clave_temporal}'>Haga click en este enlace para autentificar su cuenta </a>","Confirmar ingreso de usuario");
            //"<a href='localhost/Proyecto-Autoescuela/html/password_olvidada/cambia_password/cambiar_password.html?id=${correo}'>Haga click para cambiar su contrase&ntilde;a</a>"
            echo "1";
            
                


                
        };
            




        



    }
    else 
    {
        echo "Introduzca los campos obligatorios";
        


    }






    
?>