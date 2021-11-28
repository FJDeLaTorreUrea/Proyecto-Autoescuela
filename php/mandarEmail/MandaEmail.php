<?php   
    use PHPMailer\PHPMailer\PHPMailer;
    function MandaEmail($email_usuario,$mensaje,$encabezado)
    {
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
        $mail->Username   = "Thekisco1000@gmail.com"; 
        // introducir clave
        $mail->Password   = "Palaplay11";       
        $mail->SetFrom("Thekisco1000@gmail.com","Autoescuela Los Monos");
        // asunto
        $mail->Subject  = $encabezado;
    
        // adjuntos
        //$mail->addAttachment("adjunto.txt");
        // destinatario
        $mail->AddAddress($email_usuario);
        // añadir foto
        //$mail->AddEmbeddedImage($imagen,$titulo_imagen);
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
    