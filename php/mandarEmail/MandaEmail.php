<?php   
    use PHPMailer\PHPMailer\PHPMailer;
    function MandaEmail($email_usuario,$mensaje,$encabezado)
    {
        require "../../vendor/autoload.php";
        $mail = new PHPMailer();
        $mail->IsSMTP();
        // cambiar a 0 para no ver mensajes de error
        $mail->SMTPDebug  = 0;                          
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = "ssl";                 
        $mail->Host       = "smtp.gmail.com";    
        $mail->Port       = 465;                 
        // introducir usuario de google
        $mail->Username   = "autoescuelalosmonos@gmail.com"; 
        // introducir clave
        $mail->Password   = "TorreUrea2000";       
        $mail->SetFrom("autoescuelalosmonos@gmail.com","Autoescuela Los Monos");
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
        } 

    }
    