<?php
    require_once("../cargadores/cargaclases.php");
    require_once("../cargadores/cargaBD.php");
    if($_POST["IPassw"]==$_POST["IConfir"])
    {
        $email=$_POST["IEmail"];
        $nombre=$_POST["INombre"];
        $ap1=$_POST["IAp1"];
        if(isset($_POST["IAp2"]))
        {
            $ap2=$_POST["IAp2"];
        }
        else
        {
            $ap2=null;
        };
        
        $passw=$_POST["IPassw"];
        $fechaNac=$_POST["IFecha"];

        $fechaNac_replace=str_replace("/","-",$fechaNac);

        $fechaNac_BD=date("Y-m-d",strtotime($fechaNac_replace));






        $nuevo_usuario= new Usuario($email,$nombre,$ap1,$ap2,$passw,$fechaNac_BD,"ADMIN",null);;
        if(Conexion::InsertarUsuario($nuevo_usuario)==true)
        {
            echo"<script>alert('Usuario Insertado');window.history.go(-2);</script>";
        }



    }
    else
    {
        echo "<script>alert('Las contraseñas no coinciden')
            window.history.go(-1);
        </script>";
    }
    















?>