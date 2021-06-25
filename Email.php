<?php

require './phpmail/class.phpmailer.php';

class Email extends PHPMailer
{

    public static
            function enviaNovoEmail($corpo, $assunto, $email, $razao) {
        $mail           = new PHPMailer;
        $mail->IsMail();
        $mail->Host     = "mail.contosdecontos.com.br";
        $mail->SMTPAuth = true;
        $mail->Port     = 587;
        $mail->Username = 'eric@contosdecontos.com.br';
        $mail->Password = 'eQr8swSrCS';

        // Define o remetente
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->From     = "eric@contosdecontos.com.br";
        $mail->Sender   = "eric@contosdecontos.com.br";
        $mail->FromName = "Eric";

        // Define os destinatário(s)
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        if (!empty($email))
        {
            $mail->AddAddress($email, $razao);
        }
	    $mail->AddCC('ericwduarte@gmail.com', 'Copias');
        $mail->AddBCC('ericwduarte@gmail.com', ' GROUP');

        $mail->IsHTML(true);
        $mail->CharSet = 'utf-8';
        $mail->Subject = $assunto . "https://www.contosdecontos.com.br";
        $mail->Body    = $corpo;
        $mail->AltBody = $corpo;

        $enviado = $mail->Send();

        // Limpa os destinatários e os anexos
        $mail->ClearAllRecipients();
        $mail->ClearAttachments();

        // Exibe uma mensagem de resultado
        if ($enviado)
        {
           $msg = "E-mail Enviado";
   
   
           echo "<script>
           alert( '$msg!' ); location = 'https://contosdecontos.com.br/front/eric/php/contato';
           </script>";
        }
        else
        {
            echo "Não foi possível enviar o e-mail. <br>";
            echo "Informações do erro: " . $mail->ErrorInfo;
        }
    }

}
