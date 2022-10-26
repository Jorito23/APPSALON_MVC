<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class email {
    public $email;
    public $nombre;
    public $token;


    public function __construct($email,$nombre,$token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
          
    }

    public function enviarConfirmacion() {
        //Crear el objeto de Email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'e2d0d74728e41d';
        $mail->Password = '1e4964a8525d12';

        $mail->setFrom('cuentas@salon.com');
        $mail->addAddress('cuentas@appsalon.com','Appsalon.com');
        $mail->Subject = 'Confrima tu cuenta';

        //Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido  = "<html>";
        $contenido .= "<p><strong> Hola " . $this->nombre . "</strong> Has creado tu cuenta en AppSalon, sólo debes confirmarla presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona Aquí: <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a></p>";
        $contenido .= "<p> Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();
    }

    public function enviarInstrucciones() {
        //Crear el objeto de Email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'e2d0d74728e41d';
        $mail->Password = '1e4964a8525d12';

        $mail->setFrom('cuentas@salon.com');
        $mail->addAddress('cuentas@appsalon.com','Appsalon.com');
        $mail->Subject = 'Reestablece tu password';

        //Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido  = "<html>";
        $contenido .= "<p><strong> Hola " . $this->nombre . "</strong> Has solicitado reestablecer tu password,haz click en el enlace para continuar</p>";
        $contenido .= "<p>Presiona Aquí: <a href='http://localhost:3000/recuperar?token=" . $this->token . "'>Reestablecer Contraseña</a></p>";
        $contenido .= "<p> Si tu no solicitaste esta accion, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();
    }
}
