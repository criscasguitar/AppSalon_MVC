<?php
namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email  {

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {
        
        // Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;    
        $mail->Port = 2525;
        $mail->Username = '0abf8e9906ca5b';
        $mail->Password = 'f7bb63e50c9304';

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Confirma tu cuenta';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p> <strong> Hola " . $this->nombre . "</strong> Has creado tu cuenta en App Salon,
        solo debes confirmarla presionando el siguiente enlace</p>";
        $contenido .= "<p> Presiona aquí: <a href= 'http://localhost:3100/confirmar-cuenta?token="
        . $this->token . "'> Confirmar Cuenta</a> </p>";
        $contenido .= "<p> Si no solicitaste esta cuenta, puedes ignorar el mensaje </p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;

        // Enviar email

        $mail->send();
    }

    public function enviarInstrucciones() {

          // Crear el objeto de email
          $mail = new PHPMailer();
          $mail->isSMTP();
          $mail->Host = 'smtp.mailtrap.io';
          $mail->SMTPAuth = true;    
          $mail->Port = 2525;
          $mail->Username = '0abf8e9906ca5b';
          $mail->Password = 'f7bb63e50c9304';
  
          $mail->setFrom('cuentas@appsalon.com');
          $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
          $mail->Subject = 'Reestablece tu password';
  
          // Set HTML
          $mail->isHTML(TRUE);
          $mail->CharSet = 'UTF-8';
  
          $contenido = "<html>";
          $contenido .= "<p> <strong> Hola " . $this->nombre . "</strong> Has solicitado reestablecer tu password, 
          sigue el siguiente enlace para continuar.</p>";
          $contenido .= "<p> Presiona aquí: <a href='http://localhost:3100/recuperar?token="
          . $this->token . "'> Reestablecer Pasword </a> ";
          $contenido .= "<p> Si no solicitaste este cambio, puedes ignorar el mensaje </p>";
          $contenido .= "</html>";
          $mail->Body = $contenido;
  
          // Enviar email
  
          $mail->send();
    }
}