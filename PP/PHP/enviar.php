<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Asegúrate de que la ruta sea correcta

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $sugerencia = htmlspecialchars($_POST['sugerencia']);

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor
        $mail->isSMTP();
        $mail->Host = 'smtp.zoho.com'; // Servidor SMTP de Zoho
        $mail->SMTPAuth = true;
        $mail->Username = 'pprofesionalhernan@zohomail.com'; // Tu correo de Zoho
        $mail->Password = 'pprofesionalizantehf'; // Tu contraseña o contraseña de aplicación
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // O PHPMailer::ENCRYPTION_SMTPS para SSL
        $mail->Port = 587; // Para TLS; usa 465 para SSL

        // Destinatarios
        $mail->setFrom('pprofesionalhernan@zohomail.com', 'Tu Nombre');
        $mail->addAddress('hf.desarrollo@gmail.com', 'Nombre del Destinatario'); // Cambia aquí el correo de Gmail

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Nueva Sugerencia de ' . $nombre;
        $mail->Body    = "<h1>Nueva Sugerencia</h1>
                          <p><strong>Nombre:</strong> $nombre</p>
                          <p><strong>Email:</strong> $email</p>
                          <p><strong>Sugerencia:</strong> $sugerencia</p>";

        $mail->send();
        echo 'El mensaje ha sido enviado';
    } catch (Exception $e) {
        echo "El mensaje no pudo ser enviado. Error: {$mail->ErrorInfo}";
    }
}
?>