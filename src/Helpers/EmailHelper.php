<?php

namespace src\Helpers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EmailHelper extends PHPMailer
{
    public function __construct($mensagem, $assunto, $nome, $remetente){
        $mail = new PHPMailer(true);    
        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;    
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Username = 'email@gmail.com';
            $mail->Password = '';
            $mail->Port = 587;
        
            $mail->setFrom($remetente, 'Contato' . $nome);
            $mail->addAddress('email@gmail.com');
        
            $mail->isHTML(true);
        
            $mail->Subject = $assunto;
            $mail->Body    = nl2br($mensagem);
            $mail->AltBody = nl2br(strip_tags($mensagem));
        
            if(!$mail->send()) {
                FlashMessagesHelper::setMessage('Não foi possível enviar a mensagem.', 'WARN');
            } else {
                FlashMessagesHelper::setMessage('Mensagem enviada com sucesso.', 'SUCCESS');
            }
            header('Location: /contact');
        } catch (Exception $e) {
            LogHelper::log($e);
        }
    }
}
