<?php   
    public function($tucorreo,$Passw,$titulo,$encabezado,$sucorreo,$imagen,$titulo_imagen,$mensaje)
    {
        use PHPMailer\PHPMailer\PHPMailer;
        require "../vendor/autoload.php";
        $mail = new PHPMailer();
        $mail->IsSMTP();
        // cambiar a 0 para no ver mensajes de error
        $mail->SMTPDebug  = 0;                          
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = "tls";                 
        $mail->Host       = "smtp.gmail.com";    
        $mail->Port       = 587;                 
        // introducir usuario de google
        $mail->Username   = $tucorreo; 
        // introducir clave
        $mail->Password   = $Passw;       
        $mail->SetFrom($tucorreo, $titulo);
        // asunto
        $mail->Subject    = $encabezado;
    
        // adjuntos
        $mail->addAttachment("adjunto.txt");
        // destinatario
        $mail->AddAddress($sucorreo, "Test");
        // añadir foto
        $mail->AddEmbeddedImage($imagen,$titulo_imagen);
        // cuerpo
        $mail->MsgHTML($mensaje);
        // enviar
        $resul = $mail->Send();
        if(!$resul) {
        echo "Error" . $mail->ErrorInfo;
        } else {
        echo "Enviado";
        }

    }
    